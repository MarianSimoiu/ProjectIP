<?php 

include 'config.php';

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$nume = $_POST['nume_agent'];
$prenume = $_POST['prenume_agent'];
$email = $_POST['email_agent'];
$telefon = $_POST['telefon_agent'];

$sql = "INSERT INTO agenti_vanzari(nume_agent, prenume_agent, telefon_agent, email_agent)
        VALUES('$nume', '$prenume', '$telefon', '$email')";

$result = mysqli_query($conn, $sql);