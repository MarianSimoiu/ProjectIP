<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Platform</title>
    <link rel="stylesheet" href= "style.css"/>
  </head>
  <body>
   <nav>
    <p> CITY POINT</p>
    <ul>
      <li>
          <a href="#" class="button">Clienti</a>
          <ul>
            <li><a href="page_adauga_client.php">Adauga client</a></li>
            <li><a href="page_cauta_client.php">Cauta client</a></li>    
          </ul>
      </li>
      <li>
          <a href="#" class="button">Apartamente</a>
          <ul>
            <li><a href="page_selecteaza_bloc.php">Adauga apartament</a></li>
            <li><a href="page_cauta_ap.php">Cauta apartament</a></li>
          </ul>
      </li>
      <li><a href="#" class="button">Rapoarte</a>
        <ul>
            <li><a href="#">Raport vanzari</a></li>
            <li><a href="#">Raport activitate</a></li>    
        </ul>
       </li>
      <li><a href="#" class="button">Facturi</a>
      <ul>
            <li><a href="page_adauga_factura.php">Adauga factura</a></li>
      </ul>
      </li>
      <li><a href="Logout.php" class="button">Logout</a></li>
    </ul>
    </nav>
   
    
  </body>
</html>
