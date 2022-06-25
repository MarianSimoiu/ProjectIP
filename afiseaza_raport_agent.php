<?php

include 'config.php';

$an_in = $_GET['ai'];
$an_sf = $_GET['as'];
$luna_in = $_GET['li'];
$luna_sf = $_GET['ls'];
$data_inceput = $an_in."-".$luna_in."-01";
$data_sfarsit = $an_sf."-".$luna_sf."-01";
$cod_agent = 4;




$vc = array(); //vector cu codurile vanzarilor 
$van = array();
$n = 0;
$j = 0;

$sql = "SELECT cod_vanzare FROM contracte_vc WHERE data_vc BETWEEN '$data_inceput' AND '$data_sfarsit' ";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
	while ($row=mysqli_fetch_assoc($result)) {
        $cod_vanzare = $row['cod_vanzare'];
        $vc[$n] = $cod_vanzare;
        $n = $n + 1;
    }
    
    $len = count($vc);
   
$sql2  = "SELECT * FROM vanzari WHERE cod_agent = '$cod_agent' ";
$result2 = mysqli_query($conn,$sql2);
if(mysqli_num_rows($result2)>0)
	while ($row2=mysqli_fetch_assoc($result2)) {
        for($i=0; $i<$len; $i++)
            if($vc[$i]==$row2['cod_vanzare']){
                $van[$j] = $row2['cod_vanzare'];
                $j = $j + 1;
            }

        }


$len2= count($van);


$total = 0;
$totalcom = 0;

for($i=0;$i<$len2;$i++)
{
    $sql5  = "SELECT * FROM vanzari WHERE cod_vanzare = '$van[$i]' ";
    $result5 = mysqli_query($conn,$sql5);
    $row5 = mysqli_fetch_assoc($result5);
    $cod_ap = $row5['cod_ap'];

    $sql6  = "SELECT * FROM apartamente WHERE cod_ap = '$cod_ap' ";
    $result6 = mysqli_query($conn,$sql6);
    $row6 = mysqli_fetch_assoc($result6);
    $suma = $row6['suma_ap'];
    $total = $total + $suma;
    $com = $total*0.015;
    $totalcom = $totalcom + $com;
}


echo "	<tr>
    <td>".'1'."</td>
    <td>".$len2."</td>
    <td>".$total."</td>
    <td>".$totalcom."</td>
    </tr>";

?>