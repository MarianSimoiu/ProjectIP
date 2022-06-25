<?php

include 'config.php';

session_start();


  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM loginform WHERE password = '$password' AND username = '$username' ";

  $result=mysqli_query($conn,$sql);
 
  if(mysqli_num_rows($result)>0 ){

    $row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
    header("Location: home.php");
    
  }
  else 
    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
    swal({
      title: "Efectuat!",
      text: "Datele au fost inregistrate!",
      icon: "success",
      button: "Ok!",
    });
  </script>'; 
  

?>
  <script type="text/javascript">
  public function test()
  {
  alert('In test Function');
  }
  </script>
  }