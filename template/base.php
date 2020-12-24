<!DOCTYPE html>
<html lang="it">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<title><?php echo $templateParams["titolo"]; ?></title>
</head>
<body class="bg-light">

<div class="container-fluid">

  <div class="row sticky-top">
    <div class="col-12">
    <nav class="navbar navbar-dark navbar-expand-md bg-dark text-white">
        <div class="container"><a class="navbar-brand logo" href="#">Fine Art Prints</a><button data-toggle="collapse"
                class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item ml-3 mr-3"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item ml-3 mr-3"><a class="nav-link" href="features.html">Products</a></li>
                    <li class="nav-item ml-3 mr-3"><a class="nav-link" href="about-us.html">About Us</a></li>
                    <li class="nav-item ml-3 mr-3"><a class="nav-link navbar-brand" href="about-us.html"><img
                                src="./assets/icons/person-circle.svg" alt="your profile" width="32" height="32"></a>
                    </li>
                    <li class="nav-item"><a class="nav-link navbar-brand" href="about-us.html"><img
                                src="./assets/icons/bag.svg" alt="cart" width="32" height="32"></a></li>
                </ul>
            </div>
        </div>
    </nav>
    </div>
  </div>


  

  <?php 
    if(isset($templateParams["nome"])){
      require($templateParams["nome"]);
  }
  ?>

  <div class="row m-0">
    <footer class="col-12 col-md-12 px-0 bg-dark py-3">
        <ul class="nav text-center">
            <li class="col-3 col-md-3 nav-item mt-2"><a class="nav-link text-center text-white bg-dark"
                    href="contatti.html">Contacts</a></li>
            <li class="col-3 col-md-3 nav-item mt-2"><img src="./assets/icons/facebook.svg" alt="" /></li>
            <li class="col-3 col-md-3 nav-item mt-2"><img src="./assets/icons/twitter.svg" alt="" /></li>
            <li class="col-3 col-md-3 nav-item mt-2"><img src="./assets/icons/instagram.svg" alt="" /></li>
        </ul>
    </footer>
  </div>  

</div>


</body>
</html>
