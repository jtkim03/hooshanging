<!DOCTYPE html>
<!--
Sources used: https://cs4640.cs.virginia.edu, https://www.w3schools.com/
-->
<html lang="en">
    <head>
        <title>Hoos HitchHiking</title>
        <link rel="stylesheet" href="styles/signin.css">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">     
        <!--Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@0,400;0,700;1,700&family=Passero+One&display=swap" rel="stylesheet">
    </head>  
    <body>
        <!-- Flexbox container -->
        <div class=container>
            <!-- Left Container (contains login,title,logo) -->
            <div class="left-container">
                <img src="styles/images/uvalogo.png" alt="uvalogo">
                <div class="title" style="font-family: 'Passero One', cursive; font-size: 7vw;">Hoos <br> Hanging?</div>
                <a href="<?php echo $client->createAuthUrl(); ?>"><button title="google-login"></button></a>
                <?php if(!empty($_SESSION["error"])){echo $_SESSION["error"];}?>
            </div>
        </div>
    </body>
</html>
