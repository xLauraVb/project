<?php

if(!empty($_POST)){

//connectie database
    try
    {
        $dbh = new PDO('mysql:host=localhost; dbname=pinterest', 'root', '');
    }
    catch(PDOException $e)
    {

    }
    $email = $_POST['email'];
    $password = $_POST['password'];

// invoegen query
    $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $query = $dbh->prepare( $sql );
    $query->execute( array( ':email'=>$email ) );
    $results = $query->fetchAll( PDO::FETCH_ASSOC );

    foreach( $results as $row ){
        if(password_verify($password, $row['password'])){
            session_start();
            $_SESSION['email'] = $email;
            header('Location: artiest.php');
        }
        else
        {
            header('Location: login.php');
        }
    }

}


?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    
    <title>PHPinterest login</title>
</head>
<body>
<section>
    <h1>login to PHPinterest</h1>
    <!--<form method="post" name="loggin" action="#" id="loggin">
            <input id="email" name="email" type="text" placeholder="email">
            <input id="password" name="password" type="password" placeholder="Password">
            <input id="submit" type="submit" name='submit' value="sign in" />
    </form>-->
    
    <fieldset class="fieldset_one">
            
            <legend>PHPinterst</legend>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="text" name="password" id="password">
            </div>
            <input id="submit" method="post" type="submit" name='submit' value="Login" />
            
        </fieldset>
</section>

</body>
</html>
