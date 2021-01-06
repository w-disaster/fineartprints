<link rel="stylesheet" href="css/sidebar.css">

<div class="flex-grow-1 subtle-pattern">
  <div class="container-fluid bg-white flex-flow-row-wrap subtle-pattern">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
        <?php 
          if(isset($templateParams["sidebar"])){
            require($templateParams["sidebar"]);
          }
        ?>
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
  </div>
</div>