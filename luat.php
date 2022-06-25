<?php

include "config.php";

$den = "Magar";

$sql = "INSERT INTO functii (denumire_functie) VALUES ('$den') ";
$result = mysqli_query($conn, $sql);
     
?>