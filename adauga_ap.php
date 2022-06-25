<?php 

include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}


	$numar= $_POST['numar_ap'];
	$etaj= $_POST['etaj_ap'];
	$suma = $_POST['suma_ap'];
	$tip = $_POST['tip_ap'];
    $suprafata =$_POST['suprafata_ap'];
    $status = $_POST['status_ap'];
    $cod= $_GET['cod'];
    $sql = "INSERT INTO apartamente (numar_ap, etaj_ap, suma_ap, tip_ap, suprafata_ap, status_ap, cod_bloc)
					VALUES ('$numar', '$etaj', '$suma','$tip','$suprafata', '$status', '$cod')";

    $result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$numar= "";
	            $etaj = "";
	            $suma = "";
	            $tip = "";
                $suprafata = "";
                $status =  "";
                $cod = "";
            }
            else echo"why";
		
        
		
?>