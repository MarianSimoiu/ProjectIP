<?php 

session_start();
if(!isset($_SESSION['username']))
  header("Location:index.php");
  
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href= "lemn.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

<div class="navbar">
  <a href="home.php">Acasa</a>
  <div class="subnav">
    <button class="subnavbtn">Clienti <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="page_adauga_client.php">Adauga client</a>
      <a href="page_cauta_client.php">Cauta client</a>
    </div>
  </div> 
  <div class="subnav">
    <button class="subnavbtn">Apartamente <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="page_selecteaza_cauta_ap.php"">Cauta apartamente</a>
      <a href="page_selecteaza_adauga_ap.php">Adauga apartamente</a>
    
    </div>
  </div> 
  <div class="subnav">
    <button class="subnavbtn">Rapoarte <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="page_rapoarte_vanzari.php">Rapoarate vanzari</a>
      <a href="page_rapoarte_ap.php">Rapoarte apartamente</a>
      <a href="#link3">Rapoarte activitate</a>
      <a href="#link4">Rapoarte lunare</a>
    </div>
  </div>
  <a href="page_adauga_factura.php">Adauga factura</a>
  <a href="page_adauga_agent.php">Adauga agent vanzari</a>
</div>




