<?php

include 'config.php';

$cod_bloc = $_GET['cod'];
$name = $_POST['name'];
$cauta = "%".$name."%";
echo $cauta;

$sql = "SELECT * FROM apartamente  WHERE cod_bloc = '$cod_bloc' AND  tip_ap LIKE '$cauta'  ORDER BY suma_ap DESC ";
																				
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		echo "	<tr>
		          <td>".$row['numar_ap']."</td>
		          <td>".$row['etaj_ap']."</td>
				  <td>".$row['suma_ap']."</td>
				  <td>".$row['suprafata_ap']."</td>
		          <td>".$row['status_ap']."</td>
		        </tr>";
	}
}
else{
	echo "<tr><td>nu există!</td></tr>";
}

?>