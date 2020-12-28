<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="smoothproducts/smoothproducts.css">

<div class="container">
  <div class="row">
    <div class="col-md-3">
      <aside class="bg-white sidebar container shadow-sm my-4 p-4 list-group-flush">
        <h3 class="py-4 pl-3">Seller's Area</h3>
        <a href="#" class="list-group-item list-group-item-action bg-white">Overview</a>
        <a href="seller-profile.php" class="list-group-item list-group-item-action bg-white">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Your prints</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Orders</a>
      </aside>
      <aside class="bg-white sidebar container shadow-sm my-4 p-4 list-group-flush">
        <h3 class="py-4 pl-3">Prints' list</h3>
        <a href="#" class="list-group-item list-group-item-action bg-white">Print A</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Print A</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Print A</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Print A</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Print A</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Print A</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Print A</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Print A</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Print A</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Print A</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Print A</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Print A</a>
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
            <h2 class="d-inline">Print details</h2>
            <img class="float-right" src="./upload/icons/pencil-square.svg" alt="your profile" width="32" height="32">
            <h3 class="print-section-title">Print image</h3>
            <div class="row py-3 mx-1">
              <img class="justify-content-center" alt="wheatfield with crows by vincent van gogh" width="75%" src="upload/campo_di_grano_volo_di_corvi.jpeg">
              <form>
                <div class="form-group mt-2">
                  <label for="image-chooser">Image displayed for the product</label>
                  <input id="image-chooser" type="file" class="form-control-file is-invalid" accept=".jpg, .webp, 	image/webp, image/jpg">
                  <div class="invalid-feedback">
                    Please provide an image (.jpg or .webp).
                  </div>
                </div>
              </form>
            </div>
            <h3 class="print-section-title">Print general info</h3>
            <form>
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
                    <textarea id="picture-description" name="picture-description" class="form-control" rows="4" required></textarea>
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-6">
                  <h3 class="print-section-title">Print value</h3>
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
                  <h3 class="print-section-title">Print category</h3>
                  <div class="form-group">
                    <div class="form-group">
                      <label for="category-chooser">Current category</label>
                      <select class="form-control" id="category-chooser">
                        <option>None</option>
                        <option>Space</option>
                        <option>Film</option>
                        <option>Nature</option>
                        <option>Abstract</option>
                        <option>Street</option>
                      </select>
                    </div>
                  </div>
                  <button class="btn btn-primary d-none" type="button">Save settings</button>
                  <button class="btn btn-danger d-none" type="button">Abort changes</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="smoothproducts/smoothproducts.min.js"></script>
<script src="js/gallery.js"></script>