<?php 

include 'config.php';

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}


  $nume_client = $_POST['nume_client'];
	$nume_agent = $_POST['nume_agent'];
	$suma = $_POST['suma'];
	$nr_ap = $_POST['numar_ap'];
  $bloc =$_POST['bloc'];
  $data = $_POST["data"];

    $sql = "SELECT cod_agent FROM agenti_vanzari WHERE nume_agent = '$nume_agent' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $cod_agent = $row['cod_agent'];

    $sql2 = "SELECT cod_client FROM clienti WHERE nume_client = '$nume_client' ";
    $result2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $cod_client = $row2['cod_client'];

    switch ($bloc) {
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

    $sql4 = "SELECT cod_ap FROM apartamente WHERE numar_ap = '$nr_ap' AND cod_bloc = '$cod_bloc' ";
    $result4 = mysqli_query($conn,$sql4);
    $row4 = mysqli_fetch_assoc($result4);
    $cod_ap = $row4['cod_ap'];
 $suma = $suma / 4.7793; 
  $sql5 = "INSERT INTO facturi (serie_factura, data_factura, suma_factura, cod_client, cod_agent, cod_ap)
					VALUES ('2886', '$data', '$suma','$cod_client','$cod_agent', '$cod_ap')";

  $result5 = mysqli_query($conn, $sql5);
  
  $nr_facturi = array(0,0,0);
  $i = 0;

  $sql6 = "SELECT * FROM facturi WHERE cod_client = '$cod_client' AND cod_ap = '$cod_ap' AND cod_agent = '$cod_agent' ";
  $result6 = mysqli_query($conn,$sql6);
  
  if(mysqli_num_rows($result6)>0){
    while ($row6=mysqli_fetch_assoc($result6)) {
        $nr_facturi[$i] = $row6['nr_factura'];
        $i = $i +1;
    }}

 
   $sql7 = "SELECT achitata_r FROM plati_r WHERE nr_factura = '$nr_facturi[0]' ";
   $result7 = mysqli_query($conn,$sql7);
  
  if(mysqli_num_rows($result7)>0){
    $row7 = mysqli_fetch_assoc($result7);
    $achitata_r = $row7['achitata_r'];
    }  else
    $achitata_r = 0;

    $sql8 = "SELECT achitata_pspa FROM plati_pspa WHERE nr_factura = '$nr_facturi[1]' ";
    $result8 = mysqli_query($conn,$sql8);
    
    if(mysqli_num_rows($result8)>0){
      $row8 = mysqli_fetch_assoc($result8);
      $achitata_pspa = $row8['achitata_pspa'];
    }  else
      $achitata_pspa = 0;
      
    $sql9 = "SELECT achitata_vc FROM plati_vc WHERE nr_factura = '$nr_facturi[2]' ";
    $result9 = mysqli_query($conn,$sql9);

    if(mysqli_num_rows($result9)>0){
        $row9 = mysqli_fetch_assoc($result9);
      $achitata_vc = $row9['achitata_vc'];
      }  else
        $achitata_vc = 0;


 if($achitata_r == 0){
    $sql10 = "INSERT INTO plati_r (nr_factura, suma_r, achitata_r)
            VALUES ('$nr_facturi[0]', '$suma','Da')";
        $result10 = mysqli_query($conn, $sql10);
 }
    else
         if($achitata_pspa == 0){
            $sql11 = "INSERT INTO plati_pspa (nr_factura, suma_pspa, achitata_pspa)
            VALUES ('$nr_facturi[1]', '$suma','Da')";
                 $result11 = mysqli_query($conn, $sql11);
         }
            else
                 if($achitata_vc == 0 ){
                     $sql12 = "INSERT INTO plati_vc (nr_factura, suma_vc, achitata_vc)
                            VALUES ('$nr_facturi[2]', '$suma','Da')";
                    $result12 = mysqli_query($conn, $sql12);
                 }
    


?>
 