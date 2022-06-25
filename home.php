<?php 

session_start();

if(!isset($_SESSION['username']))
  header("Location: index.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href= "homestyle.css"/>


</head>
<body>

<div class="menu-home">
    <div class="dropdown">
        <button  type="submit" class="btn" name="submit"><span class="bn39span">VÂNZĂRI</button>
        <div class="dropdown-content_1" >
                    <a href="page_adauga_client.php">Vânzare nouă</a>
                    <a href="page_cauta_client.php">Caută client</a>
        </div>
    </div>
    <div class="dropdown">
    <button type="submit" class="btn" name="submit"><span class="bn39span">APARTAMENTE</button>
    <div class="dropdown-content_2" style="bottom:248px;">
                    <a href="page_selecteaza_adauga_ap.php">Adaugă apartamente</a>
                    <a href="page_selecteaza_cauta_ap.php">Caută apartamente</a>
            </div>
    </div>
    <div class="dropdown">
    <button type="submit" class="btn" name="submit"><span class="bn39span">AGENȚI VÂNZĂRI</button>
    <div class="dropdown-content_3">
                    <a href="page_adauga_agent.php">Adaugă agent vânzari</a>
                    <a href="#">Raport activitate</a>
            </div>
    </div>
    <div class="second-part">
        <div class="dropdown">
            <button type="submit" class="btn" name="submit"><span class="bn39span">RAPOARTE</button>
                <div class="dropdown-content_4">
                    <a href="page_rapoarte_vanzari.php">Rapoarte vânzari</a>
                    <a href="page_rapoarte_ap.php">Rapoarte apartamente</a>
                </div>
        </div>
    
        <div class="dropdown">
        <button type="submit" class="btn" name="submit"><span class="bn39span">FACTURI</button>
            <div class="dropdown-content_2">
                <a href="page_adauga_factura.php">Adauga factura</a>
            </div>
        </div>
        <form action="logout.php" method="POST" style="display:inline;">
        <button type="submit" class="btn" name="submit"><span class="bn39span">DECONECTARE</button>
        </form>
    </div>
</div>
    
</body>
</html>