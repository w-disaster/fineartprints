<div class="flex-grow-1 subtle-pattern">
    <div class="container-fluid bg-white flex-flow-row-wrap subtle-pattern">
        <div class="container pb-4 px-4">
            <div class="row">
                <div class="container rounded bg-white shadow-sm">
                    <h1 class="text-center text-info mt-4 display-4">Shopping cart</h1>
                    <p class="text-center lead">Review the prints you have chosen and then checkout</p>
                </div>
            </div>
            <div class="row">
                <div class="container rounded bg-white shadow-sm my-4 py-5 px-5">
                    <div class="bg-light rounded-pill px-4 pt-3 pb-4 text-uppercase font-weight-bold text-info"> Products list</div>
                    <?php if(!empty($templateParams["final_products"])): ?>
                    <?php foreach ($templateParams["final_products"] as $final_product): ?>
                    <div class="card mt-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?php echo UPLOAD_DIR.$final_product["image"] ?>" class="card-img" alt="<?php echo $final_product["title"] ?>">
                            </div>
                            <div class="col-md-6">
                                <a href="product-page.php?title=<?php echo str_replace(" ", "%20", $final_product["title"]) ?>" class="stretched-link">
                                    <div class="card-body">
                                        <h2 class="card-title h5"><?php echo $final_product["title"] ?></h2>
                                        <p class="card-text p-0 m-0 text-muted font-weight-normal font-italic">Print id: <?php echo $final_product["print_id"] ?></p>
                                        <p class="card-text p-0 m-0 text-muted font-weight-normal font-italic">Dimensions: <?php echo $final_product["height"] ?> cm &times; <?php echo $final_product["width"] ?> cm</p>
                                        <p class="card-text p-0 m-0 text-muted font-weight-normal font-italic"> Printing technique: <?php echo $final_product["technique"] ?></p>
                                        <p class="card-text p-0 m-0 text-muted font-weight-normal font-italic">Frame: <?php echo $final_product["frame"] ?></p>
                                        <p class="card-text p-0 m-0 text-muted font-weight-normal font-italic">Passpartout: <?php echo $final_product["passpartout"] ?></p>
                                        <p class="card-text h5 pt-2 font-weight-bold">Price: <?php echo $final_product["price"] ?> &euro;
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-2 d-flex justify-content-center align-items-center">
                                <button class="btn my-3
                                mx-auto btn-danger align-end" type="button">Remove</button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?><p class="mt-3 lead ml-2">The cart is empty, <a href="shop.php">let's explore the shop</a>.</p><?php endif; ?><div class="bg-light rounded-pill my-4 p-4 text-uppercase font-weight-bold text-info"> Total price: <?php echo $templateParams["total_price"]; ?> &euro;</div><?php if($templateParams["logged"]): ?><a href="checkout.php" class="btn btn-primary rounded-pill py-2 btn-block">Proceed to checkout</a><?php else: ?><a href="login.php" class="btn btn-primary rounded-pill py-2 btn-block mt-5">Login to go to checkout</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/handle-cart-items.js"></script>