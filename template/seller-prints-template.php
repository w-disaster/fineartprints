<link rel="stylesheet" href="css/sidebar.css">

<div class="flex-grow-1 subtle-pattern">
  <div class="container-fluid bg-white flex-flow-row-wrap subtle-pattern">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
        <div class="sticky-top">
        <?php 
          if(isset($templateParams["sidebar"])){
            require($templateParams["sidebar"]);
          }
        ?>
          <aside class="bg-white sidebar container shadow-sm my-4 p-4 list-group list-group-flush" aria-labelledby="your-prints">
            <h3 id="your-prints" class="py-4 pl-3">Prints' list</h3>
            <label for="search-bar">Search by print title</label>
            <div class="input-group mb-2 w-75">
              <div class="input-group-prepend">
                <span class="input-group-text"><img src="upload/icons/search.svg" alt="search by print title" width="16" height="16"></span>
                <input id="search-bar" type="search" class="form-control">
              </div>
            </div>
            <?php foreach ($templateParams["prints"] as $list_item) : ?>
              <a href="?print_id=<?php echo $list_item["Title"] ?>" class="list-group-item list-group-item-action bg-white"><?php echo $list_item["Title"] ?></a>
            <?php endforeach; ?>
          </aside>
          </div>
        </div>
        <div class="col-md-9">
          <div class="container-fluid my-4 flex-grow-1">
            <div class="row">
              <div class="container bg-white p-4 rounded shadow text-center">
                <h1>Your prints</h1>
              </div>
            </div>
            <div class="row">
              <div class="container mt-4 p-4 px-5 bg-white rounded shadow-sm">
                <?php if(!$templateParams["print_selected"]): ?>
                <h3 class="">No print selected</h3>
                <?php else: ?>
                <form action="#", method="POST" enctype="multipart/form-data">
                  <h2 class="d-inline">Print details</h2>
                  <button id="edit-print" class="btn float-right"><img src="upload/icons/pencil-square.svg" alt="edit this print" aria-label="edit-print" width="32" height="32"></button>
                  <h3 class="section-title">Print image</h3>
                  <div class="row py-3 mx-1">
                    <img id="print-image" class="justify-content-center" alt="<?php echo $print["Title"] ?>" width="75%" src="<?php echo UPLOAD_DIR.$print["Image"]; ?>">
                    <div class="form-group mt-2">
                      <label for="picture">Image displayed for the product</label>
                      <input id="picture" name="picture" type="file" class="form-control-file" accept=".jpg, .webp, .jpeg,	image/webp, image/jpg image/jpeg" disabled>
                      <div class="invalid-feedback">
                        Please provide an image (.jpeg or .webp).
                      </div>
                    </div>
                  </div>

                  <h3 class="section-title">Print general info</h3>
                  <div class="form-row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="title">Title</label>
                        <div class="input-group">
                          <input id="title" name="title" type="text" class="form-control" value="<?php echo $print["Title"] ?>" readonly>
                          <div class="invalid-feedback">
                            Please provide a title with no more than 40 characters.
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="author">Author</label>
                        <div class="input-group">
                          <input id="author" name="author" type="text" class="form-control" value="<?php echo $print["Author"] ?>" readonly>
                          <div class="invalid-feedback">
                            The name of the author cannot be more than 40 characters long.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-5 offset-1">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="picture-description" name="description" class="form-control" rows="4" readonly><?php echo $print["Description"] ?></textarea>
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
                        <label for="base_price">Base price</label>
                        <div class="input-group">
                          <input id="base-price" name="base_price" type="number" step="0.01" min="0" class="form-control" value="<?php echo $print["Base_price"] ?>" readonly>
                          <div class="invalid-feedback">
                            Please provide a number greater than 0 and smaller than 999.
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="discount">Discount</label>
                        <div class="input-group">
                          <input id="discount" name="discount" type="number" step="0.01" min="0" class="form-control" value="<?php echo $print["Discount"] ?>" readonly>
                          <div class="invalid-feedback">
                            Please provide a number greater than 0 and smaller than the base price.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-5 offset-1">
                      <h3 class="section-title">Print category</h3>
                      <div class="form-group">
                        <label for="category">Current category</label>
                        <select class="form-control" id="category" name="category" readonly>
                        <option><?php echo $print["Category_name"]; ?></option>
                        <?php foreach($templateParams["categories"] as $category): ?><option><?php echo $category["Name"]; ?></option>
                        <?php endforeach; ?></select>
                      </div>
                    </div>
                  </div>
                  <h3 class="section-title">Print techniques available</h3>
                  <div class="form-group">
                  <?php foreach($templateParams["techniques"] as $technique): ?>
                    <?php if($technique["Description"] != "none"): ?>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="<?php echo $technique["Description"] ?>"  value="<?php echo $technique["Description"] ?>" id="<?php echo $technique["Description"] ?>" <?php echo (in_array($technique, $print_techniques)) ? "checked" : ""?> disabled>
                      <label class="form-check-label" for="<?php echo $technique["Title"] ?>">
                        <?php echo $technique["Description"] ?>
                      </label>
                    </div>
                    <?php else: ?>
                      <input class="form-check-input" type="checkbox" name="<?php echo $technique["Description"] ?>"  value="<?php echo $technique["Description"] ?>" id="<?php echo $technique["Description"] ?>" checked hidden>
                      <label class="form-check-label" for="<?php echo $technique["Title"] ?>" hidden>
                        <?php echo $technique["Description"] ?>
                      </label>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                  <button id="save-settings" class="btn btn-primary d-none mt-2" type="submit" disabled>Save settings</button>
                  <button id="abort-changes" class="btn btn-danger d-none mt-2" type="reset" disabled>Delete changes</button>
                </form>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="js/search-bar.js"></script>
<script src="js/print-edit.js"></script>
<script src="js/print-update-image-shown.js"></script>