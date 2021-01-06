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
                  <h2 class="d-inline">User settings</h2>
                </div>
                <h3 class="section-title">Personal info</h3>
                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <div class="input-group">
                        <input id="name" name="name" type="text" class="form-control" value="<?php echo $user["Name"] ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="surname">Surname</label>
                      <div class="input-group">
                        <input id="surname" name="surname" type="text" class="form-control" value="<?php echo $user["Surname"] ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="birth-date">Birth date</label>
                      <div class="input-group">
                        <input id="birth-date" name="birth-date" type="date" class="form-control" value="<?php echo $user["Birth_date"] ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <div class="input-group">
                        <input id="email" name="email" type="email" class="form-control" value="<?php echo $user["Email"] ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <div class="input-group">
                        <input id="phone" name="phone" type="text" class="form-control" value="<?php echo $user["Phone"] ?>" required>
                      </div>
                    </div>
                  </div>
                </div>
                  <h3 class="section-title">Contact info</h3>
                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="city">City</label>
                      <div class="input-group">
                        <input id="city" type="text" class="form-control" value="<?php echo $user["City"] ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <div class="input-group">
                        <input id="address" type="text" class="form-control" value="<?php echo $user["Address"] ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="postal-code">Postal code</label>
                      <div class="input-group">
                        <input id="postal-code" type="text" class="form-control" value="<?php echo $user["Postal_code"] ?>" required>
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