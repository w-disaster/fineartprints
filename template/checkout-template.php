<link rel="stylesheet" href="css/theme.css">
<link rel="stylesheet" href="css/order_style.css">


<div class="flex-grow-1 subtle-pattern">
  <div class="container bg-white flex-flow-row-wrap">
    <div class="row my-4 w-100 text-center">
      <h1 class="col-12 display-4 text-center">Checkout</h1>
    </div>
    <?php if(isset($templateParams["final_products"])): ?>
      <div class="row my-4">
        <div class="col-12 col-md-7">   
          <div class="container-fluid p-0 flex-flow-row-wrap">
            <form action="api-order.php" method="POST">
              <?php foreach($templateParams["final_products"] as $final_product): ?>
                <div class="row border m-0 px-4 py-4 gray-background">
                  <div class="col-12">
                    <h3><?php echo $final_product["title"]; ?></h3>
                    <div class="form-group row mt-3">
                      <label class="col-6 col-md-4 my-1" for="title<?php echo $final_product["print_id"]; ?>" >Print title</label>
                      <div class="col-6 col-md-8 my-1">
                        <input type="text" class="form-control" readonly id="title<?php echo $final_product["print_id"]; ?>" 
                          value="<?php echo $final_product["title"]; ?>">
                      </div>
                      <label class="col-6 col-md-4 my-1" for="dimensions<?php echo $final_product["print_id"]; ?>">Print dimensions</label>
                      <div class="col-6 col-md-8 my-1">
                        <input type="text" class="form-control" readonly  id="dimensions<?php echo $final_product["print_id"]; ?>"
                          value="<?php echo $final_product["width"]." x ".$final_product["height"]; ?>">
                      </div>
                      <label class="col-6 col-md-4 my-1" for="technique<?php echo $final_product["print_id"]; ?>">Print technique</label>
                      <div class="col-6 col-md-8 my-1">
                        <input type="text" class="form-control" readonly  id="technique<?php echo $final_product["print_id"]; ?>"
                          value="<?php echo $final_product["technique"]; ?>">
                      </div>
                      <label class="col-6 col-md-4 my-1" for="frame<?php echo $final_product["print_id"]; ?>">Frame type</label>
                      <div class="col-6 col-md-8 my-1">
                        <input type="text" class="form-control" readonly  id="frame<?php echo $final_product["print_id"]; ?>"
                          value="<?php echo $final_product["frame"]; ?>">
                      </div>
                      <label class="col-6 col-md-4 my-1" for="passpartout<?php echo $final_product["print_id"]; ?>">Passpartout</label>
                      <div class="col-6 col-md-8 my-1">
                        <input type="text" class="form-control" readonly  id="passpartout<?php echo $final_product["print_id"]; ?>"
                          value="<?php echo $final_product["passpartout"]; ?>">
                      </div>
                      <label class="col-6 col-md-4 my-1" for="price<?php echo $final_product["print_id"]; ?>">Price</label>
                      <div class="col-6 col-md-8 my-1">
                        <input type="text" class="form-control" readonly id="price<?php echo $final_product["print_id"]; ?>" 
                          value="<?php echo $final_product["price"]; ?> €">
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
              

              <div class="row border m-0 px-4 py-4 gray-background w-100">
                <div class="col-12">
                  <h3>Payment method</h3>
                  <fieldset><legend class="m-0">Credit cards</legend>
                    <?php if(count($templateParams["customer_credit_cards"])>0): ?>
                      <div class="form-check my-3">
                        
                          <label for="defaultCardRadio" hidden>Registered cards</label>
                          <input class="form-check-input" type="radio" name="paymentRadio" id="defaultCardRadio" value="defaultCardRadio"
                            checked>
                        
                          <label for="defaultCardNumbersSelect" hidden>Select a registered card</label>
                          <select id="defaultCardNumbersSelect" name="defaultCardNumber" class="form-control">
                            <?php foreach($templateParams["customer_credit_cards"] as $credit_card): ?>
                              <option value="<?php echo $credit_card["Card_number"];?>" id="<?php echo $credit_card["Card_number"];?>">
                              <?php echo $credit_card["Card_number"];?></option>
                            <?php endforeach; ?>
                          </select>
                      </div>
                    <?php endif; ?>
                    <div class="form-check">
                      <div class="row">
                        <div class="col-4">
                          <label for="altCardRadio" hidden>Specify alternative card</label>
                          <input class="form-check-input" type="radio" name="paymentRadio" id="altCardRadio" value="altCardRadio">
                          <label for="altCardNumber">Alternative card</label>
                        </div>
                        <div class="col-8">
                          <input type="text" class="d-none form-control" name="altCardNumber" id="altCardNumber" value="" readonly>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </div>
                <div class="col-12 payment-form d-none">
                  <div class="alternative-card-form">
                    <div class="d-flex flex-column border col-12 px-4 py-2 mt-4 mb-2">
                      <h4>Add credit card</h4>
                      <div class="form-group row w-100 mt-3">
                        <label class="col-5" for="creditCardOwner">Owner</label>
                        <input type="text" class="form-control col-7" id="creditCardOwner"/>
                      </div>
                      <div class="form-group row w-100">
                        <label class="col-5" for="creditCardNumber">Number</label>
                        <input type="number" class="form-control col-7" id="creditCardNumber"/>
                      </div>
                      <div class="form-group row w-100">
                      <label class="col-5" for="creditCardExpireDate">Expire date</label>
                        <input type="date" class="form-control col-7" id="creditCardExpireDate" />
                      </div>
                      <div class="form-group row w-100 ml-0 pr-3">
                        <input type="button" class="btn btn-add-credit-card btn-dark col-12" value="Add and select"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row border m-0 px-4 py-4 gray-background w-100">
                <div class="col-12">
                  <h3>Shipping</h3>
                  <fieldset><legend class="m-0">Carriers & destination address</legend>
                    <label for="shipper-input" hidden>Carriers</label>
                    <select id="shipper-input" name="shipperCarrier" class="form-control my-3">
                      <?php foreach($templateParams["shippers"] as $shipper): ?>
                        <option value="<?php echo $shipper["Company_name"];?>" id="<?php echo str_replace(" ", "", $shipper["Company_name"]) ;?>">
                        <?php echo $shipper["Company_name"]." - ".$shipper["Price"]."€";?></option>
                      <?php endforeach; ?>
                    </select>

                    <div class="form-check">
                      <label for="defaultShippingAddress" hidden>Address</label>
                      <input class="form-check-input" type="radio" name="shippingRadio" id="defaultShippingAddress"
                        value="defaultShipping" checked>

                      <label for="defaultShippingAddressInput" hidden>Default address</label>
                      <input type="text" class="form-control my-2" readonly id="defaultShippingAddressInput" name="defaultShippingAddress"
                          value="<?php echo $templateParams["customer"][0]["City"]." ".$templateParams["customer"][0]["Postal_code"].
                        ", ".$templateParams["customer"][0]["Province"].", ".$templateParams["customer"][0]["Address"]; ?>">
                    </div>
                    <div class="form-check">
                      <label for="altShippingAddress" hidden>Alternative shipping address</label>
                      <input class="form-check-input" type="radio" name="shippingRadio" id="altShippingAddress"
                        value="altShipping">
                      <p>Alternative address</p>
                    </div>
                  </fieldset>
                </div>
                <div class="col-12 shipping-form d-none">
                  <div class="d-flex flex-column border col-12 px-4 py-2 mt-4 mb-2">
                    <h4>Add shipping address</h4>
                    <div class="form-group row w-100 mt-3">
                      <label class="col-5" for="altCity">City</label>
                      <input type="text" class="form-control col-7" name="altCity" id="altCity" />
                    </div>
                    <div class="form-group row w-100">
                      <label class="col-5" for="altPostalCode">Postal code</label class="col-5">
                      <input type="number" class="form-control col-7" name="altPostalCode" id="altPostalCode" />
                    </div>
                    <div class="form-group row w-100">
                      <label class="col-5" for="altAddress">Address</label>
                      <input type="number" class="form-control col-7" name="altAddress" id="altAddress" />
                    </div>
                  </div>
                </div>
              </div>


              <button type="submit" class="btn btn-dark col-12">
                <span class="h4">Confirm order</span>
              </button>
            </form>
          
          </div>
        </div>
        <div class="col-12 col-md-5 mb-4">
          <div class="gray-background p-4">
            <h3>Order summary</h3>
            <table class="table form-summary border mt-4 mb-0">
              <?php $articles_total_cost = 0 ?>
              <?php foreach($templateParams["final_products"] as $final_product): ?>
                <tr>
                  <td><?php echo $final_product["title"]; ?></td>
                  <td><?php echo $final_product["price"]; ?> €</td>
                </tr>
                <?php $articles_total_cost += $final_product["price"]; ?>
              <?php endforeach; ?>
              <tr class="font-weight-bold">
                <td>
                  <h5>Articles total</h5>
                </td>
                <td id="articles-total-cost">
                  <h5><?php echo $articles_total_cost ?> €</h5>
                </td>
              </tr>
              <tr>
                <td>Shipping</td>
                <td id="shipping-cost-summary"></td>
              </tr>
              <tr class="font-weight-bold">
                <td>
                  <h4>Total</h4>
                </td>
                <td id="total-order-cost">
                </td>
              </tr>
            </table>
            <div class="form-group row w-100 ml-0">
            </div>
          </div>
        </div>
      </div>
    <?php else: ?><div class="col-12"><h1 class="display-4 text-center"> No products to checkout</h1></div><?php endif; ?>
  </div>
</div>

<script src="js/order.js"></script>