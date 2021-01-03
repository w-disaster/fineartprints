<div class="flex-grow-1 subtle-pattern">
    <div class="container-fluid flex-flow-row-wrap">
        <main class="h-100 container-fluid pb-5 px-4">
            <div class="container col-10 offset-1 shadow-sm bg-light border pb-1 mt-4 pt-1 px-0 mb-5">
                <div class="row m-0 h-50">
                    <div id="carouselExampleControls" class="carousel slide col-12 col-md-7 p-0 px-1
                    d-flex align-items-center" data-ride="carousel">
                        <div id="carousel" class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="w-100 mx-auto" src="./upload/slideshow/NatureBlue.webp" alt="">
                            </div>
                            <div class="carousel-item">
                                <img class="w-100" src="./upload/slideshow/NatureGreen.webp" alt="">
                            </div>
                            <div class="carousel-item">
                                <img class="w-100" src="./upload/slideshow/Street2.webp" alt="">
                            </div>
                            <div class="carousel-item">
                                <img class="w-100" src="./upload/slideshow/Space2.webp" alt="">
                            </div>
                            <div class="carousel-item">
                                <img class="w-100" src="./upload/slideshow/Arc1.jpg" alt="">
                            </div>
                            <div class="carousel-item">
                                <img class="w-100" src="./upload/slideshow/Space3.webp" alt="">
                            </div>
                            <div class="carousel-item">
                                <img class="w-100" src="./upload/slideshow/Street3.webp" alt="">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span id="left" class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span id="right" class="sr-only">Next</span>
                        </a>
                    </div>                 
            
                    <div class=" col-10 offset-1 col-md-5 offset-md-0 align-self-center">
                        <div class="aside py-0">
                            <p class="col-12 text-center"
                                style="font-size: 18px;">Discover thousands of art prints of all types and
                                genres, from
                                all over
                                the world</p>
                            <div class="col-12 col-md-12 py-3 text-center">
                                <a class="btn-primary border px-4 py-2" style="font-size:20px" href="#">Explore</a>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2 mx-0">
                <div class="col-3 col-md-1 offset-1 offset-md-1 p-0">
                    <p class="text-center text-monospace m-0 bg-light" style="font-size:20px;">Sales
                    </p>
                </div>
            </div>

            <div class="row m-0 mb-5">
                <div class="col-1 col-md-1 p-0">
                </div>
                    <ul class="nav text-center col-10 col-md-8 bg-light p-0">
                    <?php foreach($templateParams["salespictures"] as $salepicture): ?>
                        <li class="col-6 col-md-3 nav-item mt-2 p-2">
                            <img class="img-fluid p-0" src="<?php echo UPLOAD_DIR.$salepicture["Image"];?>" alt="" style="max-height:120px;"/>
                            <p class="mt-3 bm-0"><?php echo $salepicture["Title"];?></p>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                <div class="aside col-10 col-md-2 offset-1 offset-md-0 nav-item bg-light d-flex align-items-center p-0">
                    <div class="col-4 col-md-6 offset-4 offset-md-3 p-0 mb-5">
                        <a class="col-12 col-md-12 btn btn-primary py-3 m-0 border" href="#">More</a>
                    </div>
                </div>
            </div>

            <div class="row m-0">
                <div class="col-3 col-md-1 offset-1 offset-md-1 p-0">
                    <p class="text-center text-monospace m-0 bg-light" style="font-size:20px;">Latest
                    </p>
                </div>
            </div>
            
            <div class="row m-0">
                <div class="col-1 col-md-1 p-0">
                </div>
                <ul class="nav text-center col-10 col-md-8 bg-light p-0">
                    <?php foreach($templateParams["latestpictures"] as $latestpicture): ?>
                    <li class="col-6 col-md-3 nav-item mt-2 p-2">
                        <img class="img-fluid p-0" src="<?php echo UPLOAD_DIR.$latestpicture["Image"];?>" alt="" style="max-height:120px;"/>
                        <p class="mt-3 bm-0"><?php echo $latestpicture["Title"];?></p>
                    </li>
                    <?php endforeach;?>
                </ul>
                <div
                    class="aside col-10 col-md-2 offset-1 offset-md-0 nav-item bg-light d-flex align-items-center p-0">
                    <div class="col-4 col-md-6 offset-4 offset-md-3 p-0 mb-5">
                        <a class="col-12 col-md-12 btn btn-primary py-3 m-0 border" href="#">More</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>