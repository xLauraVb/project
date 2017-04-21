<?php




?> 

// profiel aanpassen zie feature 4
// foto + naam + username weergeven



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IMDterest</title>
    <link rel="stylesheet" href="css/style_homepage.css">
</head>
<body>
   
    <header>
       <a id="logo" href="homepage.php"><h1>IMDTEREST</h1></a>
       <a href="homepage.php"><button id ="buttonhomepage">HOMEPAGE</button></a>
       <a href="profiel.php"><button id ="buttonprofiel">PROFIEL</button></a>
<a href="logout.php"><button id ="buttonuitlog">UITLOGGEN</button></a>
</header>

<div id="achtergrond">
   
   <div id="bewerk">
   <h1>Profiel bewerken</h1>
  </div>
  
        <form method="post"> 
    Username: <input type="text" name="nickname"><br />
    Password: <input type="password" name="password"><br />
    <input type="submit" value="Submit">
</form>
  

    
    </div>
</body>
</html>


