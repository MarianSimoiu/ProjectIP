<?php

include 'config.php';

$an_in = $_GET['ai'];
$an_sf = $_GET['as'];
$luna_in = $_GET['li'];
$luna_sf = $_GET['ls'];
$data_inceput = $an_in."-".$luna_in."-01";
$data_sfarsit = $an_sf."-".$luna_sf."-01";
$total = 0;
$totalR = 0;

$v = array(); //vector cu codurile vanzarilor 

$n = 0;

$sql = "SELECT cod_vanzare FROM contracte_vc WHERE data_vc BETWEEN '$data_inceput' AND '$data_sfarsit' ";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
	while ($row=mysqli_fetch_assoc($result)) {
        $cod_vanzare = $row['cod_vanzare'];
        $v[$n] = $cod_vanzare;
        $n = $n + 1;
    }
$len = count($v);


for($i = 0 ; $i<$len ; $i++) {
$crt = $i+1;   

$sql2 = "SELECT * FROM vanzari WHERE cod_vanzare = '$v[$i]' ";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);
$cod_client = $row2['cod_client'];
$cod_agent = $row2['cod_agent'];
$cod_ap = $row2['cod_ap'];

$sql3 = "SELECT * FROM clienti WHERE cod_client = '$cod_client' ";
$result3 = mysqli_query($conn,$sql3);
$row3 = mysqli_fetch_assoc($result3);
$nume_client = $row3['nume_client'];
$prenume_client = $row3['prenume_client'];

$sql4 = "SELECT * FROM agenti_vanzari WHERE cod_agent = '$cod_agent' ";
$result4 = mysqli_query($conn,$sql4);
$row4 = mysqli_fetch_assoc($result4);
$nume_agent = $row4['nume_agent'];
$prenume_agent = $row4['prenume_agent'];

$sql5 = "SELECT * FROM apartamente WHERE cod_ap = '$cod_ap' ";
$result5 = mysqli_query($conn,$sql5);
$row5 = mysqli_fetch_assoc($result5);
$numar_ap = $row5['numar_ap'];
$bloc = $row5['cod_bloc'];
$suma_ap = $row5['suma_ap'];


switch ($bloc) {
    case "1":
      $cod_bloc = "A";
      break;
    case "2":
      $cod_bloc = "B";
      break;
    case "3":
      $cod_bloc = "C";
      break;
    case "4":
      $cod_bloc = "D";
    break;
    case "5":
       $cod_bloc = "E";
    break;
    case "6":
      $cod_bloc = "F";
    break;
  }

  $apartament = $numar_ap."-".$cod_bloc;
  $suma_apTV = $suma_ap + 0.05*$suma_ap;
  $total = $total + $suma_apTV;
  $suma_ap_ron = $suma_ap * 4.7793;
  $suma_ap_ronTV = $suma_ap_ron + 0.05*$suma_ap_ron;
  $totalR =  $totalR + $suma_ap_ronTV;
  echo "	<tr>
		          <td>".$crt."</td>
		          <td>".$nume_client."</td>
                  <td>".$prenume_client."</td>
		          <td>".$nume_agent."</td>
                  <td>".$prenume_agent."</td>
				  <td>".$apartament."</td>
		          <td>".$suma_ap."</td>
              <td>".$suma_apTV."</td>
              <td>".$suma_ap_ron."</td>
              <td>".$suma_ap_ronTV."</td>
		        </tr>";

}
echo "
<tr>
		          <td>".'-'."</td>
		          <td>".'-'."</td>
                  <td>".'-'."</td>
		          <td>".'-'."</td>
                  <td>".'-'."</td>
				  <td>".'-'."</td>
          <td>".'-'."</td>
          <td>".'TOTAL= '.$total.' (EURO)'."</td>
          <td>".'-'."</td>
          <td>".'TOTAL= '.$totalR.' (RONI)'."</td>
              
		        </tr>";
if($len == 0)
echo "nimic";
?>