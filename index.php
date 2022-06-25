<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pagina logare</title>

<link rel="stylesheet" href= "indexul.css"/>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<div class="overlay">

<form action="login.php" method="POST">

   <div class="con">

   <header class="head-form">
      <h2>Logare</h2>
 
      <p>Introduceti numele de utilizator si parola pentru a folosi platforma.</p>
   </header>
 
   <br>
   <div class="field-set">
     
  
         <span class="input-item">
           <i class="fa fa-user-circle"></i>
         </span>
        <!--   user name Input-->
         <input class="form-input" id="txt-input" name="username" type="text" placeholder="Nume utilizator" required>
     
      <br>
     
           <!--   Password -->
     
      <span class="input-item">
        <i class="fa fa-key"></i>
       </span>
      <!--   Password Input-->
      <input class="form-input" type="password" name="password" placeholder="Parola" id="pwd"   required>
     

     
     
      <br>
<!--        buttons -->
<!--      button LogIn -->
      <button class="log-in"> Logare </button>
   </div>

   <div class="other">



      <i class="fa fa-user-plus" aria-hidden="true"></i>
      </button>
<!--      End Other the Division -->
   </div>
     
<!--   End Conrainer  -->
  </div>
  
  <!-- End Form -->
</form>
</div>
</body>


</html>