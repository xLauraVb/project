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

?>
       

       <form action="" method="post">
        
        <fieldset class="fieldset_one">
            
            <legend>Pinterst</legend>
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="firstname">firstname</label>
                <input type="text" name="firstname" id="firstname">
            </div>
            <div>
                <label for="lastname">lastname</label>
                <input type="text" name="lastname" id="lastname">
            </div>
            <div>
                <label for="email">email</label>
                <input type="text" name="email" id="email">
            </div>
            
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
        </fieldset>
        
        
        <button type="submit" >Registreer</button>
        <a href="login.php"><button>Login</button></a>
  
        <div class="feedback"></div>
        
    </form>
    
