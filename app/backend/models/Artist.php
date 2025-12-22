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

            $stmt = $pdo->prepare("INSERT INTO artists(nome, email,	password, phone_number, category_id, biography) VALUES(?,?,?,?,?,?)");

            $artist_signed_up = $stmt->execute([$this->name, $this->email, $this->password, $this->phone_number, $this->category_id, $this->biography]);

            if($artist_signed_up){
                return ['success'=>true, 'message'=>'Cadastro Feito com sucesso!', 'redirect'=>'../pages/auth.php?action=signIn'];
            }
            return ['success'=>false, 'message'=>'Erro ao realizar o cadastro, tente novamente!'];

        }

        public function artistAutenticator($email, $password){
            
            $this->email = $email;
            $this->password = $password;

            global $pdo;

            $stmt = $pdo->prepare("SELECT * FROM artists WHERE email = ?");
            $stmt->execute([$this->email]);
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user){

                if(password_verify($this->password, $user['password'])){
                    
                    session_start();
                    $_SESSION['id'] = $user['id'];

                    return ['success'=>true, 'message'=>'Login realizado com sucesso!', 'redirect'=>'../pages/artist_dashboard.php'];
                }
            }
            return ['success'=>false, 'message'=>'Erro, email ou senha inválidos!'];

        }

        public function viewAllArtistsData(){

            global $pdo;

            $stmt = $pdo->prepare("SELECT artists.id, artists.nome, artists.email, artists.password, artists.phone_number, artists.biography, categories.category, artists.created_at FROM artists JOIN categories on artists.category_id = categories.id ORDER BY created_at DESC");

            $stmt->execute();

            $all_artists_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($all_artists_data){
                return ['success'=>true, 'data'=>$all_artists_data];
            }
            return ['success'=>false, 'message'=>'Erro ao listar os artistas'];
            
        }

        public function viewArtistData($id){

            $this->id = $id;

            global $pdo;

            $stmt = $pdo->prepare("SELECT artists.id, artists.nome, artists.email, artists.password, artists.phone_number, artists.biography, categories.category, artists.created_at FROM artists JOIN categories on artists.category_id = categories.id WHERE artists.id = ?");

            $stmt->execute([$this->id]);
            
            $artist_data = $stmt->fetch(PDO::FETCH_ASSOC);

            if($artist_data){
                return ['success'=>true, 'data'=>$artist_data];
            }
            return ['success'=>false, 'message'=>'Erro ao listar as informações do artista'];

        }

    }