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
    <div class="col-10 col-md-10 offset-1 offset-md-1 px-0 bg-white border mb-4">
        <h2 class="offset-1 my-3 text-left pl-1">My orders</h2>
        <form class="row offset-1" method="POST">
            <div class="form-group mt-3 col-5 col-md-4 p-0">
                <label for="ship_option">Ship options</label>
                <select id="ship_option" name="ship_option" class="form-control col-10">
                    <option value="All" selected>All</option>
                    <option value="Shipped">Shipped</option>
                    <option value="Transit">In transit</option>
                </select>
            </div>
            <div class="form-group mt-3 col-5 col-md-4 ml-1 p-0">
                <label for="date_option">Order date options</label>
                <select id="date_option" name="date_option" class="form-control col-10">
                    <option value="1000" selected>All</option>
                    <option value="1">Last month</option>
                    <option value="3">Last 3 months</option>
                    <option value="12">Last year</option>
                </select>
            </div>
            <div class="form-group col-6 offset-2 col-md-3 offset-md-0 mt-5">
                <button type="submit" class="btn btn-primary col-md-12 border">Apply</button>
            </div>
        </form>
        <?php foreach($templateParams["orders"] as $order): ?>
        <ul class="nav col-12 col-md-12 p-0">
            <li class="nav item mb-3">
                <div class="row p-0 col-12 col-md-12 ml-1 d-flex align-items-center">
                    <div class="col-10 offset-1 col-md-10 offset-md-1 bg-primary text-white p-0">
                        <ul class="nav text-center">
                            <li class="nav-item col-8 col-md-9 m-0 py-2 text-left">Order date: 
                            <?php echo $order["Order_date"]?>
                            </li>
                            <li class="nav-item col-3 col-md-3 m-0 py-2">Total: /</li>
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
                                    <a class="col-12 col-md-12" href="#"><?php echo $product["Picture_title"] ?></a>
                                    <p class="col-12 col-md-12">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe atque reiciendis dolor nemo iste. Accusamus, porro quis aliquid at accusantium molestias eligendi assumenda corporis et ea? Cum enim ut doloremque.</p>
                                    <p class="col-12 col-md-12">Price: 25€</p>
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