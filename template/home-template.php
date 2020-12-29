<main class="h-100 container-fluid pb-5 px-4">
    <div class="container col-10 col-lg-10 offset-1 offset-lg-1 shadow-sm bg-white border pb-1 mt-4 pt-1 px-0 mb-5">
        <div class="row m-0 h-50">
            <div class="col-12 col-lg-7 p-0 m-0 d-flex align-items-center">
                <div class="col-2 col-lg-2 p-1 m-0 text-center">
                    <a class="btn btn-primary" id="left" href="#">L</a>
                </div>                            
                <div id="div-img" class="col-8 col-lg-8 p-0 my-3 text-center">
                </div>
                <div class="col-2 col-lg-2 p-1 m-0 text-center">
                    <a class="btn btn-primary" id="right" href="#">R</a>
                </div>                 
            </div>
            <div class=" col-10 offset-1 col-lg-4 offset-lg-0 align-self-center">
                <div class="aside py-0">
                    <p class="col-12 col-lg-12 text-center"
                        style="font-size: 20px;">Discover thousands of art prints of all types and
                        genres, from
                        all over
                        the world</p>
                    <div class="col-12 col-lg-12 py-3 text-center">
                        <button class="btn-primary border px-4 py-2" style="font-size:20px" href="#">Explore</button>
                    </div>  
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2 mx-0">
        <div class="col-3 col-md-1 offset-1 offset-md-1 p-0">
            <p class="text-center text-monospace m-0 bg-white" style="font-size:20px;">Sales
            </p>
        </div>
    </div>

    <div class="row m-0 mb-5">
        <div class="col-1 col-md-1 p-0">
        </div>
            <ul class="nav text-center col-10 col-md-8 bg-white p-0">
            <?php foreach($templateParams["salespictures"] as $salepicture): ?>
                <li class="col-6 col-md-3 nav-item mt-2 p-2">
                    <img class="img-fluid p-0" src="<?php echo UPLOAD_DIR.$salepicture["Image"];?>" alt="" style="max-height:120px;"/>
                    <p class="mt-3 bm-0"><?php echo $salepicture["Title"];?></p>
                </li>
                <?php endforeach; ?>
            </ul>
        <div class="aside col-10 col-md-2 offset-1 offset-md-0 nav-item bg-white d-flex align-items-center p-0">
            <div class="col-4 col-md-6 offset-4 offset-md-3 p-0 mb-5">
                <a class="col-12 col-md-12 btn btn-primary py-3 m-0 border" href="#">More</a>
            </div>
        </div>
    </div>

    <div class="row m-0">
        <div class="col-3 col-md-1 offset-1 offset-md-1 p-0">
            <p class="text-center text-monospace m-0 bg-white" style="font-size:20px;">Latest
            </p>
        </div>
    </div>
    
    <div class="row m-0">
        <div class="col-1 col-md-1 p-0">
        </div>
        <ul class="nav text-center col-10 col-md-8 bg-white p-0">
            <?php foreach($templateParams["latestpictures"] as $latestpicture): ?>
            <li class="col-6 col-md-3 nav-item mt-2 p-2">
                <img class="img-fluid p-0" src="<?php echo UPLOAD_DIR.$latestpicture["Image"];?>" alt="" style="max-height:120px;"/>
                <p class="mt-3 bm-0"><?php echo $latestpicture["Title"];?></p>
            </li>
            <?php endforeach;?>
        </ul>
        <div
            class="aside col-10 col-md-2 offset-1 offset-md-0 nav-item bg-white d-flex align-items-center p-0">
            <div class="col-4 col-md-6 offset-4 offset-md-3 p-0 mb-5">
                <a class="col-12 col-md-12 btn btn-primary py-3 m-0 border" href="#">More</a>
            </div>
        </div>
    </div>
</main>