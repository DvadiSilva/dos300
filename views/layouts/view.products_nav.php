<div class="p-1 d-flex justify-content-around align-items-center">
<?php
    foreach($categories as $category){
        echo '
            <a href="/products/'.$category["url_name"].'" class="nav-link d-flex flex-column align-items-center">
                <img src="'.$category["image"].'" alt="" class="product_nav-balloon border border-dark">
                '.$category["name"].'
            </a>
        ';
    }
?>
</div>

<?php
    if(!empty($subcategories)){
        echo '
            <div class="p-1 d-flex justify-content-around align-items-center">';
                foreach($subcategories as $subcategory){
                    echo '
                        <a href="/products/{{$subcategory->url_name}}" class="nav-link d-flex flex-column align-items-center">
                            <img src="{{$subcategory->image}}" alt="" class="product_nav-balloon border border-dark">
                            {{$subcategory->name}}
                        </a>
                    ';
                }
            '</div>
        ';
    }
?>