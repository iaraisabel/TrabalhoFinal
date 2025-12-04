<?php
session_start();
include('verifica_login.php');
include('navbar.php');

?>

<h2>Olá, 
  <?php echo $_SESSION['email']; ?>
</h2>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
<div class="container text-center">
  <div class="row align-items-start">
    <div class="col">
      <div class="card" style="width: 18rem;">
  <img src="https://labetno.ufpa.br/images/galeria_em_artigos/image03_grd.png" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
  </div>
</div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
  <img src="https://labetno.ufpa.br/images/galeria_em_artigos/image03_grd.png" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
  </div>
</div>
    </div>
    <div class="col">
     <div class="card" style="width: 18rem;">
  <img src="https://labetno.ufpa.br/images/galeria_em_artigos/image03_grd.png" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
  </div>
</div>
    </div>
  </div>

</div>
</body>
</html>