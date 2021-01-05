<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $templateParams["title"]." - Fine Art Prints" ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="shortcut icon" type="image/jpg" href="upload/icons/file-richtext.svg" />
  <link rel="stylesheet" href="css/theme.css">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
</head>

<body>
  <div class="d-flex flex-column h-100">
    <nav class="navbar navbar-dark navbar-expand-md bg-dark shadow-sm">
      <div class="container"><a class="navbar-brand logo" href="home.php">Fine Art Prints</a><button data-toggle="collapse"
          class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle
            navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="api-shop.php">Shop</a></li>
            <li class="nav-item"><a class="nav-link" href="api-categories.php">Categories</a></li>
            <li class="nav-item"><a class="nav-link navbar-brand" href="login.php"><img
                  src="<?php echo UPLOAD_DIR.'/icons/person-circle.svg'?>" alt="your profile" width="32" height="32"></a>
            </li>
            <li class="nav-item"><a class="nav-link navbar-brand" href="shopping-cart.php"><img src="<?php echo UPLOAD_DIR.'/icons/bag.svg'?>"
                  alt="cart" width="32" height="32"><span id="cart-item-count" class="badge badge-light badge-pill text-dark"><?php echo $_SESSION["products_count"] ?? 0?></span></a></li>
            <?php if(isset($_SESSION["email"])): ?>
              <li class="nav-item"><a class="nav-link navbar-brand" href="logout.php"><img
                  src="<?php echo UPLOAD_DIR.'/icons/box-arrow-right.svg'?>" alt="your profile" width="32" height="32"></a>
              </li>            
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

    <?php 
      if(isset($templateParams["name"])){
        require($templateParams["name"]);
    }
    ?>

    <div class="row m-0">
      <footer class="col-12 col-md-12 px-0 bg-dark py-3">
        <div class="nav d-flex justify-content-center">
          <a class="d-flex flex-fill nav-link justify-content-center text-white bg-dark" href="api-about-us.php">About us</a>
          <img class="d-flex flex-fill" src="<?php echo UPLOAD_DIR?>icons/facebook.svg" alt="facebook profile" width="32" height="32" />
          <img class="d-flex flex-fill" src="<?php echo UPLOAD_DIR?>icons/twitter.svg" alt="twitter profile" width="32" height="32" />
          <img class="d-flex flex-fill" src="<?php echo UPLOAD_DIR?>icons/instagram.svg" alt="instragram page" width="32" height="32" />
        </div>
      </footer>
    </div> 

</div>


</body>
</html>
