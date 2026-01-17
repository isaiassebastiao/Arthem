<?php

    class ArtistReport{

        private $artist_id;
        private $artwork_id; 
        private $report_reason_id;

        public function reportArtist($artist_id, $artwork_id, $report_reason_id){

            $this->artist_id = $artist_id;
            $this->artwork_id = $artwork_id;
            $this->report_reason_id = $report_reason_id;

            global $pdo;

            $stmt = $pdo->prepare("INSERT INTO artists_reports(artist_id, artwork_id, report_reason_id) VALUES(?,?,?)");
            
            $artist_reported = $stmt->execute([$this->artist_id, $this->artwork_id, $this->report_reason_id]);

            if($artist_reported){
                return ['success'=>true, 'message'=>'Artista denunciado com sucesso!'];
            }
            return ['success'=>false, 'message'=>'Algo deu errado ao fazer a denúncia, tente novamente!'];
        }

        public function getAllReportedArtists(){

            global $pdo;

            $stmt = $pdo->prepare("SELECT artists_reports.id, artists_reports.artist_id, artists.nome, artists_reports.artwork_id, artworks.title, artworks.artwork_path, artists_reports_reason.reason, artists_reports.reported_at, artists_reports_status.status AS 'report_status' FROM artists_reports JOIN artists_reports_reason ON artists_reports.report_reason_id = artists_reports_reason.id JOIN artists_reports_status ON artists_reports.artist_reports_status_id = artists_reports_status.id JOIN artworks ON artists_reports.artwork_id = artworks.id JOIN artists ON artists_reports.artist_id = artists.id");

            $stmt->execute();

            $all_reported_artists = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($all_reported_artists){
                return ['success'=>true, 'data'=>$all_reported_artists];
            }
            return ['success'=>false, 'message'=>'Artistas denunciados aparecem aqui'];

        }

        public function getReportFromArtist($artwork_id){
            
            $this->artwork_id = $artwork_id;

            global $pdo;

            $stmt = $pdo->prepare("SELECT artists_reports.artist_id, artists.nome, artworks.title, artists_reports.artwork_id, artworks.artwork_path, artists_reports_reason.reason, artists_reports_reason.description, artists_reports_status.status AS 'report_status' FROM artists_reports JOIN artists_reports_reason ON artists_reports.report_reason_id = artists_reports_reason.id JOIN artists_reports_status ON artists_reports.artist_reports_status_id = artists_reports_status.id JOIN artworks ON artists_reports.artwork_id = artworks.id JOIN artists ON artists_reports.artist_id = artists.id WHERE artists_reports.artwork_id = ?");

            $stmt->execute([$this->artwork_id]);

            $reported_artist = $stmt->fetch(PDO::FETCH_ASSOC);

            if($reported_artist){
                return ['success'=>true, 'data'=>$reported_artist];
            }
            return ['success'=>false, 'message'=>'Algo deu errado ao pegar as informações sobre a denúncia desse artista, tente novamente!'];
        }
        
        public function disableReportedArtistArtwork($artwork_id, $report_id){

            $this->artwork_id = $artwork_id;
            $artwork_status_id = 4;

            global $pdo;

            $stmt = $pdo->prepare("UPDATE artworks SET artwork_stastus_id = ? WHERE id = ?");
            $reported_artwork_disabled = $stmt->execute([$artwork_status_id, $this->artwork_id]);

            if($reported_artwork_disabled){

                $reported_artwork_status_changed = $this->changeReportedArtworkStatus($report_id);

                if($reported_artwork_status_changed){
                    return ['success'=>true, 'message'=>'Obra de Artista desactivada com sucesso!'];
                }
            }
            return ['success'=>false, 'message'=>'Erro ao desactivar a obra desse artista, tente novamente!'];
        }

        public function changeReportedArtworkStatus($report_id){

            global $pdo;

            $artist_reports_status_id = 2;

            $stmt = $pdo->prepare("UPDATE artists_reports SET artist_reports_status_id = ? WHERE id = ?");
            $reported_artwork_status_changed = $stmt->execute([$artist_reports_status_id, $report_id]);

            if($reported_artwork_status_changed){
                return true;
            }
            return false;
        }
    }