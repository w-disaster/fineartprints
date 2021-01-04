<link rel="stylesheet" href="css/order_style.css" >

<div class="flex-grow-1 parallax">
  <div class="container bg-white flex-flow-row-wrap">
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
                        <label for="title" class="col-6 col-md-3 col-form-label">Print title</label>
                        <div class="col-6 col-md-9">
                          <input type="text" readonly class="form-control-plaintext" value="<?php $final_product["title"]; ?>">
                        </div>
                        <label for="dimensions" class="col-6 col-md-3 col-form-label">Print dimensions</label>
                        <div class="col-6 col-md-9">
                          <input type="text" readonly class="form-control-plaintext" value="<?php echo $final_product["width"]." x ".$final_product["height"]; ?>">
                        </div>
                        <label for="technique" class="col-6 col-md-3 col-form-label">Print tecnhique</label>
                        <div class="col-6 col-md-9">
                          <input type="text" readonly class="form-control-plaintext" value="<?php $final_product["technique"]; ?>">
                        </div>
                        <label for="frame" class="col-6 col-md-3 col-form-label">Frame type</label>
                        <div class="col-6 col-md-9">
                          <input type="text" readonly class="form-control-plaintext" value="<?php $final_product["frame"]; ?>">
                        </div>
                        <label for="passpartout" class="col-6 col-md-3 col-form-label">Passpartout</label>
                        <div class="col-6 col-md-9">
                          <input type="text" readonly class="form-control-plaintext" value="<?php $final_product["passpartout"]; ?>">
                        </div>
                        <label for="price" class="col-6 col-md-3 col-form-label">Price</label>
                        <div class="col-6 col-md-9">
                          <input type="text" readonly class="form-control-plaintext" value="<?php $final_product["title"]; ?> €">
                        </div>
                      </div>
                  </div>
                </div>
              <?php endforeach; ?>
              

              <div class="row border m-0 px-4 py-4 gray-background w-100">
                <div class="col-12">
                  <h3>Payment method</h3>
                  <?php if(count($templateParams["customer_credit_cards"])>0): ?>
                    <div class="form-check my-4">
                      <input class="form-check-input" type="radio" name="paymentRadio" id="defaultCardRadio" value="defaultCardRadio"
                        checked>
                      
                      <select id="input" name="defaultCardNumbers" class="form-control">
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
                        <input class="form-check-input" type="radio" name="paymentRadio" id="altCardRadio" value="altCardRadio">
                        <label class="form-form-label" for="altPaymentRadioLabel" id="altPaymentRadioLabel">
                          Alternative card
                        </label>
                      </div>
                      <div class="col-8">
                        <input type="text" class="d-none form-control" name="altCardNumber" id="altCardNumber" value="" readonly></input>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 payment-form d-none">
                  <div class="alternative-card-form">
                    <div class="d-flex flex-column border col-12 px-4 py-2 mt-4 mb-2">
                      <legend>Add credit card</legend>
                      <div class="form-group row w-100 mt-3">
                        <label for="credit_card_owner" class="col-5">Owner:</label>
                        <input type="text" class="form-control col-7" id="creditCardOwner"/>
                      </div>
                      <div class="form-group row w-100">
                        <label for="credit_card_number" class="col-5">Number</label>
                        <input type="number" class="form-control col-7" id="creditCardNumber"/>
                      </div>
                      <div class="form-group row w-100">
                        <label for="credit_card_expire_date" class="col-5">Expire date</label>
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

                  <select id="shipper-input" name="shipper_carrier" class="form-control mt-4">
                    <?php foreach($templateParams["shippers"] as $shipper): ?>
                      <option value="<?php echo $shipper["Company_name"];?>" id="<?php echo $shipper["Company_name"];?>">
                      <?php echo $shipper["Company_name"]." - ".$shipper["Price"]."€";?></option>
                    <?php endforeach; ?>
                  </select>

                  <div class="form-check mt-4">
                    <input class="form-check-input" type="radio" name="shippingRadio" id="defaultShippingAddress"
                      value="option1" checked>
                    <label class="form-form-label" for="exampleRadios1">
                      <?php echo $templateParams["customer"][0]["City"]." ".$templateParams["customer"][0]["Postal_code"].
                      ", ".$templateParams["customer"][0]["Province"].", ".$templateParams["customer"][0]["Address"]; ?>
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="shippingRadio" id="altShippingAddress"
                      value="option2">
                    <label class="form-form-label" for="exampleRadios1">
                      Alternative address
                    </label>
                  </div>
                </div>
                <div class="col-12 shipping-form d-none">
                    <div class="d-flex flex-column border col-12 px-4 py-2 mt-4 mb-2">
                      <legend>Add shipping address</legend>
                      <div class="form-group row w-100 mt-3">
                        <label for="name" class="col-5">City</label>
                        <input type="text" class="form-control col-7" name="altCity" id="altCity" />
                      </div>
                      <div class="form-group row w-100">
                        <label for="postal_code" class="col-5">Postal code</label>
                        <input type="number" class="form-control col-7" name="altPostalCode" id="altPostalCode" />
                      </div>
                      <div class="form-group row w-100">
                        <label for="ship_address" class="col-5">Ship address</label>
                        <input type="number" class="form-control col-7" name="altShipAddress" id="altShipAddress" />
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
            <table class="table form-summary border my-4">
              <tr>
                <td>Print1</td>
                <td>100,00 €</td>
              </tr>
              <tr>
                <td>Print2</td>
                <td>50,00 €</td>
              </tr>
              <tr class="font-weight-bold">
                <td>
                  <h5>Articles total</h5>
                </td>
                <td>
                  <h5>150,00 €</h5>
                </td>
              </tr>
              <tr>
                <td>Shipping</td>
                <td id="shipping-cost-summary">7,00 €</td>
              </tr>
              <tr class="font-weight-bold">
                <td>
                  <h4>Total</h4>
                </td>
                <td id="total-order-cost">
                  <h4>157.00</h4>
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

<script src="js/order.js" type="text/javascript"></script>