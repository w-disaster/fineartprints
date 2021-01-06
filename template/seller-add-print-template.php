<link rel="stylesheet" href="css/sidebar.css">

<div class="flex-grow-1 subtle-pattern">
  <div class="container-fluid bg-white flex-flow-row-wrap subtle-pattern">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <aside class="bg-white sidebar container shadow-sm my-4 p-4 list-group list-group-flush">
            <h3 class="py-4 pl-3">Seller's Area</h3>
            <a href="seller-overview.php" class="list-group-item list-group-item-action bg-white">Overview</a>
            <a href="seller-profile.php" class="list-group-item list-group-item-action bg-white">Profile</a>
            <a href="seller-prints.php" class="list-group-item list-group-item-action bg-white">Your prints</a>
            <a href="#" class="list-group-item list-group-item-action bg-white">Add new print</a>
            <a href="seller-orders.php" class="list-group-item list-group-item-action bg-white">View orders</a>
          </aside>
        </div>

        <div class="col-md-9">
          <div class="container-fluid my-4 flex-grow-1">
            <div class="row">
              <div class="container bg-white p-4 rounded shadow text-center">
                <h1>Your prints</h1>
                <p>Or your pictures with or without at least one technique enabled</p>
              </div>
            </div>
            <div class="row">
              <div class="container mt-4 p-4 px-5 bg-white rounded shadow-sm">
                <h2 class="d-inline">Add new print</h2>
                <form>
                  <h3 class="section-title">Print image</h3>
                  <div class="row py-3 mx-1">
                    <img id="print-image" class="justify-content-center" alt="wheatfield with crows by vincent van gogh" width="75%" src="upload/placeholder.webp">
                    <div class="form-group mt-2">
                      <label for="image-chooser">Image displayed for the product</label>
                      <input id="image-chooser" type="file" class="form-control-file is-invalid" accept=".jpg, .webp, 	image/webp, image/jpg" required>
                      <div class="invalid-feedback">
                        Please provide an image (.jpg or .webp).
                      </div>
                    </div>
                  </div>
                  <h3 class="section-title">Print general info</h3>
                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="title">Title</label>
                        <div class="input-group">
                          <input id="title" type="text" class="form-control is-invalid" required>
                          <div class="invalid-feedback">
                            Please provide a title with no more than 40 characters.
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="author">Author</label>
                        <div class="input-group">
                          <input id="author" type="text" class="form-control is-invalid" required>
                          <div class="invalid-feedback">
                            The name of the author cannot be more than 40 characters long.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5 offset-md-1">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="picture-description" name="picture-description" class="form-control is-invalid" rows="4" required></textarea>
                        <div class="invalid-feedback">
                          Please provide a description.
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6">
                      <h3 class="section-title">Print value</h3>
                      <div class="form-group">
                        <label for="base-price">Base price</label>
                        <div class="input-group">
                          <input id="base-price" type="number" class="form-control is-invalid" required>
                          <div class="invalid-feedback">
                            Please provide a number greater than 0 and smaller than 999.
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="discount">Discount</label>
                        <div class="input-group">
                          <input id="discount" type="number" class="form-control is-invalid" required>
                          <div class="invalid-feedback">
                            Please provide a number greater than 0 and smaller than the base price.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5 offset-md-1">
                      <h3 class="section-title">Print category</h3>
                      <div class="form-group">
                        <div class="form-group">
                        <label for="category">Current category</label>
                        <select class="form-control" id="category" name="category" readonly>
                        <option><?php echo $print["Category_name"]; ?></option>
                        <?php foreach($templateParams["categories"] as $category): ?><option><?php echo $category["Name"]; ?></option>
                        <?php endforeach; ?></select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <h3 class="section-title">Print techniques available</h3>
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">
                        Print on Artist's Canvas
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                      <label class="form-check-label" for="defaultCheck2">
                        Hand painted oil painting on Canvas
                      </label>
                    </div>
                  </div>
                  <button id="save-settings" class="btn btn-primary mt-2" type="submit">Save settings</button>
                  <button id="abort-changes" class="btn btn-danger mt-2" type="reset">Delete changes</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="js/print-edit.js"></script>
<script src="js/print-update-image-shown.js"></script>