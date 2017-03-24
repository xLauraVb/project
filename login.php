<?php

if(!empty($_POST)){


    try
    {
        $dbh = new PDO('mysql:host=localhost; dbname=phpopdracht', 'root', '');
    }
    catch(PDOException $e)
    {

    }
    $email = $_POST['email'];
    $password = $_POST['password'];


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


?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Spotify login</title>
</head>
<body>
<section>
    <h1>login to Spotify</h1>
    <form method="post" name="loggin" action="#" id="loggin">
        <fieldset>
            <input id="email" name="email" type="text" placeholder="email">
        </fieldset>
        <fieldset>
            <input id="password" name="password" type="password" placeholder="Password">
        </fieldset>
        <fieldset>
            <input id="submit" type="submit" name='submit' value="sign in" />
        </fieldset>
    </form>
    <a href="registratie.php"><button>registration</button></a>
</section>

<style>
{
  box-sizing: border-box;
}

body
{
    font-family: Helvetica;
    background-image: url(spotifywallpaper.jpg);
    background-size: 120%;
    background-position: 0% 0%;
    color: white;
}

form
{
    position: absolute;
    left: 0; right: 0; top: 0; bottom: 0;
    margin: auto;
    width: 530px;
    height: 200px;
    border-radius: 8px;
    border: 3px solid grey;
    box-sizing: content-box;
}

fieldset
{
    border: none;
    margin-top: 1em;
}

legend
{
    font-size: 1.1em;
    margin-bottom: 0.5em;
    color: white;
    font-weight: bold;
}

div
{
    float: left;
    width: 100%;
}



label
{
    width: 100%;
    margin-top: 0.5em;
    padding-top: 0.5em;
    padding-left: 7.5%;
}



input[type=text], input[type=password]
{
    width: 70%;
    background-color: transparent;
    color: #626262;
    padding: 0.5em 0 1em 0.5em;
    margin-top: 0.5em;
    margin-bottom: 0.25em;
    margin: 0.5em 5% 0.25em 5%;
    border: 0;
    border-bottom: 2px solid #626262;
    border-top: 2px solid #626262;
    font-size: 1em;
    padding: 0.5em;
}




button
{
    display: block;
    text-decoration: none;
    margin-left: auto;
    margin-right: auto;
    margin-top: 28em;
    margin-bottom: 1em;
    background-color: lightcyan;
    color: grey;
    padding: 0.5em 1.5em;
    border: 2px solid grey;
    font-size: 1em;
    width: 50%;
}
    
    
    #submit
{
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 1em;
    margin-top: 2em;
    background-color: lightcyan;
    color: grey;
    padding: 0.5em 1.5em;
    border: 2px solid grey;
    font-size: 1em;
    width: 50%;
}

button:hover
{
    cursor: pointer;
}

.feedback
{
  width: 100%;
  text-align: center;
  color: #D6391D;
  font-weight: bold;
}
    
    </style>

</body>
</html>
