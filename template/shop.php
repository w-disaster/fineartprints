<div class="row subtle-pattern">
  <div class="col-12 col-md-3">
    <aside>
      <section class="bg-white border mt-4 px-5 py-3 w-100">
        <form action="index.php" method="POST">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="select" id="all" value="all" checked>
            <label class="form-check-label ml-3" for="selectAll">
              Tutti
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="select" id="sale" value="sale">
            <label class="form-check-label ml-3" for="selectSale">
              In sconto: %
            </label>
          </div>

          <div class="form-group mt-3">
            <label for="orderby_label"><h2>Order by</h2></label>
            <select id="input" name="order" class="form-control">
              <option value="none" id="none" selected>None</option>
              <option value="publish_date" id="publish_date">Publish Date (lastest)</option>
              <option value="cost_rising" id="cost_rising">Cost: rising</option>
              <option value="cost_decreasing" id="cost_decreasing">Cost: decreasing</option>

            </select>
          </div>

          <p>
          <h2>Techniques</h2>
          <?php foreach($templateParams["print_techniques"] as $technique): ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label ml-3" for="defaultCheck1">
                <?php echo $technique["Description"]; ?>
              </label>
            </div>
          <? endforeach; ?>
          </p>

          <p class="mt-3">
            <h2>Authors</h2>
            <?php foreach($templateParams["authors"] as $author): ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="authors[]" value="<?php echo $author["Author"] ?>" id="<?php echo $author["Author"] ?>">
                <label class="form-check-label ml-3" for="<?php echo $author["Author"] ?>">
                  <?php echo $author["Author"]; ?>
                </label>
              </div>
            <?php endforeach; ?>
          </p>

          <button type="submit" class="btn btn-primary mt-3 mb-3">Filter</button>

        </form>
      </section>
    </aside>
  </div>
  <div class="col-12 col-md-9 mt-4 mb-4">

    <div class="container-fluid border flex-flow-row-wrap bg-white px-5 py-4">
      <main>

        <h2>Products</h2>
        <?php $i = 0; ?>
        <?php foreach($templateParams["pictures"] as $picture): ?>

        <?php if($i == 0): ?> <div class="row border m-0 px-3 pt-4 pb-2"> <?php endif; ?>
          
          <div class="col-6 col-md-3 d-flex flex-column align-self-center pt-3"> 
            <a href="#">
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
</div>

<script src="js/info_print.js" type="text/javascript"></script>
