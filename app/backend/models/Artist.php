<?php

    class Artist{

        private $id;
        private $name;
        private $email;
        private $password;
        private $phone_number;
        private $category_id;
        private $biography;
        
        public function signUpArtist($name, $email, $password, $phone_number, $category_id, $biography){

            $this->name = $name;
            $this->email = $email;
            $this->password = password_hash($password, PASSWORD_DEFAULT);
            $this->phone_number = $phone_number;
            $this->category_id = $category_id;
            $this->biography = $biography;
            
            global $pdo;

            $is_this_user_signed_up = $this->checkIfThisUserExist($email);

            if($is_this_user_signed_up){
                return ['success'=>true, 'message'=>'Já existe uma conta cadastrada com este e-mail. Faça o login!'];
            }

            $stmt = $pdo->prepare("INSERT INTO artists(nome, phone_number, category_id, biography) VALUES(?,?,?,?)");

            $artist_signed_up = $stmt->execute([$this->name, $this->phone_number, $this->category_id, $this->biography]);

            if($artist_signed_up){

                $artist_id = $pdo->lastInsertId();
                $role = 2;

                $stmt = $pdo->prepare("INSERT INTO users(email, password, user_role_id, artist_id) VALUES(?,?,?,?)");
                $user_signed_up = $stmt->execute([$this->email, $this->password, $role, $artist_id]);

            }

            if($user_signed_up){
                return ['success'=>true, 'message'=>'Cadastro Feito com sucesso!', 'redirect'=>'../pages/auth.php?action=signIn'];
            }
            return ['success'=>false, 'message'=>'Erro ao realizar o cadastro, tente novamente!'];

        }

        public function artistAutenticator($email, $password){
            
            $this->email = $email;
            $this->password = $password;

            global $pdo;

            $stmt = $pdo->prepare("SELECT users.password, users.email, user_role.role FROM users JOIN user_role ON users.user_role_id = user_role.id WHERE users.email = ?");
            $stmt->execute([$this->email]);
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user){

                if(password_verify($this->password, $user['password'])){
                    
                    session_start();

                    $_SESSION['role'] = $user['role'];
                    $_SESSION['email'] = $user['email'];

                    if($user['role'] === 'Admin'){
                        return ['success'=>true, 'message'=>'Login realizado com sucesso!', 'redirect'=>'../pages/admin.php'];
                    }

                    $query = $pdo->prepare("SELECT artists.nome, users.artist_id FROM artists JOIN users ON artists.id = users.artist_id WHERE users.email = ?");
                    $query->execute([$this->email]);

                    $artist = $query->fetch(PDO::FETCH_ASSOC);

                    $_SESSION['id'] = $artist['artist_id'];
                    $_SESSION['name'] = $artist['nome'];

                    return ['success'=>true, 'message'=>'Login realizado com sucesso!', 'redirect'=>'../pages/artist_dashboard.php'];
                }
            }
            return ['success'=>false, 'message'=>'Email ou senha inválidos!'];

        }

        public function viewAllArtistsData(){

            global $pdo;

            $stmt = $pdo->prepare("SELECT artists.id, artists.nome, users.email, artists.phone_number, artists.biography, categories.category, artists.created_at FROM artists JOIN categories ON artists.category_id = categories.id JOIN users ON artists.id = users.artist_id ORDER BY artists.created_at DESC");

            $stmt->execute();

            $all_artists_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($all_artists_data){
                return ['success'=>true, 'data'=>$all_artists_data];
            }
            return ['success'=>false, 'message'=>'Em breve novos artistas aparecerão aqui'];
            
        }

        public function viewArtistData($id){

            $this->id = $id;

            global $pdo;

            $stmt = $pdo->prepare("SELECT artists.id, artists.nome, artists.phone_number, artists.biography, categories.category, artists.created_at FROM artists JOIN categories ON artists.category_id = categories.id WHERE artists.id = ?");

            $stmt->execute([$this->id]);
            
            $artist_data = $stmt->fetch(PDO::FETCH_ASSOC);

            if($artist_data){
                return ['success'=>true, 'data'=>$artist_data];
            }
            return ['success'=>false, 'message'=>'Erro ao listar as informações do artista'];

        }

        public function checkIfThisUserExist($email){

            global $pdo;

            $stmt = $pdo->prepare("SELECT email FROM users WHERE email = ?");
            $stmt->execute([$email]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user){
                return true;
            }
            return false;
        }

    }