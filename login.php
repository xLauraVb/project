<?php

if(!empty($_POST)){

//connectie database
    try
    {
        $dbh = new PDO('mysql:host=localhost; dbname=', 'root', '');
    }
    catch(PDOException $e)
    {

    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
  

// invoegen query
    $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $query = $dbh->prepare( $sql );
    $query->execute( array( ':email'=>$email ) );
    $results = $query->fetchAll( PDO::FETCH_ASSOC );

    foreach( $results as $row ){
        if(password_verify($password, $row['password'])){
            session_start();
            $_SESSION['email'] = $email;
            header('Location: pinterest.php');
        }
        else
        {
            header('Location: login.php');
        }
    }

}

?>
