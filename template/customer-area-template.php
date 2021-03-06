<div class="flex-grow-1 subtle-pattern">
    <div class="container-fluid flex-flow-row-wrap">        
        <main class="h-100 container-fluid px-0">
            <div class="row mx-0 mt-3">
                <ul class="nav nav-pills col-12 col-md-6">
                    <li class="nav-item col-5 col-md-5 text-center p-0">
                        <a class="nav-link active bg-dark text-white" href="#">Profile</a>
                    </li>
                    <li class="nav-item col-5 col-md-5 text-center bg-white p-0">
                        <a class="nav-link text-dark" href="customer-orders-summary.php">My orders</a>
                    </li>
                </ul>
            </div>
            <div class="row mx-0 mb-4">
                <div class="col-12 col-md-6 px-0 bg-white border mb-4">
                    <form method="POST" id="personal-form" class="m-0">
                        <h2 class="text-center py-3">Personal information</h2>
                        <fieldset id="personal_fieldset" class="px-0" disabled>
                            <div class="form-group row text-center">
                                <label for="name" class="col-5">Name</label>
                                <input type="text" class="form-control col-6" id="name"
                                value="<?php echo $templateParams["personal_info"][0]["Name"] ?>"
                                 name="namef" required/>
                            </div>
                            <div class="form-group row text-center">
                                <label for="surname" class="col-5">Surname</label>
                                <input type="text" class="form-control col-6" id="surname"
                                value="<?php echo $templateParams["personal_info"][0]["Surname"] ?>"
                                 name="surname" required/>
                            </div>
                            <div id="form-old-password" class="form-group row text-center d-none">
                                <label for="old-password"  class="col-5">Old password</label>
                                <input type="password" class="form-control col-6"
                                id="old-password" name="old-password" required/>
                            </div>
                            <div id="form-new-password" class="form-group row text-center d-none">
                                <label for="new-password"  class="col-5"> New password</label>
                                <input type="password" class="form-control col-6" id="new-password"
                                    name="new-password" required/>
                            </div>
                            <div id="form-confirm-password" class="form-group row text-center d-none">
                                <label for="confirm-password"  class="col-5"> Confirm password</label>
                                <input type="password" class="form-control col-6"
                                id="confirm-password" name="confirm-password" required/>
                            </div>
                            <div class="form-group row text-center">
                                <label for="email" class="col-5">Email</label>
                                <input type="email" class="form-control col-6" id="email"
                                value="<?php echo$templateParams["personal_info"][0]["Email"] ?>"
                                 name="emailf" disabled/>
                            </div>
                            <div class="form-group row text-center">
                                <label for="phone"  class="col-5">Phone</label>
                                <input type="number" class="form-control col-6" id="phone"
                                value="<?php echo $templateParams["personal_info"][0]
                                ["Phone"] ?>" name="phone" required/>
                            </div>
                            <div class="form-group row text-center">
                                <label for="city"  class="col-5">City</label>
                                <input type="text" class="form-control col-6" id="city"
                                value="<?php echo $templateParams["personal_info"][0]["City"] ?>"
                                 name="city" required/>
                            </div>
                            <div class="form-group row text-center">
                                <label for="province"  class="col-5">Province</label>
                                <input type="text" class="form-control col-6" id="province"
                                value="<?php echo$templateParams["personal_info"][0]["Province"] ?>"
                                 name="province" required/>
                            </div>
                            <div class="form-group row text-center">
                                <label for="address"  class="col-5">Address</label>
                                <input type="text" class="form-control col-6" id="address"
                                value="<?php echo $templateParams["personal_info"][0]["Address"] ?>"
                                 name="address" required/>
                            </div>
                            <div class="form-group row text-center">
                                <label for="postal-code"  class="col-5">Postal Code</label>
                                <input type="number" class="form-control col-6" id="postal-code"
                                value="<?php echo $templateParams["personal_info"][0]["Postal_code"] ?>"
                                 name="postal-code" required/>
                            </div>
                            <div class="form-group row text-center">
                                <label for="birth-date" class="col-5">Birth date</label>
                                <input type="date" class="form-control col-6" id="birth-date"
                                value="<?php echo $templateParams["personal_info"][0]["Birth_date"] ?>"
                                 name="birth-date" required/>
                            </div>
                        </fieldset>
                        <div class="form-group col-12">
                            <p id="msgform" class="text-center <?php echo $msgformcolor?>"><?php echo $msgform ?></p>
                            <button id="edit" type="button" class="btn btn-primary col-4 col-md-4 offset-4 p-2">Edit</button>
                            <button id="cancel" type="submit" class="btn btn-primary col-4 col-md-4 offset-2 p-2 d-none">Cancel</button>
                            <button id="save" type="submit" class="btn btn-primary col-4 col-md-4 p-2 d-none">Save</button>
                        </div>
                    </form>      
                </div>
                <div class="aside col-12 col-md-6 px-0 mb-4 bg-white border">
                    <h2 class="text-center py-3 col-md-12">Payment information</h2>
                    <div class="row p-3">
                        <div class="col-12 col-md-12 table-responsive px-2">
                            <?php if (count($templateParams["pay_info"]) == 0):?>
                                <div class="col-10 offset-1 text-center">
                                <p style="font-size:20px;">No credit card added. Compile the form below</p>
                                </div>
                            <?php else:?>   
                            <table class="table table-bordered text-center">
                                <tr>
                                    <th id="owner_">Owner</th>
                                    <th id="last_digits">Last 4 digits</th>
                                    <th id="expire_date">Expire Date</th>
                                    <th id="action">Action</th>
                                </tr> 
                                <?php foreach($templateParams["pay_info"] as $cards): ?>
                                <tr>
                                    <td headers="owner_" id="<?php echo $cards["Owner"]?>"><?php echo $cards["Owner"]?></td>
                                    <td headers="last_digits"><?php echo substr($cards["Card_number"],12,4)?></td>
                                    <td headers="expire_date"><?php echo $cards["Expire_date"]?></td>
                                    <td headers="action">
                                        <form method="POST" id="remove-form" class="m-0">
                                            <input type="text" class="d-none" name="remove_number"
                                             value="<?php echo $cards["Card_number"]?>"/>
                                            <input type="submit" class="btn btn-primary border col-md-12"
                                             value="Remove"/>           
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </table>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="row px-4">
                        <form method="POST" class="col-12 border mb-3">
                            <fieldset class="px-0 mb-2">
                                <legend class="m-0 text-center">Add credit card</legend>
                                <div class="form-group text-center">
                                    <div class="row mt-3">
                                        <label for="owner" class="col-10 offset-1">Owner</label>
                                        <input name="owner" type="text" class="form-control <?php echo $iscardvalid?> col-10 offset-1" id="owner" required/>
                                    </div>
                                    <div class="row">
                                        <label for="add_number" class="col-10 offset-1">Number</label>
                                        <input type="number" name="add_number" class="form-control <?php echo $iscardvalid?> col-10 offset-1" id="add_number" required/>
                                    </div>
                                    <div class="row">
                                        <label for="exp_date" class="col-10 offset-1">Expire date</label>
                                        <input type="date" name="expire_date" class="form-control <?php echo $iscardvalid?> col-10 offset-1" id="exp_date" required/>
                                        <div class="invalid-feedback">Please provide an existing card.</div>
                                    </div>
                                    <div class="text-center col-6 col-md-6 offset-3 offset-md-3 mt-2">
                                        <button type="submit" class="btn btn-primary col-12 col-md-12 p-2">Add</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>    
                    </div>  
                </div>
            </div>
        </main>
    </div>
</div>
<script src="js/customer-form.js"></script>