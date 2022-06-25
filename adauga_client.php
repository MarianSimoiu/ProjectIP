<?php 

include 'config.php';

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}


	$nume = $_POST['nume'];
	$prenume = $_POST['prenume'];
	$CNP = $_POST['CNP'];
	$adresa = $_POST['adresa'];
    $data_nasterii=$_POST['data_nasterii'];
    $telefon= $_POST["telefon"];
    $email= $_POST["email"];
	$nume_agent = $_POST["nume_agent"];
	$numar_ap = $_POST["numar_apartament"];
	$nume_bloc = $_POST["bloc_vanzare"];

    $sql = "INSERT INTO clienti (nume_client, prenume_client, CNP, telefon_client, adresa_client, data_nasterii, email_client)
					VALUES ('$nume', '$prenume', '$CNP','$telefon','$adresa', '$data_nasterii', '$email')";
	
	
    $result = mysqli_query($conn, $sql);
			if ($result) {
				
				$nume = "";
	            $prenume = "";
	           
	            $adresa = "";
                $data_nasterii= "";
                $telefon=  "";
            }
        

	$sql="SELECT cod_client FROM clienti WHERE CNP = '$CNP' ";
	
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		while ($row=mysqli_fetch_assoc($result)) {
			$cod_cl = $row['cod_client'];
		}
	}

	

	$sql="SELECT cod_agent FROM agenti_vanzari WHERE nume_agent = '$nume_agent' ";
	
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		while ($row=mysqli_fetch_assoc($result)) {
			$cod_ag = $row['cod_agent'];
		}
	}
	
	

switch ($nume_bloc) {
  case "A":
    $cod_bloc = 1;
    break;
  case "B":
    $cod_bloc = 2;
    break;
  case "C":
    $cod_bloc = 3;
    break;
  case "D":
	$cod_bloc = 4;
	break;
  case "E":
	$cod_bloc = 5;
	break;
  case "F":
	$cod_bloc = 6;
	break;
}
	$sql="SELECT cod_ap FROM apartamente WHERE numar_ap = '$numar_ap' AND cod_bloc = $cod_bloc";
	
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		while ($row=mysqli_fetch_assoc($result)) {
			$cod_ap= $row['cod_ap'];
		}
	}

	$sql = "INSERT INTO vanzari (cod_client,cod_agent,cod_ap)
					VALUES ('$cod_cl', '$cod_ag', '$cod_ap')";
	
	
	$result = mysqli_query($conn, $sql);
			if ($result) {
			echo "SUCCES";
			}
			
				
	
?>