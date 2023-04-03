<section>
    <div class="container-fluid text-center">
        <?php require("view.products_nav.php")?>
        <div class="row">
            <?php
                foreach($products as $product){
                    echo '
                        <div class="col m-1 d-flex justify-content-center">
                            <div class="card p-2 product-card align-items-center" style="width: 18rem;">
                                <img src="'.$product["image"].'" class="card-img-top" alt="...">
                                <div class="card-body d-flex flex-column justify-content-around align-items-center">
                                    <h5 class="card-title">'.$product["name"].'</h5>
                                    <p class="card-text">'.$product["price"].'€</p>
                                    <a href="/products/page/category/'.$product["product_id"].'" class="btn btn-primary">Adicionar</a>
                                </div>
                            </div>
                        </div>
                    ';
                }
            ?>
        </div>  
    </div>
<?php
    if(empty($url_parts[3])){
?>
        <nav class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item">
                    <a 
                        class="page-link <?= $page==1? "d-none":"" ?>" 
                        href="/products/<?= $page==1? $page:$page-1 ?>" 
                        aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item">
                    <a 
                        class="page-link <?= $page==1? "d-none":"" ?>" 
                        href="/products/<?= $page==1? $page:$page-1 ?>">
                        <?= $page==1? "-":$page-1 ?>
                    </a>
                </li>
                <li class="page-item">
                    <a 
                        class="page-link disabled" 
                        href="/products/<?= $page ?>">
                        <?= $page ?>
                    </a>
                </li>
                <li class="page-item">
                    <a 
                        class="page-link <?=isset($empty)=== true? "d-none":"" ?>"
                        href="/products/<?= $page+1 ?>">
                        <?=isset($empty)=== true? "-": $page+1 ?>
                    </a>
                </li>
                <li class="page-item">
                    <a 
                        class="page-link <?=isset($empty)=== true? "d-none":"" ?>" 
                        href="/products/<?= $page+1 ?>" 
                        aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
<?php
    }
    else{
?>
        <nav class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item">
                    <a 
                        class="page-link <?= $page==1? "d-none":"" ?>" 
                        href="/products/<?= $page==1? $page:$page-1 ?>/<?= $currentCategory["url_name"]?>" 
                        aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item">
                    <a 
                        class="page-link <?= $page==1? "d-none":"" ?>" 
                        href="/products/<?= $page==1? $page:$page-1 ?>/<?= $currentCategory["url_name"]?>">
                        <?= $page==1? "-":$page-1 ?>
                    </a>
                </li>
                <li class="page-item">
                    <a 
                        class="page-link disabled" 
                        href="/products/<?= $page ?>/<?= $currentCategory["url_name"]?>">
                        <?= $page ?>
                    </a>
                </li>
                <li class="page-item">
                    <a 
                        class="page-link <?=isset($empty)=== true? "d-none":"" ?>"
                        href="/products/<?= $page+1 ?>/<?= $currentCategory["url_name"]?>">
                        <?= isset($empty)=== true? "-": $page+1 ?>
                    </a>
                </li>
                <li class="page-item">
                    <a 
                        class="page-link <?= isset($empty)=== true? "d-none":"" ?>" 
                        href="/products/<?= $page+1 ?>/<?= $currentCategory["url_name"]?>" 
                        aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
<?php
    }
?>

</section>