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

        public function getAllUsers(){
            $query= $this-> db-> prepare("
                SELECT
                    user_id, name, username, email, phone, isSubscriber, isWriter, isAdmin
                FROM
                    users
            ");

            $query-> execute();

            return $query-> fetchAll();
        }

        public function create($data){
            $data= $this-> sanitizer($data);

            $query= $this-> db-> prepare("
                INSERT INTO users
                (name, username, email, password, phone, photo, isSubscriber, isWriter, isAdmin)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");

            $query-> execute([
                $data["name"],
                $data["username"],
                $data["email"],
                password_hash($data["password"], PASSWORD_DEFAULT),
                $data["phone"],
                isset($data["photo"])? $data: "/images/random/defaultUserPic.png",
                isset($data["isSubscriber"])? $data["isSubscriber"]: 0,
                isset($data["isWriter"])? $data["isWriter"]: 0,
                isset($data["isAdmin"])? $data["isAdmin"]: 0,
            ]);

            $lastCreatedUserId= $this-> db-> lastInsertId();

            $query= $this-> db-> prepare("
                SELECT 
                    user_id, name, username, email, phone, photo, biografy, isSubscriber, isWriter, isAdmin
                FROM 
                    users
                WHERE
                    user_id= ?
            ");

            $query-> execute([$lastCreatedUserId]);

            return $query-> fetch();
        }
    }