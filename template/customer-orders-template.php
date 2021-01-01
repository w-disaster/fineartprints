<main class="h-100 container-fluid px-0">   
    <div class="row mx-0 mt-3">
        <ul class="nav nav-pills col-10 col-md-5 offset-1 offset-md-1">
            <li class="nav-item col-5 col-md-5 text-center p-0">
                <a class="nav-link" href="customer-area.php">Profile</a>
            </li>
            <li class="nav-item col-5 col-md-5 text-center p-0">
                <a class="nav-link active" href="#">My orders</a>
            </li>
        </ul>
    </div>
    <div class="col-10 col-md-10 offset-1 px-0 bg-white border mb-4">
        <h2 class="my-3 text-center pl-1">My orders</h2>
        <nav class="navbar navbar-dark bg-dark border shadow-sm col-10 offset-1 p-0">
            <div class="container text-white p-0">
                <p class="ml-1 my-0" style="font-size:22px;">Notifications
                <span id = "badge" class="badge badge-primary badge-pill"><?php echo $i ?></span></p>
                <form class="form-group col-6 p-0 m-0" method="POST">
                    <input class ="d-none" id ="notifnumber" name="notif" value ="<?php echo $i ?>"></input>
                    <button id="clear" type="submit" class="btn btn-primary col-6 offset-8 col-md-4 border">Clear all</button>
                </form>
                <button id="data-toggle" data-toggle="collapse" class="navbar-toggler m-1" data-target="#navcol-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navcol-2">
                    <ul class="nav navbar-nav ml-auto text-center">
                        <li class="row nav-item border-top mx-0" style="font-size:14px;">
                            <p class = "col-4 mt-3 mb-0">Date</p>
                            <p class = "col-3 mt-3 mb-0">Order id</p>
                            <p class = "col-5 mt-3 mb-0">Description</p>
                        </li>
                        <?php foreach($templateParams["notifications"] as $notification):?>
                        <li class="nav-item row border-top mx-0" style="font-size:14px;">
                            <p class = "col-4 mt-3 mb-0"><?php echo $notification["Data"] ?></p>
                            <p class = "col-3 mt-3 mb-0"><?php echo $notification["Order_id"] ?></p>
                            <p class = "col-5 mt-3 mb-0"><?php echo $notification["Description"] ?></p>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </nav>
        <form class="row offset-1" method="POST">
            <div class="form-group mt-3 col-5 col-md-4 p-0">
                <label for="ship_option">Ship options</label>
                <select id="ship_option" name="ship_option" class="form-control col-10">
                    <option <?php if ($ship == 'All') { ?>selected="true" <?php }; ?>value="All">All</option>
                    <option <?php if ($ship == 'Shipped') { ?>selected="true" <?php }; ?>value="Shipped">Shipped</option>
                    <option <?php if ($ship == 'Transit') { ?>selected="true" <?php }; ?>value="Transit">In transit</option>
                </select>
            </div>
            <div class="form-group mt-3 col-6 ml-1 col-md-4 ml-1 p-0">
                <label for="date_option">Order date options</label>
                <select id="date_option" name="date_option" class="form-control col-10">
                    <option <?php if ($date == '1000') { ?>selected="true" <?php }; ?>value="1000">All</option>
                    <option <?php if ($date == '1') { ?>selected="true" <?php }; ?>value="1">Last month</option>
                    <option <?php if ($date == '3') { ?>selected="true" <?php }; ?>value="3">Last 3 months</option>
                    <option <?php if ($date == '12') { ?>selected="true" <?php }; ?>value="12">Last year</option>
                </select>
            </div>
            <div class="form-group col-8 offset-2 col-md-3 offset-md-0 mt-5">
                <button id="btn" type="submit" class="btn btn-primary col-6 offset-2 col-md-8 border">Apply</button>
            </div>
        </form>
        <?php foreach($templateParams["orders"] as $order): ?>
        <ul class="nav col-12 col-md-12 p-0">
            <li class="nav item mb-3">
                <div class="row p-0 col-12 col-md-12 ml-1 d-flex align-items-center">
                    <div class="col-10 offset-1 col-md-10 offset-md-1 bg-primary text-white p-0">
                        <ul class="nav text-left">
                            <li style="font-size:14px;" class="nav-item col-6 col-lg-2 m-0 py-2">Id: 
                            <?php echo $order["Order_id"]?>
                            </li>
                            <li style="font-size:14px;" class="nav-item col-6 col-lg-4 m-0 py-2">Order date: 
                            <?php echo $order["Order_date"]?>
                            </li>
                            <li style="font-size:14px;" class="nav-item col-6 col-lg-4 m-0 py-2">Shipping date: 
                            <?php echo $order["Shipped_date"]?>
                            </li>
                            <li style="font-size:14px;" class="nav-item col-6 col-lg-2 m-0 py-2">Total: /</li>
                        </ul>
                    </div>
                </div>
                <div class="row col-md-12 p-0 ml-1">
                    <div class="col-10 offset-1 offset-md-1 col-md-10 bg-light border-top border-right border-left">
                        <ul class="pl-4">
                            <?php foreach($templateParams["products"] as $product): ?>
                            <?php if($product["Order_id"] == $order["Order_id"]):?>
                            <li class="row border-bottom">
                                <div class="col-10 offset-1 offset-md-0 col-md-4 p-0 my-3 text-center">
                                    <img class="img-fluid" src="<?php echo UPLOAD_DIR.$product["Image"] ?>" style="max-height:200px" alt=""/>
                                </div>
                                <div class="col-12 col-md-8 my-3">
                                    <ul class="nav">
                                        <li class="nav-item"><a class="col-12 col-md-12" href="#"><?php echo $product["Picture_title"] ?></a></li>
                                        <li class="nav-item col-12 col-md-12"><p class="text-left m-0">Technique:
                                        <?php echo $product["Description"] ?></p></li>
                                        <li class="nav-item col-12 col-md-12"><p class="text-left m-0">Passpartout:
                                        <?php echo $product["Specifications"] ?></p></li>
                                        <li class="nav-item col-12 col-md-12"><p class="text-left m-0">Frame:
                                        <?php echo $product["Framedesc"] ?></p></li>
                                        <li class="nav-item col-12 col-md-12 text-left"><p class="text-left">Price:</p></li>
                                    </ul>
                                </div>
                            </li>
                            <?php endif;endforeach;?>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
        <?php endforeach;?>
    </div>
</main>

<script src="js/customer-order.js" type="text/javascript"></script>