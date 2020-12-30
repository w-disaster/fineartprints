<link rel="stylesheet" href="css/sidebar.css">

<div class="container">
  <div class="row">
    <div class="col-md-3">
      <aside class="bg-white sidebar container shadow-sm my-4 p-4 list-group-flush">
        <h3 class="py-4 pl-3">Seller's Area</h3>
        <a href="seller-overview.php" class="list-group-item list-group-item-action bg-white">Overview</a>
        <a href="seller-profile.php" class="list-group-item list-group-item-action bg-white">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Your prints</a>
        <a href="seller-add-print.php" class="list-group-item list-group-item-action bg-white">Add new print</a>
        <a href="seller-orders.php" class="list-group-item list-group-item-action bg-white">View orders</a>
      </aside>
      <aside class="bg-white sidebar container shadow-sm my-4 p-4 list-group list-group-flush">
        <h3 class="py-4 pl-3">Prints' list</h3>
        <label for="password">Search by print title</label>
        <div class="input-group mb-2 w-75">
          <div class="input-group-prepend">
            <span class="input-group-text"><img src="upload/icons/search.svg" alt="edit this print" width="16" height="16"></span>
            <input id="title-search" type="search" class="form-control">
          </div>
        </div>
        <a href="#" class="list-group-item list-group-item-action bg-white">Print A</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Print A</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">Wheatfield with Crows</a>
        <a href="#" class="list-group-item list-group-item-action bg-white">The Cardsharps</a>
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
            <!-- check if GET is null to hide h3 or form -->
            <h3 class="d-none">No print selected</h3>
            <form class="">

              <h2 class="d-inline">Print details</h2>
              <button id="edit-print" class="btn float-right"><img src="upload/icons/pencil-square.svg" alt="edit this print" width="32" height="32"></button>

              <h3 class="section-title">Print image</h3>
              <div class="row py-3 mx-1">
                <img id="print-image" class="justify-content-center" alt="wheatfield with crows by vincent van gogh" width="75%" src="upload/wheatfield-crows.jpeg">
                <div class="form-group mt-2">
                  <label for="image-chooser">Image displayed for the product</label>
                  <input id="image-chooser" type="file" class="form-control-file" accept=".jpg, .webp, .jpeg,	image/webp, image/jpg image/jpeg" disabled>
                  <div class="invalid-feedback">
                    Please provide an image (.jpg or .webp).
                  </div>
                </div>
              </div>

              <h3 class="section-title">Print general info</h3>
              <div class="form-row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <div class="input-group">
                      <input id="title" type="text" class="form-control" value="Wheatfield wih Crows" readonly>
                      <div class="invalid-feedback">
                        Please provide a title with no more than 40 characters.
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="author">Author</label>
                    <div class="input-group">
                      <input id="author" type="text" class="form-control" value="Vincent Van Gogh" readonly>
                      <div class="invalid-feedback">
                        The name of the author cannot be more than 40 characters long.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-5 offset-1">
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="picture-description" class="form-control" rows="4" readonly>Wheatfield with Crows is a July 1890 painting by Vincent van Gogh. It has been cited by several critics as one of his greatest works. It is commonly stated that this was van Gogh's final painting. However, art historians are uncertain as to which painting was van Gogh's last, as no clear historical records exist.</textarea>
                  </div>
                  <div class="invalid-feedback">
                    Please provide a description.
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-6">
                  <h3 class="section-title">Print value</h3>
                  <div class="form-group">
                    <label for="base-price">Base price</label>
                    <div class="input-group">
                      <input id="base-price" type="number" class="form-control" readonly>
                      <div class="invalid-feedback">
                        Please provide a number greater than 0 and smaller than 999.
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="discount">Discount</label>
                    <div class="input-group">
                      <input id="discount" type="number" class="form-control" readonly>
                      <div class="invalid-feedback">
                        Please provide a number greater than 0 and smaller than the base price.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-5 offset-1">
                  <h3 class="section-title">Print category</h3>
                  <div class="form-group">
                    <label for="category-chooser">Current category</label>
                    <select class="form-control" id="category-chooser" readonly>
                      <option>None</option>
                      <option>Space</option>
                      <option>Film</option>
                      <option>Nature</option>
                      <option>Abstract</option>
                      <option>Street</option>
                    </select>
                  </div>
                </div>
              </div>

              <h3 class="section-title">Print techniques available</h3>
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="technique1" checked disabled>
                  <label class="form-check-label" for="technique1">
                    Print on Artist's Canvas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="technique2" disabled>
                  <label class="form-check-label" for="technique2">
                    Hand painted oil painting on Canvas
                  </label>
                </div>
              </div>
              <button id="save-settings" class="btn btn-primary d-none mt-2" type="submit" disabled>Save settings</button>
              <button id="abort-changes" class="btn btn-danger d-none mt-2" type="reset" disabled>Delete changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="js/search-bar.js"></script>
<script src="js/print-edit.js"></script>
<script src="js/print-update-image-shown.js"></script>