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

        
            $options = [
        'cost' =>12,
                
                 ];

    $password = password_hash($password, PASSWORD_DEFAULT, $options);

        
    }
    catch (Exception $e){
        $error= $e->getMessage();
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
    
