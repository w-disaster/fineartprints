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
                <h2 class="d-inline">Add new print</h2>
                <form action="#", method="POST" enctype="multipart/form-data">
                  <h3 class="section-title">Print image</h3>
                  <div class="row py-3 mx-1">
                    <img id="print-image" class="justify-content-center" alt="<?php echo $print["Title"] ?>" width="75%" src="<?php echo UPLOAD_DIR.$templateParams["placeholder"]; ?>">
                    <div class="form-group mt-2">
                      <label for="picture">Image displayed for the product</label>
                      <input id="picture" name="picture" type="file" class="form-control-file <?php echo (isset($templateParams["image_upload_error_msg"])) ? "is-invalid" : "" ?>" accept=".jpg, .webp, 	image/webp, image/jpg" required>
                       <div class="invalid-feedback">
                        <?php if(isset($templateParams["image_upload_error_msg"])) { echo $templateParams["image_upload_error_msg"]; } ?>
                      </div>
                    </div>
                  </div>
                  <h3 class="section-title">Print general info</h3>
                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="title">Title</label>
                          <input id="title" name="title" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="author">Author</label>
                          <input id="author" name="author" type="text" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-5 offset-md-1">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6">
                      <h3 class="section-title">Print value</h3>
                      <div class="form-group">
                        <label for="base-price">Base price</label>
                        <div class="input-group">
                          <input id="base-price" name="base_price" type="number" step="0.01" min="0" class="form-control <?php echo (isset($templateParams["price_error_msg"])) ? "is-invalid" : "" ?>" value="<?php echo $print["Base_price"] ?>" required>
                          <div class="invalid-feedback">
                          <?php if(isset($templateParams["price_error_msg"])) { echo $templateParams["price_error_msg"]; } ?>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="discount">Discount</label>
                        <div class="input-group">
                          <input id="discount" name="discount" type="number" step="0.01" min="0" class="form-control <?php echo (isset($templateParams["discount_error_msg"])) ? "is-invalid" : "" ?>" value="<?php echo $print["Discount"] ?>" required>
                            <div class="invalid-feedback">
                            <?php if(isset($templateParams["discount_error_msg"])) { echo $templateParams["discount_error_msg"]; } ?>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5 offset-md-1">
                      <h3 class="section-title">Print category</h3>
                      <div class="form-group">
                        <div class="form-group">
                        <label for="category">Current category</label>
                        <select class="form-control" id="category" name="category">
                        <?php foreach($templateParams["categories"] as $category): ?><option><?php echo $category["Name"]; ?></option>
                        <?php endforeach; ?></select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <h3 class="section-title">Print techniques available</h3>
                  <div class="form-group">
                    <?php foreach($templateParams["techniques"] as $technique): ?>
                    <?php if($technique["Description"] != "none"): ?>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="<?php echo $technique["Description"] ?>"  value="<?php echo $technique["Description"] ?>" id="<?php echo $technique["Description"] ?>" <?php echo (in_array($technique, $print_techniques)) ? "checked" : ""?>>
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