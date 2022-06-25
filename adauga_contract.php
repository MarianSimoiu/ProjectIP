<?php


include 'config.php';
  
  $cod= $_GET['cod'];
  
  if($cod =='1'){
  $data_r = $_POST["data"];
  $cod_plata_r = $_POST['plata_r'];
  $cod_vanzare = $_POST['vanzare'];
  $cod_ap = $_POST['cod_ap'];
  $sql = "UPDATE apartamente SET status_ap ='rezervat' WHERE cod_ap = '$cod_ap'";
  $result = mysqli_query($conn, $sql);
  

    $sql = "INSERT INTO contracte_rezervare (cod_plata_r,data_r, cod_vanzare)
					VALUES ('$cod_plata_r','$data_r', '$cod_vanzare')";
	
	
    $result = mysqli_query($conn, $sql);
  } else
  if($cod == '2'){ 
  $cod_ap = $_POST['cod_ap'];
  $data_pspa = $_POST["data"];
  $cod_plata_pspa = $_POST['plata_pspa'];
  $cod_vanzare = $_POST['vanzare'];
 $sql2 = "INSERT INTO contracte_pspa (cod_plata_pspa,data_pspa, cod_vanzare)
					VALUES ('$cod_plata_pspa','$data_pspa', '$cod_vanzare')";
	
	
    $result = mysqli_query($conn, $sql2);
  }else

 
   if($cod == '3') {
   
    $cod_ap = $_POST['cod_ap'];
    $sql = "UPDATE apartamente SET status_ap ='vandut' WHERE cod_ap = '$cod_ap'";
    $result = mysqli_query($conn, $sql);
    $cod_dir = $_POST["director"];
    $data_vc = $_POST["data"];
    $cod_plata_vc = $_POST['plata_vc'];
    $cod_vanzare = $_POST['vanzare'];
    echo $cod_dir,$data_vc,$cod_plata_vc,$cod_vanzare;
   $sql3 = "INSERT INTO contracte_vc (cod_plata_vc,data_vc, cod_vanzare,cod_director)
            VALUES ('$cod_plata_vc','$data_vc', '$cod_vanzare', '$cod_dir')";
    
    
      $result = mysqli_query($conn, $sql3);
      

   }

?>