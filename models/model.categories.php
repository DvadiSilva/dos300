<?php
    require_once("models/model.base.php");

    class Categories extends Base{

        public function getAllCategories(){
            $query= $this-> db-> prepare("
                SELECT
                    category_id, name, url_name, image, parent_id
                FROM
                    categories
            ");

            $query-> execute();

            return $query-> fetchAll();
        }
        
        public function getOriginCategories(){
            $query= $this-> db-> prepare("
                SELECT
                    category_id, name, url_name, image, parent_id
                FROM
                    categories
                WHERE
                    parent_id IS NULL
            ");

            $query-> execute();

            return $query-> fetchAll();
        }

        public function getCategory($url){
            $query= $this-> db-> prepare("
                SELECT
                    category_id, name, url_name, image, parent_id
                FROM
                    categories
                WHERE
                    categories.url_name = ?
            ");

            $query-> execute([$url]);

            return $query-> fetch();
        }
        public function getSubcategories($url){
            $query= $this-> db-> prepare("
                SELECT
                    category_id, name, url_name, image, parent_id
                FROM
                    categories
                WHERE
                    categories.url_name = ?
            ");

            $query-> execute([$url]);

            $category= $query-> fetch();

            $query= $this-> db-> prepare("
                SELECT
                    category_id, name, url_name, image, parent_id
                FROM
                    categories
                WHERE
                    parent_id = ?
            ");

            $query-> execute([$category["category_id"]]);

            return $query-> fetchAll();
        }
    }
?>