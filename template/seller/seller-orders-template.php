<link rel="stylesheet" href="css/sidebar.css">

<div class="container">
  <div class="row">
    <div class="col-md-3">
      <aside class="bg-white sidebar container shadow-sm my-4 p-4 list-group-flush">
        <h3 class="py-4 pl-3">Seller's Area</h3>
        <a href="seller-overview.php" class="list-group-item list-group-item-action bg-white">Overview</a>
        <a href="seller-profile.php" class="list-group-item list-group-item-action bg-white">Profile</a>
        <a href="seller-prints.php" class="list-group-item list-group-item-action bg-white">Your prints</a>
        <a href="seller-add-print.php" class="list-group-item list-group-item-action bg-white">Add new print</a>
        <a href="#" class="list-group-item list-group-item-action bg-white"> View orders</a>
      </aside>
      <aside class="bg-white sidebar container shadow-sm my-4 p-4 list-group list-group-flush">
        <h3 class="py-4 pl-3">Orders' list</h3>
        <label for="search-bar">Search by order id</label>
        <div class="input-group mb-2 w-75">
          <div class="input-group-prepend">
            <span class="input-group-text"><img src="upload/icons/search.svg" alt="search order by id" width="16" height="16"></span>
            <input id="search-bar" type="search" class="form-control">
          </div>
        </div>
        <a href="#" class="list-group-item list-group-item-action bg-white">Order #4321</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Order #3291</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Order #3291</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Order #3291</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Order #3291</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Order #3291</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Order #3291</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Order #3291</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Order #3291</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Order #3291</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Order #3291</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Order #3291</a>
      </aside>
    </div>

    <div class="col-md-9">
      <div class="container-fluid my-4 flex-grow-1">
        <div class="row">
          <div class="container bg-white p-4 rounded shadow text-center">
            <h1>Orders received</h1>
          </div>
        </div>
        <div class="row">
          <div class="container mt-4 p-4 px-5 bg-white rounded shadow-sm">
            <!-- check if GET is null to hide h3 or form -->
            <h3 class="d-none">No order selected</h3>
            <form class="">
              <h2 class="d-inline">Order details</h2>
              <button id="edit-print" class="btn float-right"><img src="upload/icons/pencil-square.svg" alt="edit this print" width="32" height="32"></button>

              <h3 class="section-title">Shipping info</h3>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="order-id">Order ID</label>
                    <div class="input-group">
                      <input id="order-id" type="text" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="ship-city">Ship city</label>
                    <div class="input-group">
                      <input id="author" type="text" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="ship-address">Ship address </label>
                    <div class="input-group">
                      <input id="ship-address" type="text" class="form-control" readonly>
                    </div>
                  </div>
                </div>

                <div class="col-md-5 offset-md-1">

                  <div class="form-group">
                    <label for="ship-postal-code">Ship postal code</label>
                    <div class="input-group">
                      <input id="ship-postal-code" type="text" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="ship-date">Shipped date</label>
                    <div class="input-group">
                      <input id="ship-date" type="date" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="order-date">Order date</label>
                    <div class="input-group">
                      <input id="order-date" type="date" class="form-control" readonly>
                    </div>
                  </div>
                </div>
              </div>

              <h3 class="section-title">Payment info</h3>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="customer-email">Customer email</label>
                    <div class="input-group">
                      <input id="customer-email" type="text" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="card-number">Card number</label>
                    <div class="input-group">
                      <input id="card-number" type="number" class="form-control" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-5 offset-md-1">
                  <div class="form-group">
                    <div class="form-group">
                      <label for="total-amount">Total amount paid</label>
                      <div class="input-group">
                        <input id="total-amount" type="text" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="number-prints-ordered">Number of ordered prints</label>
                      <div class="input-group">
                        <input id="number-prints-ordered" type="number" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6">
                  <h3 class="section-title">Order status</h3>
                  <div class="form-group">
                    <label for="category-chooser">Current state</label>
                    <select class="form-control" id="category-chooser" readonly>
                      <option>In production</option>
                      <option>Order shipped</option>
                      <option>Order incoming</option>
                      <option>Order sent</option>
                    </select>
                  </div>
                  <button id="save-settings" class="btn btn-primary mt-2" type="submit">Submit update</button>
                  <button id="abort-changes" class="btn btn-danger mt-2" type="reset">Undo changes</button>
                </div>
                <div class="col-md-5 offset-md-1">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="js/search-bar.js"></script>
<script src="js/print-edit.js"></script>