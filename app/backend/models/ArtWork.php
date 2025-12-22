<?php

    class ArtWork{
        
        private $id;
        private $artist_id;
        private $title;
        private $description;
        private $price;
        private $artwork_path;

        #	id, artist_id, title, description, price, artwork_path
        public function publishArtWork($artist_id, $title, $description, $price, $artwork_path){

            $this->artist_id = $artist_id;
            $this->title = $title;
            $this->description = $description;
            $this->price = $price;
            $this->artwork_path = $artwork_path;

            global $pdo;

            $stmt = $pdo->prepare("INSERT INTO artworks(artist_id, title, description, price, artwork_path) VALUES(?,?,?,?,?)");
            $artwork_published = $stmt->execute([$this->artist_id, $this->title, $this->description, $this->price, $this->artwork_path]);

            if($artwork_published){
                return ['success'=>true, 'message'=>'Obra de Arte Publicada com sucesso!'];
            }
            return ['success'=>false, 'message'=>'Erro ao publicar a obra de arte, tente novamente!'];
        }

        public function getAllArtworks(){

            global $pdo;
            $stmt = $pdo->prepare("SELECT artworks.id, artworks.artist_id, artworks.title, artworks.description, artworks.price, artworks.artwork_path, artworks.featured, artwork_status.status ,artworks.created_at FROM artworks JOIN artwork_status on artworks.artwork_stastus_id = artwork_status.id ORDER BY artworks.created_at DESC");
            $stmt->execute();

            $all_artworks = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($all_artworks){
                return ['success'=>true, 'data'=>$all_artworks];
            }
            return ['success'=>false, 'message'=>'Erro ao listar as obras de arte'];

        }

        public function getAllArtistArtworks($artist_id){

            $this->artist_id = $artist_id;

            global $pdo;

            $stmt = $pdo->prepare("SELECT artworks.id, artworks.artist_id, artworks.title, artworks.description, artworks.price, artworks.artwork_path, artworks.featured, artwork_status.status ,artworks.created_at FROM artworks JOIN artwork_status on artworks.artwork_stastus_id = artwork_status.id WHERE artworks.artist_id = ?");
            $stmt->execute([$this->artist_id]);

            $all_artist_artworks = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($all_artist_artworks){
                return ['success'=>true, 'data'=>$all_artist_artworks];
            }
            return ['success'=>false, 'message'=>'Erro ao listar as obras de arte do artista'];

        }

        public function getArtwork($id){

            $this->id = $id;

            global $pdo;

            $stmt = $pdo->prepare("SELECT artworks.id, artworks.artist_id, artworks.title, artworks.description, artworks.price, artworks.artwork_path, artworks.featured, artwork_status.status ,artworks.created_at FROM artworks JOIN artwork_status on artworks.artwork_stastus_id = artwork_status.id WHERE artworks.id = ?");
            $stmt->execute([$this->id]);

            $artwork = $stmt->fetch(PDO::FETCH_ASSOC);

            if($artwork){
                return ['success'=>true, 'data'=>$artwork];
            }
            return ['success'=>false, 'message'=>'Erro ao listar as informações desta obra de arte'];
        }

        public function updateArtworkData($id, $artist_id, $title, $description, $price, $artwork_path){

            $this->id = $id;
            $this->artist_id = $artist_id;
            $this->title = $title;
            $this->description = $description;
            $this->price = $price;
            $this->artwork_path = $artwork_path;

            global $pdo;

            $stmt = $pdo->prepare("UPDATE artworks SET title = ?, description = ?, price = ?, artwork_path = ? WHERE id = ?");
            $artwork_updated = $stmt->execute([$this->title, $this->description, $this->price, $this->artwork_path, $this->id]);

            if($artwork_updated){
                return ['success'=>true, 'message'=>'Obra de Arte Atualizada com sucesso!'];
            }
            return ['success'=>false, 'message'=>'Erro ao atualizar as informações da obra de arte, tente novamente!'];

        }

        public function deleteArtWork($id){

            $this->id = $id;

            global $pdo;

            $stmt = $pdo->prepare("DELETE FROM artworks WHERE id = ?");
            $artwork_deleted = $stmt->execute([$this->id]);

            if($artwork_deleted){
                return ['success'=>true, 'message'=>'Obra de Arte excluída com sucesso!'];
            }
            return ['success'=>false, 'message'=>'Erro ao excluir a Obra de Arte'];
        }
    }