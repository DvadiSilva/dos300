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
                    products.product_id, products.name, products.image, products.price, products.stock, products.category_id
                FROM
                    products
                INNER JOIN
                    products_categories USING (product_id)
                WHERE
                    products_categories.category_id = ?
                ORDER BY
                    products.created_at DESC
            ");

            $query-> execute([$category["category_id"]]);

            return $query-> fetchAll();
        }

        public function get12CategoryProducts($url, $page){
            $page= $page*12-12;

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
                    products.product_id, products.name, products.image, products.price, products.stock, products.category_id
                FROM
                    products
                INNER JOIN
                    products_categories USING (product_id)
                WHERE
                    products_categories.category_id = ?
                ORDER BY
                    products.created_at DESC
                LIMIT
                    $page, 12
            ");

            $query-> execute([$category["category_id"]]);

            return $query-> fetchAll();
        }

    }
?>