<?php

if(!empty($_POST)){


    try
    {
        $dbh = new PDO('mysql:host=localhost; dbname=phpopdracht', 'root', '');
    }
    catch(PDOException $e)
    {

    }
    $email = $_POST["email"];
    $password = $_POST["password"];


    
    
    $sql = "SELECT * FROM gebruikers WHERE email = :email LIMIT 1";
    $query = $dbh->prepare( $sql );
    $query->execute( array( ':email'=>$email ) );
    $results = $query->fetchAll( PDO::FETCH_ASSOC );

    foreach( $results as $row ){
        if(password_verify($password, $row['password'])){
            session_start();
            $_SESSION['email'] = $email;
            header('Location: homepage.php');
        }
        else
        {
            header('Location: login.php');
        }
    }

}



?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

 <header>
     <nav>
       <ul class="login"><a href="registratie.php">Registreren</a></ul>
   </nav>
 </header>
  
   <div class="box">
    <form class="form-group" action="" method="post">
            
            <!--<legend>Pinterst</legend>-->
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="password">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
        
        
        <button class="btn" type="submit" >Login</button>
        
        <div class="clearfix"></div>
        
    </form>
    </div>

    
</body>
</html>
