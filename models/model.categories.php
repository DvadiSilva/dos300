<?php
    require_once("models/model.base.php");

    class Categories extends Base{
        
        public function getOriginCategories(){
            $query= $this-> db-> prepare("
                SELECT
                    category_id, name, url_name, image, parent_id
                FROM
                    categories
                WHERE
                    parent_id = ?
            ");

            $query-> execute([0]);

            return $query-> fetchAll();
        }
    }
?>