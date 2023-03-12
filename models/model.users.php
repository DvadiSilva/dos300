<?php
    require_once("models/model.base.php");

    class Users extends Base{
        public function login($data){
            $data= $this-> sanitizer($data);

            $query= $this-> db-> prepare("
                SELECT 
                    user_id, name, username, email, password, phone, photo, biografy, isSubscriber, isWriter, isAdmin
                FROM 
                    users
                WHERE 
                    email= ?
            ");

            $query-> execute([
                $data["email"]
            ]);

            $user= $query-> fetch();

            if(!empty($user) && password_verify($data["password"], $user["password"])){
                    
                return $user;
            }

            return [];
        }
    }