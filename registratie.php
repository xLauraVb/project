<?php

if(!empty($_POST)) {
// check of velden ingevuld zijn
    $email = $_POST["email"];
    $password = $_POST["password"];

    $options = [
        'cost' =>12,

    ];

    $password = password_hash($password, PASSWORD_DEFAULT, $options);

//connectie maken met database
        try
        {
            $pdoconn = new PDO('mysql:host=localhost; dbname=spotify_faker', 'root', '');
        }
        catch(PDOException $e)
        {

        }

// invoeren query
    $query = "insert into users (email, password) values ('".$email."','".$password."') ";
    $statement = $pdoconn->prepare("SELECT * from users where username = :username and
password = :password");

    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $password);
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

?>
