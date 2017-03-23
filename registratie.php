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
            $pdoconn = new PDO('mysql:host=localhost; dbname=', 'root', '');
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
       

       <form action="" method="post">
        
        <fieldset class="fieldset_one">
            
            <legend>Pinterst</legend>
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
        </fieldset>
        
        
        <button type="submit" >Login</button>
  
        <div class="feedback"></div>
        
    </form>
    
