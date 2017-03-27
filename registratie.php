<?php


include_once ("user.classe.php");


if(!empty($_POST)){
    try{
        $Gebruiker1 = new Gebruiker();
        $Gebruiker1->Firstname = $_POST["firstname"];
        $Gebruiker1->Lastname = $_POST["lastname"];
        $Gebruiker1->Username = $_POST["username"];
        $Gebruiker1->Password = $_POST["password"];
        $Gebruiker1->Email = $_POST["email"];
        $Gebruiker1->Save();

        
    }
    catch (Exception $e){
        $error= $e->getMessage();
    }
}



?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <!--<link rel="stylesheet" href="resetcss.css">-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
  
   <header>
   <nav>
       <ul class="login"><a href="login.php">Login</a></ul>
   </nav>
   </header>
   
   
<div class="box">
    <h1>Registreren</h1>
    
<form action="" method="post">

  <div class="form-group">
    <label for="firstname">First name</label>
    <input name="firstname" id="password" type="text" />
  </div>
   
  <div class="form-group">
    <label for="lastname">Last Name</label>
    <input name="lastname" id="password" type="text" />
  </div>
  
    <div class="form-group">
    <label for="username">Username</label>
    <input name="username" id="password" type="text" />
  </div>
  
  <div class="form-group">
    <label for="email">Email address</label>
    <input name="email" id="password" type="email" />
  </div>
  
  <div class="form-group">
    <label for="password">Password</label>
    <input name="password" id="password" type="password" />
  </div>
  
  
  <div class="form-group">
  <button class="btn" type="submit">Registreren</button>
    </div>
  <div class="clearfix"></div>
</form>
</div>

    
</body>
</html>
