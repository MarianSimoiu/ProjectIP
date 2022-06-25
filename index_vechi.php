<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Platforma plati</title>
  <link rel="stylesheet" href= "style_index.css"/>
</head>

<body>
  <div id="container">
   
      <div id="image">
        <img src="images/logo.PNG"/>
      </div>

      <h1><sup>Bine ai venit!</sup></h1>
      <br>
      <h2><sup>Logheaza-te pentru a folosi platforma.</sup></h2>    
   </div>

    <div id="frm"> 
        <h3>Login</h3>
        <form action="login.php" method="POST">
         <label class="lab">Username:</label>
         <br>
         <input type="text"  name="username" >
        <p>
         <label class="lab">Password :</label>
         <br>
         <input type="password" name="password" >
        </p>
      <div class="item">
         <input type="checkbox" id="a">
         <label for="a">Remember Username</label>
      </div> 
      <p>
         <button type="submit" id="btn" name="submit">Log in</button>
        </form>
      </p>
      
    </div>

  
</body>
</html>