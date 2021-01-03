  <div class="container-fluid bg-white subtle-pattern">
    <div class="row subtle-pattern">

      <div class="col-12 col-md-3 mb-4">
        <aside class="h-100">
          <section class="bg-white border mt-4 px-5 py-3 w-100">
            <form action="api-shop.php" method="POST">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="select" id="all" value="all" <?php if($templateParams["select"] == "all"): echo "checked"; endif; ?>>
                <label class="form-check-label ml-3" for="selectAll">
                  Tutti
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="select" id="sale" value="sale" <?php if($templateParams["select"] == "sale"): echo "checked"; endif; ?>>
                <label class="form-check-label ml-3" for="selectSale">
                  In sconto: %
                </label>
              </div>

              <div class="form-group mt-3">
                <label for="orderby_label"><h2>Order by</h2></label>
                <select id="input" name="order" class="form-control">
                  <option value="none" id="none" <?php if($templateParams["order"] == "none"): echo "selected"; endif; ?>>None</option>
                  <option value="publish_date" id="publish_date" <?php if($templateParams["order"] == "publish_date"): echo "selected"; endif; ?>>Publish Date (lastest)</option>
                  <option value="cost_rising" id="cost_rising" <?php if($templateParams["order"] == "cost_rising"): echo "selected"; endif; ?>>Cost: rising</option>
                  <option value="cost_decreasing" id="cost_decreasing" <?php if($templateParams["order"] == "cost_decreasing"): echo "selected"; endif; ?>>Cost: decreasing</option>

                </select>
              </div>

              <p>
              <h2>Categories</h2>
              <?php foreach($templateParams["all_categories"] as $category): ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="categories[]" value="<?php echo $category["Name"]; ?>"  id="<?php echo $category["Name"]; ?>" 
                    <?php if(in_array($category["Name"], $templateParams["filtered_categories"])): echo "checked"; endif;?>>
                  <label class="form-check-label ml-3" for="<?php echo $category["Name"]; ?>">
                  <?php echo $category["Name"]; ?>
                  </label>
                </div>
              <? endforeach; ?>
              </p>

              <p class="mt-3">
                <h2>Authors</h2>
                <?php foreach($templateParams["authors"] as $author): ?>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="authors[]" value="<?php echo $author["Author"] ?>" id="<?php echo $author["Author"] ?>"
                    <?php if(in_array($author["Author"], $templateParams["filtered_authors"])): echo "checked"; endif;?>>
                    <label class="form-check-label ml-3" for="<?php echo $author["Author"] ?>">
                      <?php echo $author["Author"]; ?>
                    </label>
                  </div>
                <?php endforeach; ?>
              </p>

              <button type="submit" class="btn btn-primary mt-3 mb-3">Filter</button>

            </form>
          </section>
          <div class="replace-area sticky-top"></div>
        </aside>
      </div>
      <?php if(empty($templateParams["pictures"])): ?>
        <div class="col-12 col-md-9 my-4 py-4 bg-white">
          <h2>No product available</h2>
        </div>
      <?php else: ?>

      <div class="col-12 col-md-9 mt-4 mb-4">

        <div class="container-fluid border bg-white px-5 py-4">
          <main>

            <h1 class="display-4 mb-3">Products</h1>
            <?php $i = 0; ?>
            <?php foreach($templateParams["pictures"] as $picture): ?>

            <?php if($i == 0): ?> <div class="row border m-0 px-3 pt-4 pb-2"> <?php endif; ?>
              
              <div class="col-6 col-md-3 d-flex flex-column align-self-center pt-3"> 
                <a href="api-product.php?title=<?php echo $picture["Title"] ?>">
                  <img class="img-fluid mb-3" src="<?php echo UPLOAD_DIR.$picture["Image"];?>" alt="<?php echo $picture["Title"];?>" />
                </a>
                <h6 class="mt-3"><?php echo $picture["Title"];?></h6>

                <?php if($picture["Discount"] > 0): ?>
                  <p class="m-0"><del><?php echo $picture["Base_price"];?> €</del></p>
                  <p class="text-danger"><?php echo $picture["Base_price"] - ($picture["Base_price"] * $picture["Discount"])/100;?> €</p>
                <?php else: ?>
                  <p><?php echo $picture["Base_price"];?> €</p>
                <?php endif; ?>
              </div>
              
            <?php if($i == 3): $i = -1; ?> </div> <?php endif; ?>
            <?php $i++ ?>
            <?php endforeach; ?>
          </main>
        </div>
      </div>
      <?php endif; ?>

    </div>
  </div>

<script src="js/shop-prints.js" type="text/javascript"></script>
