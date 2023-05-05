<?php
    require_once("models/model.base.php");

    class Products extends Base{
        
        public function getAllProducts(){
            $query= $this-> db-> prepare("
                SELECT
                    product_id, name, image, price, stock, on_sale, price_sale
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
                    product_id, name, image, price, stock, on_sale, price_sale
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

//Category
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
                    products.product_id, products.name, products.image, products.price, products.stock, products.on_sale, products.price_sale
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
                    products.product_id, products.name, products.image, products.price, products.stock, products.on_sale, products.price_sale
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
//Sale
        public function getAllSaleProducts(){
            $query= $this-> db-> prepare("
                SELECT
                    product_id, name, image, price, stock, on_sale, price_sale
                FROM
                    products
                WHERE
                    on_sale = 1
                ORDER BY
                    created_at DESC
            ");

            $query-> execute();

            return $query-> fetchAll();
        }

        public function get12SaleProducts($page){
            $page= $page*12-12;

            $query= $this-> db-> prepare("
                SELECT
                    product_id, name, image, price, stock, on_sale, price_sale
                FROM
                    products
                WHERE
                    on_sale = 1
                ORDER BY
                    created_at DESC
                LIMIT
                    $page, 12
            ");

            $query-> execute([]);

            return $query-> fetchAll();
        }

        public function getAllCategorySaleProducts($url){
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
                    products.product_id, products.name, products.image, products.price, products.stock, products.category_id, products.on_sale, products.price_sale
                FROM
                    products
                INNER JOIN
                    products_categories USING (product_id)
                WHERE
                    products_categories.category_id = ? AND products.on_sale = 1
                ORDER BY
                    products.created_at DESC
            ");

            $query-> execute([$category["category_id"]]);

            return $query-> fetchAll();
        }

        public function get12CategorySaleProducts($url, $page){
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
                    products.product_id, products.name, products.image, products.price, products.stock, products.category_id, products.on_sale, products.price_sale
                FROM
                    products
                INNER JOIN
                    products_categories USING (product_id)
                WHERE
                    products_categories.category_id = ? AND products.on_sale = 1
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