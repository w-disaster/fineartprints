<link rel="stylesheet" href="css/sidebar.css">

<div class="container">
  <div class="row">
    <div class="col-md-3">
      <aside class="bg-white sidebar container shadow-sm my-4 p-4">
        <h3 class="py-4 pl-3">Sellers Area</h3>
        <a href="#" class="list-group-item list-group-item-action bg-white">Overview</a>
        <a href="seller-profile.php" class="list-group-item list-group-item-action bg-white">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Your prints</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Orders</a>
      </aside>
    </div>

    <div class="col-md-9">
      <div class="container-fluid my-4 flex-grow-1">
        <div class="row">
          <div class="container bg-white p-4 rounded shadow">
            <h1 class="text-center">Profile</h1>
          </div>
        </div>
        <div class="row">
          <div class="container mt-4 p-4 px-5 bg-white rounded shadow-sm">
            <div class="row py-2">
              <h2>User settings</h2>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name">Name</label>
                  <div class="input-group">
                    <input id="name" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="surname">Surname</label>
                  <div class="input-group">
                    <input id="surname" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="birth-date">Birth date</label>
                  <div class="input-group">
                    <input id="birth-date" type="date" class="form-control" required>
                  </div>
                </div>
                <button class="btn btn-primary btn-block my-4 w-50" type="button">Save settings</button>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Email</label>
                  <div class="input-group">
                    <input id="email" type="email" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <div class="input-group">
                    <input id="phone" type="text" class="form-control" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="container mt-4 p-4 px-5 bg-white rounded shadow-sm">
            <div class="row py-2">
              <h2>Contact info</h2>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name">City</label>
                  <div class="input-group">
                    <input id="name" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="surname">Address</label>
                  <div class="input-group">
                    <input id="surname" type="text" class="form-control" required>
                  </div>
                </div>
                <button class="btn btn-primary btn-block my-4" type="button">Continue</button>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="phone">Postal code</label>
                  <div class="input-group">
                    <input id="phone" type="text" class="form-control" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>