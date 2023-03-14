<?php
    //START THE SESSION 
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form-style.css">
    <title>FILE UPLOAD</title>
</head>
<body>
    <!-- INCLUDE THE NAVIGATION BAR -->
    <?php REQUIRE_ONCE 'template-util/navigation-bar.php'?>

    <div class="container">
        <?php
            //IF THE SESSION IS SET THEN THE PAGE WILL SHOW THE REQUIRED FUNCTIONALITIES
            if(isset($_SESSION["userID"])){
                REQUIRE_ONCE "template-util/form-session-is-set.php"; 
            }else{
                echo "<button><a href='signup'>Register!</a></button>"; 
                echo"<button><a href='login'>Login!</a></button>"; 
            }
        ?>
    </div>
</body>
</html>