<!DOCTYPE html>
<html lang="it">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<title><?php echo $templateParams["titolo"]; ?></title>
</head>
<body class="bg-light">
<div class="container-fluid">
  <div class="row m-0 sticky-top">
    <div class="header col-12 col-md-4 bg-dark p-0">
        <h2 class="text-left text-white text-monospace mt-1 text-center">Fine Art Prints</h2>
    </div>
    <div class="aside col-12 col-md-8 bg-dark p-0">
        <ul class="nav text-center p-0">
            <li class="col-2 col-md-2 offset-md-1 nav-item p-0"><a class="nav-link text-white bg-dark" href="home.html">Home</a></li>
            <li class="col-2 col-md-2 nav-item p-0"><a class="nav-link text-white bg-dark" href="#">Products</a></li>
            <li class="col-3 col-md-2 nav-item p-0"><a class="nav-link text-white bg-dark" href="#">About us</a></li>
            <li class="col-2 col-md-2 offset-1 nav-item"><a class="nav-link bg-dark" href="#"><i class="glyphicon glyphicon-user" style="font-size:20px;color:white;"></i></a></li>
            <li class="col-2 col-md-2 nav-item "><a class="nav-link bg-dark" href="#"><i class="glyphicon glyphicon-shopping-cart" style="font-size:20px;color:white;"></i></a></li>
        </ul>
    </div>
  </div>

  <?php 
    if(isset($templateParams["nome"])){
      require($templateParams["nome"]);
  }
  ?>

  <div class="row">
    <footer class="col-12 col-md-12 px-0 bg-dark py-3">
        <ul class="nav text-center">
            <li class="col-3 col-md-3 offset-1 offset-md-1 nav-item mt-2 px-5"><a class="nav-link text-center text-white bg-dark" href="contatti.html">Contacts</a></li>
            <li class="col-2 col-md-2 nav-item mt-2"><a href="#" class="fa fa-facebook text-white mx-3 rounded" style="font-size:24px;"></a></li>
            <li class="col-2 col-md-2 nav-item mt-2"><a href="#" class="fa fa-twitter text-white mx-3 rounded" style="font-size:24px;"></a></li>
            <li class="col-2 col-md-2 nav-item mt-2"><a href="#" class="fa fa-instagram text-white mx-3 rounded" style=" font-size:24px;"></a></li>
        </ul>
    </footer>
  </div>      

</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/info_stampa.js" type="text/javascript"></script>

</body>
</html>
