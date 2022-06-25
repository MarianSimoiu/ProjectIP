<?php

include 'config.php';

$tip = $_GET['tip'];
$status = $_GET['status'];
$pret_in = $_GET['pi'];
$pret_sf = $_GET['ps'];
$suprafata_in = $_GET['si'];
$suprafata_sf = $_GET['ss'];

$an_in = $_GET['ai'];
$an_sf = $_GET['as'];
$luna_in = $_GET['li'];
$luna_sf = $_GET['ls'];
$data_inceput = $an_in."-".$luna_in."-01";
$data_sfarsit = $an_sf."-".$luna_sf."-01";


if($status != "vandut"){

$sql = "SELECT * FROM apartamente WHERE status_ap = '$status' AND 
        tip_ap = '$tip' AND 
        suma_ap  BETWEEN '$pret_in' AND '$pret_sf' AND
        suprafata_ap BETWEEN '$suprafata_in' AND '$suprafata_sf' ";
$result = mysqli_query($conn,$sql);
$crt = 0;



if(mysqli_num_rows($result)>0)
while ($row=mysqli_fetch_assoc($result)) {
$crt = $crt +1;
switch ($row['cod_bloc']) {
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
echo "	<tr>
    <td>".$crt."</td>
    <td>".$row['numar_ap']."</td>
    <td>".$cod_bloc."</td>
    <td>".$row['etaj_ap']."</td>
    <td>".$row['suma_ap']."</td>
    </tr>";
}
}else
{ $crt = 1;
  $vCodVanzari = array();
  $i = 0;
  $sql5 = "SELECT * FROM contracte_vc WHERE  data_vc BETWEEN '$data_inceput' AND '$data_sfarsit' ";
  $result5 = mysqli_query($conn, $sql5);
  if(mysqli_num_rows($result5)>0)
  while ($row5=mysqli_fetch_assoc($result5)) {
    $vCodVanzari[$i]=$row5['cod_vanzare'];
    $i = $i +1;
  } 
  
  $vCodAp = array();
  $i = 0;
  $sql2 = "SELECT * FROM vanzari ";
  $result2 = mysqli_query($conn, $sql2);
  if(mysqli_num_rows($result2)>0)
  while ($row2=mysqli_fetch_assoc($result2)) {
    for($j=0;$j<count($vCodVanzari);$j++)
      if($vCodVanzari[$j]==$row2['cod_vanzare'])
        {$vCodAp[$i]=$row2['cod_ap'];
          $i = $i+1;
        }
  }
 
  $sql3 = "SELECT * FROM apartamente ";
  $result3 = mysqli_query($conn, $sql3);
  if(mysqli_num_rows($result3)>0)
  while ($row3=mysqli_fetch_assoc($result3)) {
    for($j=0;$j<count($vCodAp);$j++)
      if($vCodAp[$j]==$row3['cod_ap'] && $row3['tip_ap']==$tip)
      {
        switch ($row3['cod_bloc']) {
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
        echo 
      "	<tr>
      <td>".$crt."</td>
      <td>".$row3['numar_ap']."</td>
      <td>".$cod_bloc."</td>
      <td>".$row3['etaj_ap']."</td>
      <td>".$row3['suma_ap']."</td>
      </tr>";
      $crt = $crt + 1;
      }
    }}

?>