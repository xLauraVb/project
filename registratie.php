<?php

if(!empty($_POST)) {
// check of velden ingevuld zijn
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $options = [
        'cost' =>12,

    ];

    $password = password_hash($password, PASSWORD_DEFAULT, $options);

//connectie maken met database
        try
        {
            $pdoconn = new PDO('mysql:host=localhost; dbname=phpopdracht', 'root', '');
        }
        catch(PDOException $e)
        {

        }

// invoeren query
    $query = "insert into gebruikers (firstname, lastname, username, email, password) values ('".$firstname."','".$lastname."','".$username."','".$email."','".$password."') ";
    $statement = $pdoconn->prepare("SELECT * from users where firstname = :firstname and lastname= :lastname and username = :username and email = :email and
password = :password");

    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $password);
    $statement->bindParam(':firstname', $firstname);
    $statement->bindParam(':lastname', $lastname);
    $statement->bindParam(':username', $username);
    $statement->execute();
    $res = $pdoconn->query($query);

    if ($res != false) {


        session_start();
        $_SESSION['email'] = $email;
        header('Location: login.php');

    } else {

        header('Location: registratie.php');

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
