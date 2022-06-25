<?php

include 'config.php';

$an_in = $_GET['ai'];
$an_sf = $_GET['as'];
$luna_in = $_GET['li'];
$luna_sf = $_GET['ls'];
$data_inceput = $an_in."-".$luna_in."-01";
$data_sfarsit = $an_sf."-".$luna_sf."-01";

$vPer = array();
$cod_client = 0;
$sql = "SELECT * FROM facturi WHERE data_factura BETWEEN '$data_inceput' AND '$data_sfarsit' ORDER BY cod_client  ";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
	while ($row=mysqli_fetch_assoc($result)) {
        $cod_client = $row['cod_client'];

     if( )
    
        
       
    } 










$len = count($vPer);
$j=0;
$sql2  = "SELECT * FROM vanzari";
$result2 = mysqli_query($conn,$sql2);
if(mysqli_num_rows($result2)>0)
	while ($row2=mysqli_fetch_assoc($result2)) {
        for($i=0; $i<$len; $i++)
            if($vPer[$i]==$row2['cod_vanzare']){
                $cCl[$j] = $row2['cod_client'];
                $j = $j + 1;
            }
$len = count($cCl);
