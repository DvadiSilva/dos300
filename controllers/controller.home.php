<?php    
    require("models/model.categories.php");

    $modelCategories= new Categories();
    $categories= $modelCategories-> getOriginCategories();

    if(empty($categories)){
        http_response_code(500);
    
        $message= "Internal Server Error";
        $title= "Error";
    
        require("views/view.error.php");
        exit;
    }

    $title= "Home";

    require("views/view.home.php");
?>