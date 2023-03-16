<?php
    require_once("models/model.base.php");

    class Products extends Base{
        
        public function getAllProducts(){
            $query= $this-> db-> prepare("
                SELECT
                    product_id, name, image, price, stock, category_id
                FROM
                    products
                ORDER BY
                    created_at DESC
            ");

            $query-> execute();

            return $query-> fetchAll();
        }
/*
        public function getTenProducts(){
            $query= $this-> db-> prepare("
                SELECT
                    product_id, name, image, price, stock, category_id
                FROM
                    products
                ORDER BY
                    created_at DESC
                LIMIT
                    12
            ");

            $query-> execute();

            return $query-> fetchAll();
        }

        public function getNextProducts($page){
            $page= $page*12;

            $query= $this-> db-> prepare("
                SELECT
                    product_id, name, image, price, stock, category_id
                FROM
                    products
                ORDER BY
                    created_at DESC
                LIMIT
                    $page, 12
            ");


            $query-> execute([]);

            return $query-> fetchAll();
        }
*/

        public function get12Products($page){
            $page= $page*12-12;

            $query= $this-> db-> prepare("
                SELECT
                    product_id, name, image, price, stock, category_id
                FROM
                    products
                ORDER BY
                    created_at DESC
                LIMIT
                    $page, 12
            ");


            $query-> execute([]);

            return $query-> fetchAll();
        }

        public function getAllCategoryProducts($url){
            $query= $this-> db-> prepare("
                SELECT
                    news_id, title, summary, post_date, image
                FROM
                    news
                WHERE
                    category_id= ?
                ORDER BY
                    post_date DESC
            ");

            $query-> execute([$id]);

            return $query-> fetchAll();
        }
    }
?>