<?php
    require("layouts/view.header.php");
?>

<section class="d-flex justify-content-center align-items">
    <div id="carouselExampleIndicators" class="carousel slide border border-dark border-3 mw-100" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/slider/iphone.webp" class="" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/images/slider/tv.jpg" class="" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/images/slider/escritorio.jpg" class="" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/images/slider/passadeira.jpg" class="" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/images/slider/eletrodomesticos.jpg" class="" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/images/slider/carro.jpg" class="" alt="...">
            </div>
            
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<section class="p-3 d-flex justify-content-around align-items-center">
    <?php
        foreach($categories as $category){
            echo '
                <a href="/products/'.$category["url_name"].'" class="nav-link d-flex flex-column align-items-center">
                    <img src="'.$category["image"].'" alt="" class="home-balloon border border-dark">
                    '.$category["name"].'
                </a>
            ';
        }
    ?>
</section>

<?php
    require("layouts/view.footer.php");
?>