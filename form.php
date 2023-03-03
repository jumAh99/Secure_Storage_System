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
    <title>FILE UPLOAD</title>
</head>
<body>
    <h1>
        Secure file Upload
    </h1>
    <!-- MAIN FORM WHERE THE USER WILL UPLOAD FILES -->
    <form method="post" enctype="multipart/form-data" action="php/process-form-logic.php">
        <!-- FIELD THAT ASSESS WEATHER FILE IS TOO BIG-->
        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="1048576">-->
        <!-- INPUT FIELD TO SELECT FILE-->
            <!-- CHECK IF THE USER IS LOGGED IN -->
    <?php
        if(isset($_SESSION["userUID"])){
            echo "<label for=\"file\">Select File</label>"; 
            echo "<input type=\"file\" id=\"file\" name=\"file\">"; 
            echo"<input type=\"submit\" name=\"submit\">"; 
            echo "<a href='php/logout-user.php'>LogOut</a>";
        }else{
            echo "<a href='signup.php'>Register!</a>"; 
        }
    ?>
    </form?
</body>
</html>