<?php

// Create connection
include 'config.php';


$sql = "SELECT * FROM clienti WHERE nume_client LIKE '%".$_POST['name']."%'";


$result = mysqli_query($conn, $sql);


if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {

		$ccl = $row['cod_client'];
		

		$sql_cod_vanzare = "SELECT * FROM vanzari WHERE cod_client = '$ccl' ";

		$result2 = mysqli_query($conn, $sql_cod_vanzare);
      
		$row_vanzare = mysqli_fetch_assoc($result2);
		$cod_vanzare = $row_vanzare['cod_vanzare'];
		
		$nume = $row['nume_client'];
		$prenume = $row['prenume_client'];

		echo "	<tr>
		          <td>".$row['nume_client']."</td>
		          <td>".$row['prenume_client']."</td>
				  <td>".$row['data_nasterii']."</td>
		          <td>".$row['telefon_client']."</td>
				  <td>".$row['email_client']."</td>
				  <td ><a  href='page_detalii_client.php?cod=".$cod_vanzare."&nume=".$nume."&prenume=".$prenume."'>Detalii</a></td>
		        </tr>";
	}
}
else{
	echo "<tr><td>0 result's found</td></tr>";
}

?>