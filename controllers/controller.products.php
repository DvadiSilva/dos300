<?php
    if(!empty($url_parts[3])){
        $url= htmlspecialchars(strip_tags(trim($url_parts[3])));
    }

    if(!empty($url_parts[2])){
        $page= htmlspecialchars(strip_tags(trim($url_parts[2])));
    }

    require("models/model.categories.php");
    require("models/model.products.php");

    $modelCategories= new Categories();
    $modelProducts= new Products();

    $allCategories= $modelCategories-> getAllCategories();
    
    $accessList=[];
    
    foreach($allCategories as $category){
        $accessList[]= $category["url_name"];
    }

    $allProducts= $modelProducts-> getAllProducts();

    $maxPage= (int)round(count($allProducts)/12, 0, PHP_ROUND_HALF_UP) +1;

    if(empty($page)){
        $page=1;
        $products= $modelProducts-> get12Products($page);
    }
    elseif(!empty($page) && is_numeric($page) && $page> 0 && $page <=$maxPage){

        if(!empty($url_parts[3]) && in_array($url, $accessList)){
            $allCategoryProducts= $modelProducts-> getAllCategoryProducts($url);
            
            $maxPage= round(count($allCategoryProducts)/12, 0, PHP_ROUND_HALF_UP) +1;
            /*
            */
            $products= $modelProducts-> get12CategoryProducts($url, $page);

            $currentCategory= $modelCategories-> getCategory($url);

            $subcategories= $modelCategories-> getSubcategories($url);
        }
        elseif(empty($url_parts[3])){
            $products= $modelProducts-> get12Products($page);
        }
        else{
            http_response_code(400);
        
            $message= "Invalid URL";
            $title= "Error";

            require("views/layouts/view.error.php");
            exit;
        }

        if(!isset($url)){
            $nextPageProducts= $modelProducts-> get12Products($page+1);
            
            if(count($nextPageProducts)<1){
                $maxPage= $page;
                $empty= true;
            }
            else{
                $maxPage= $page+1;
            }
        }
        else{
            $nextPageProducts= $modelProducts-> get12CategoryProducts($url, $page+1);
            
            if(count($nextPageProducts)<1){
                $maxPage= $page;
                $empty= true;
            }
            else{
                $maxPage= $page+1;
            }
        }
    }
    else{
        http_response_code(400);
        
        $message= "Invalid URL";
        $title= "Error";

        require("views/layouts/view.error.php");
        exit;
    }

    $categories= $modelCategories-> getOriginCategories();

    if(empty($categories)){
        http_response_code(500);
    
        $message= "Internal Server Error";
        $title= "Error";
    
        require("views/layouts/view.error.php");
        exit;
    }

    if(isset($url_parts[2]) && $url_parts[2]== 0){
        http_response_code(400);
        
        $message= "Invalid URL";
        $title= "Error";

        require("views/layouts/view.error.php");
        exit;
    }

    if(empty($products)){
        http_response_code(500);
    
        $message= "Internal Server Error";
        $title= "Error";
    
        require("views/layouts/view.error.php");
        exit;
    }
    /*
    elseif($page>$maxPage && empty($products)){
        http_response_code(500);
        
        $message= "Internal Server Error";
        $title= "Error";
        
        require("views/layouts/view.error.php");
        exit;
    }    
*/
    $title= "Produtos";

    require("views/view.products.php");
?>