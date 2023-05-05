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

    $allProducts= $modelProducts-> getAllSaleProducts();

    //$maxPage= (int)round(count($allProducts)/12, 0, PHP_ROUND_HALF_UP) +1;
    $maxPage= ceil(count($allProducts)/12);
    
    $empty=false;

    if(empty($page)){
        $page=1;
        $products= $modelProducts-> get12SaleProducts($page);
    }
    elseif(!empty($page) && is_numeric($page) && $page> 0 && $page <=$maxPage){

        if(!empty($url_parts[3]) && in_array($url, $accessList)){
            $allCategoryProducts= $modelProducts-> getAllCategorySaleProducts($url);
            
            $maxPage= round(count($allCategoryProducts)/12, 0, PHP_ROUND_HALF_UP) +1;
            
            $products= $modelProducts-> get12CategorySaleProducts($url, $page);

            $currentCategory= $modelCategories-> getCategory($url);

            $subcategories= $modelCategories-> getSubcategories($url);
        }
        elseif(empty($url_parts[3])){
            $products= $modelProducts-> get12SaleProducts($page);
        }
        else{
            http_response_code(400);
        
            $message= "Invalid URL";
            $title= "Error";

            require("views/layouts/view.error.php");
            exit;
        }

        if(!isset($url)){
            $nextPageProducts= $modelProducts-> get12SaleProducts($page+1);
            
            if(count($nextPageProducts)<1){
                $maxPage= $page;
                $empty= true;
            }
            else{
                $maxPage= $page+1;
                $empty= false;
            }
        }
        else{
            $nextPageProducts= $modelProducts-> get12CategorySaleProducts($url, $page+1);
            
            if(count($nextPageProducts)<1){
                $maxPage= $page;
                $empty= true;
            }
            else{
                $maxPage= $page+1;
                $empty= false;
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
    
    $title= "Promoções";

    require("views/view.sales.php");
?>