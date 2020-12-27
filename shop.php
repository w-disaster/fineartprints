<div class="row subtle-pattern">
  <div class="col-12 col-md-3">
    <aside>
      <section class="bg-white border mt-4 px-5 py-3 w-100">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
            value="option1" checked>
          <label class="form-check-label ml-3" for="exampleRadios1">
            Tutti
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
            value="option2">
          <label class="form-check-label ml-3" for="exampleRadios2">
            In sconto: %
          </label>
        </div>

        <div class="dropdown show mt-3 mb-3">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Order by
          </a>

          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Publish date</a>
            <a class="dropdown-item" href="#">Most popular</a>
            <a class="dropdown-item" href="#">Cost: rising</a>
            <a class="dropdown-item" href="#">Cost: decreasing</a>
          </div>
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
          <h2>Autori</h2>
          <?php $authors = array(); 
            for($i = 0; $i < count($templateParams["pictures"]); $i++): $authors[$i] = $templateParams["pictures"][$i]["Author"];
            endfor;
          ?>
          <?php foreach(array_unique($authors) as $author): ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label ml-3" for="defaultCheck1">
                <?php echo $author; ?>
              </label>
            </div>
          <?php endforeach; ?>
        </p>
      </section>
    </aside>
  </div>
  <div class="col-12 col-md-9 mt-4 mb-4">

    <div class="container-fluid border flex-flow-row-wrap bg-white px-5 py-4">
      <main>

        <h2>Prodotti</h2>
        <?php $i = 0; ?>
        <?php foreach($templateParams["pictures"] as $picture): ?>

        <?php if($i == 0): ?> <div class="row border m-0 px-3 py-4"> <?php endif; ?>
          
        <div class="col-6 col-md-3 d-flex flex-column align-self-center pt-3">
          <a href="#">
            <img class="img-fluid mb-4" src="<?php echo UPLOAD_DIR.$picture["Image"];?>" alt="<?php echo $picture["Title"];?>" />
          </a>
          <h6><?php echo $picture["Title"];?></h6>
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
