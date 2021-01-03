<div class="flex-grow-1 subtle-pattern">
    <div class="container-fluid flex-flow-row-wrap">
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
                        <div class="col-6 p-0">
                            <p class="ml-1 my-0 text-left" style="font-size:20px;">Notifications
                            <span id = "badge" class="badge badge-primary badge-pill"><?php echo $i ?></span></p>
                        </div>
                        <div class=" row col-6 p-0 m-0">
                            <div class="col-6 offset-1 col-md-8 mt-1 p-0 text-right">
                                <form class="p-0 m-0" method="POST">
                                <input class ="d-none" id ="notifnumber" name="notif" value ="<?php echo $i ?>"/>
                                <button id="clear" type="submit" class="btn btn-primary border col-12 col-md-5">Clear</button>
                                </form>
                            </div>
                            <div class="col-5 col-md-3 p-0 text-right">
                                <button id="data-toggle" data-toggle="collapse" class="navbar-toggler m-1" data-target="#navcol-2"></button>
                                <span class="sr-only">Toggle navigation</span>
                                <span class="navbar-toggler-icon"></span>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse" id="navcol-2">
                            <ul class="nav navbar-nav ml-auto text-center">
                                <li class="row nav-item border-top mx-0" style="font-size:14px;">
                                    <p class = "col-4 mt-3 mb-0">Date</p>
                                    <p class = "col-3 mt-3 mb-0">Order id</p>
                                    <p class = "col-5 mt-3 mb-0">Order status</p>
                                </li>
                                <?php foreach($templateParams["notifications"] as $notification):?>
                                <li class="nav-item row border-top mx-0" style="font-size:14px;">
                                    <p class = "col-4 mt-3 mb-0"><?php echo $notification["Data"] ?></p>
                                    <p class = "col-3 mt-3 mb-0"><?php echo $notification["Order_id"] ?></p>
                                    <p class = "col-5 mt-3 mb-0"><?php echo $notification["Order_status"] ?></p>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="row offset-1 col-10 offset-1">
                    <div class="form-group mt-3 col-5 col-md-4 p-0">
                        <label for="ship_option">Order status</label>
                        <select id="ship_option" name="ship_option" class="form-control col-10">
                            <option selected value="All">All</option>
                            <option value="In production">In production</option>
                            <option value="Shipped">Shipped</option>
                            <option value="Incoming">Incoming</option>
                            <option value="Arrived">Arrived</option>
                        </select>
                    </div>
                    <div class="form-group mt-3 col-6 col-md-4 offset-1 p-0">
                        <label for="date_option">Order date options</label>
                        <select id="date_option" name="date_option" class="form-control col-12 col-md-10">
                            <option selected value="All">All</option>
                            <option value="30">Last month</option>
                            <option value="90">Last 3 months</option>
                            <option value="365">Last year</option>
                        </select>
                    </div>
                </div>
                <ul id ="order" class="nav col-12 col-md-12 p-0">
                </ul>
            </div>
        </main>
    </div>
</div>

<script src="js/customer-orders-summary.js"></script>