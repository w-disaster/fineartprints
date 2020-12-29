<div class="row subtle-pattern">
  <div class="col-12 col-md-3">
    <aside>
      <section class="bg-white border mt-4 px-5 py-3 w-100">
        <form action="index.php" method="POST">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="selectAll" id="selectAll"
              value="all" checked>
            <label class="form-check-label ml-3" for="selectAll">
              Tutti
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="selectSale" id="selectSale"
              value="sale">
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
          <h2>Tecniche</h2>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label ml-3" for="defaultCheck1">
              Stampa su tela
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label ml-3" for="defaultCheck1">
              Olio su tela
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label ml-3" for="defaultCheck1">
              Stampa su carta
            </label>
          </div>
          </p>

          <p class="mt-3">
            <h2>Authors</h2>
            <?php $authors = array(); 
              for($i = 0; $i < count($templateParams["pictures"]); $i++): $authors[$i] = $templateParams["pictures"][$i]["Author"];
              endfor;
            ?>
            <?php foreach(array_unique($authors) as $author): ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="authors[]" value="<?php echo $author ?>" id="<?php echo $author ?>">
                <label class="form-check-label ml-3" for="<?php echo $author ?>">
                  <?php echo $author; ?>
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

        <h2>Prodotti</h2>
        <?php $i = 0; ?>
        <?php foreach($templateParams["pictures"] as $picture): ?>

        <?php if($i == 0): ?> <div class="row border m-0 px-3 pt-4 pb-2"> <?php endif; ?>
          
          <div class="col-6 col-md-3 d-flex flex-column pt-3"> 
            <a href="#">
              <img class="img-fluid mb-3" src="<?php echo UPLOAD_DIR.$picture["Image"];?>" alt="<?php echo $picture["Title"];?>" />
            </a>
            <h6 class="mt-3"><?php echo $picture["Title"];?></h6>
            <p><?php echo $picture["Base_price"];?> €</p>
          </div>
          
        <?php if($i == 3): $i = -1; ?> </div> <?php endif; ?>
        <?php $i++ ?>
        <?php endforeach; ?>
      </main>
    </div>
  </div>
</div>

<script src="js/info_print.js" type="text/javascript"></script>
