<?php

    class Notification{

        private $message;
        private $user_id;
        private $artwork_id;
        private $notification_id;

        public function insertNotification($message, $user_id, $artwork_id){

            $this->message = $message;
            $this->user_id = $user_id;
            $this->artwork_id = $artwork_id;
            
            global $pdo;

            $stmt = $pdo->prepare("INSERT INTO notifications(message, user_id, artwork_id) VALUES(?,?,?)");

            $notification_inserted = $stmt->execute([$this->message, $this->user_id, $this->artwork_id]);
            if($notification_inserted){
                return ['success'=>true];
            }
            return ['success'=>false, 'message'=>'Algo deu errado, tente novamente!'];

        }

        public function getNewNotifications($user_id){

            $this->user_id = $user_id;
            
            global $pdo;
            $stmt = $pdo->prepare("SELECT notifications.message, notifications.user_id, notifications.artwork_id, notifications_status.status, notifications.date FROM notifications JOIN notifications_status ON notifications.notifications_status_id = notifications_status.id WHERE notifications.user_id = ?");

            $stmt->execute([$this->user_id]);
            $new_notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if($new_notifications){
                return ['success'=>true, 'data'=>$new_notifications];
            }
            return ['success'=>false, 'message'=>'Sem Notificações'];
        }

        public function setNotificationAsRead($notification_id){

            $this->notification_id = $notification_id;
            
            global $pdo;

            $stmt = $pdo->prepare("UPDATE notifications SET notifications_status_id = ? WHERE id = ?");

            return $this->warnings($stmt->execute([2, $this->notification_id]), 'Notificação marcada como lida');
            
        }

        public function setAllNotificationsAsRead($user_id){
            
            $this->user_id = $user_id;

            global $pdo;

            $stmt = $pdo->prepare("UPDATE notifications SET notifications_status_id = ? WHERE user_id = ?");

            return $this->warnings($stmt->execute([2, $this->user_id]), 'Notificações marcadas como lida');

        }

        public function deleteNotification($notification_id){

            $this->notification_id = $notification_id;
            
            global $pdo;
            
            $stmt = $pdo->prepare("DELETE FROM notifications WHERE id = ?");

            return $this->warnings($stmt->execute([$this->notification_id]), 'Notificação excluída com sucesso!');            
        }

        public function deleteAllNotifications($user_id){
            
            $this->user_id = $user_id;
            
            global $pdo;

            $stmt = $pdo->prepare("DELETE FROM notifications WHERE user_id = ?");

            return $this->warnings($stmt->execute([$this->user_id]), 'Notificações excluídas com sucesso!');
        }

        public function warnings($stmt, $message){

            if($stmt){
                return ['success'=>true,'message'=>$message];
            }
            return ['success'=>false,'message'=>'Algo deu errado, por favor, tente novamente!'];
        }
    }