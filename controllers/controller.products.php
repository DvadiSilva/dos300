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

/*
    $allCategories= $modelCategories-> getAllCategories();
    
    $accessList=[];
    
    foreach($allCategories as $category){
        $accessList[]= $category["url_name"];
    }
*/
    $allProducts= $modelProducts-> getAllProducts();

    $maxPage= round(count($allProducts)/12, 0, PHP_ROUND_HALF_UP) +1;

    if(empty($page)){
        //$products= $modelProducts-> getTenProducts();
        $page=1;
        $products= $modelProducts-> get12Products($page);
    }
    elseif(!empty($page) && is_numeric($page) && $page> 0 && $page <=$maxPage){
        $products= $modelProducts-> get12Products($page);
    }
    else{
        http_response_code(400);
        
        $message= "Invalid URL";
        $title= "Error";

        require("views/layouts/view.error.php");
        exit;
    }
/*
    if(empty($url)){
        $products= $modelProducts-> getTenProducts();
    }
    else if
    (
        !empty($url) && 
        (in_array($url, $accessList) || (is_numeric($url) && $url> 0 && $url <=$maxPage))
    ){
        if(is_numeric($url)){
            $products= $modelProducts-> getNextProducts($url);
        }
        else{
            echo 'bla not';
            $products= $modelProducts-> getAllProducts($url);
        }
    }
    else{
        http_response_code(400);
        
        $message= "Invalid URL";
        $title= "Error";

        require("views/layouts/view.error.php");
        exit;
    }
*/
    $categories= $modelCategories-> getOriginCategories();

    if(empty($categories)){
        http_response_code(500);
    
        $message= "Internal Server Error";
        $title= "Error";
    
        require("views/layouts/view.error.php");
        exit;
    }

    if($page==$maxPage){
        http_response_code(400);
        
        $message= "Invalid URL";
        $title= "Error";

        require("views/layouts/view.error.php");
        exit;
    }
    elseif($page==$maxPage && empty($products)){
        http_response_code(500);
    
        $message= "Internal Server Error";
        $title= "Error";
    
        require("views/layouts/view.error.php");
        exit;
    }

    $title= "Produtos";

    require("views/view.products.php");
?>