<link rel="stylesheet" href="css/order_style.css" >

<div class="flex-grow-1 subtle-pattern">
  <div class="container bg-white flex-flow-row-wrap subtle-pattern">
    <div class="row my-4">
      <div class="col-12 col-md-7">
        <div class="container-fluid p-0 flex-flow-row-wrap">
          <div class="row border m-0 px-4 py-4 gray-background">
            <div class="col-12">
              <form>
                <h3>First print</h3>
                <div class="form-group row mt-3">
                  <label for="title" class="col-6 col-md-3 col-form-label">Print title</label>
                  <div class="col-6 col-md-9">
                    <input type="text" readonly class="form-control-plaintext" value="Print">
                  </div>
                  <label for="category" class="col-6 col-md-3 col-form-label">Print category</label>
                  <div class="col-6 col-md-9">
                    <input type="text" readonly class="form-control-plaintext" value="Technique">
                  </div>
                  <label for="frame" class="col-6 col-md-3 col-form-label">Frame type</label>
                  <div class="col-6 col-md-9">
                    <input type="text" readonly class="form-control-plaintext" value="Frame">
                  </div>
                  <label for="passpartout" class="col-6 col-md-3 col-form-label">Passpartout</label>
                  <div class="col-6 col-md-9">
                    <input type="text" readonly class="form-control-plaintext" value="Passpartout">
                  </div>
                  <label for="price" class="col-6 col-md-3 col-form-label">Price</label>
                  <div class="col-6 col-md-9">
                    <input type="text" readonly class="form-control-plaintext" value="Price €">
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="row border m-0 px-4 py-4 gray-background">
            <div class="col-12">
              <form>
                <h3>Second print</h3>
                <div class="form-group row mt-3">
                  <label for="title" class="col-6 col-md-3 col-form-label">Print title</label>
                  <div class="col-6 col-md-9">
                    <input type="text" readonly class="form-control-plaintext" value="Print">
                  </div>
                  <label for="technique" class="col-6 col-md-3 col-form-label">Print technique</label>
                  <div class="col-6 col-md-9">
                    <input type="text" readonly class="form-control-plaintext" value="Technique">
                  </div>
                  <label for="frame" class="col-6 col-md-3 col-form-label">Frame type</label>
                  <div class="col-6 col-md-9">
                    <input type="text" readonly class="form-control-plaintext" value="Frame">
                  </div>
                  <label for="passpartout" class="col-6 col-md-3 col-form-label">Passpartout</label>
                  <div class="col-6 col-md-9">
                    <input type="text" readonly class="form-control-plaintext" value="Passpartout">
                  </div>
                  <label for="price" class="col-6 col-md-3 col-form-label">Price</label>
                  <div class="col-6 col-md-9">
                    <input type="text" readonly class="form-control-plaintext" value="Price €">
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="row border m-0 px-4 py-4 gray-background w-100">
            <div class="col-12">
              <h3>Payment method</h3>
              <?php if(count($templateParams["customer_credit_cards"])>0): ?>
                <div class="form-check my-4">
                  <input class="form-check-input" type="radio" name="paymentRadio" id="defaultCardRadio" value="option1"
                    checked />
                  
                    <select id="input" name="defaultCards" class="form-control">
                      <?php foreach($templateParams["customer_credit_cards"] as $credit_card): ?>
                        <option value="<?php echo $credit_card["Card_number"];?>" id="<?php echo $credit_card["Card_number"];?>">
                        <?php echo $credit_card["Card_number"];?></option>
                      <?php endforeach; ?>
                    </select>
                </div>
              <?php endif; ?>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="paymentRadio" id="altCardRadio" value="option2">
                <label class="form-form-label" for="altPaymentRadioLabel" id="altPaymentRadioLabel">
                  Alternative card
                </label>
              </div>
            </div>
            <div class="col-12 payment-form d-none">
              <form class="alternative-card-form">
                <div class="d-flex flex-column border col-12 px-4 py-2 mt-4 mb-2">
                  <legend>Add credit card</legend>
                  <div class="form-group row w-100 mt-3">
                    <label for="credit_card_owner" class="col-5">Owner:</label>
                    <input type="text" class="form-control col-7" id="credit_card_owner"/>
                  </div>
                  <div class="form-group row w-100">
                    <label for="credit_card_number" class="col-5">Number</label>
                    <input type="number" class="form-control col-7" id="credit_card_number" />
                  </div>
                  <div class="form-group row w-100">
                    <label for="credit_card_expire_date" class="col-5">Expire date</label>
                    <input type="date" class="form-control col-7" id="credit_card_expire_date" />
                  </div>
                  <div class="form-group row w-100 ml-0 pr-3">
                    <input type="button" class="btn btn-add-credit-card btn-dark col-12" value="Add and select"/>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="row border m-0 px-4 py-4 gray-background w-100">
            <div class="col-12">
              <h3>Shipping</h3>

              <select id="input" name="defaultCards" class="form-control mt-4">
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
              <form>
                <div class="d-flex flex-column border col-12 px-4 py-2 mt-4 mb-2">
                  <legend>Add shipping address</legend>
                  <div class="form-group row w-100 mt-3">
                    <label for="name" class="col-5">City</label>
                    <input type="text" class="form-control col-7" id="city" />
                  </div>
                  <div class="form-group row w-100">
                    <label for="postal_code" class="col-5">Postal code</label>
                    <input type="number" class="form-control col-7" id="postal_code" />
                  </div>
                  <div class="form-group row w-100">
                    <label for="ship_address" class="col-5">Ship address</label>
                    <input type="number" class="form-control col-7" id="ship_address" />
                  </div>
                  <div class="form-group row w-100 ml-0 pr-3">
                    <button type="submit" class="btn btn-dark col-12">Add</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
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
              <td>7,00 €</td>
            </tr>
            <tr class="font-weight-bold">
              <td>
                <h4>Total</h4>
              </td>
              <td>
                <h4>157,00 €</h4>
              </td>
            </tr>
          </table>
          <div class="form-group row w-100 ml-0">
            <button type="submit" class="btn btn-dark col-12">
              <span class="h4">Confirm order</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="js/order.js" type="text/javascript"></script>