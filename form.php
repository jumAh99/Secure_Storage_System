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
    <form method="post" enctype="multipart/form-data" action="php/file-upload.php">
        <!-- FIELD THAT ASSESS WEATHER FILE IS TOO BIG-->
        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="1048576">-->
        <!-- INPUT FIELD TO SELECT FILE-->
    
    
    <!-- CHECK IF THE USER IS LOGGED IN -->
    <?php
        if(isset($_SESSION["userID"])){
            echo $_SESSION["userUID"];
            echo "<label for=\"file\">Select File</label>"; 
            echo "<input type=\"file\" id=\"file\" name=\"file\">"; 
            echo"<input type=\"submit\" name=\"submit\">"; 
            echo"<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"1048576\">"; 
            echo "<li><a href='php/logout-user.php'>LogOut</a></li>";
        }else{
            echo "<li><a href='signup.php'>Register!</a></li>"; 
            echo"<li><a href='login.php'>Login!</a></li>"; 
        }


        //CHECK FOR ERROR MESSAGES
        if(isset($_GET["error"])){
            //WHAT THE ERROR MESSAGE VALUE IS 
            switch($_GET["error"]){
                //IF THE VALUE IS AN EMPTY INPUT
                case "file_partial":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("<p>THERE WAS AN ERROR WITH THE UPLOAD!</p>"); 
                    break; 
                //IF THE VALUE IS AN EMPTY INPUT
                case "no_file":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("<p>NO FILE WAS SELECTED!</p>"); 
                    break; 
                case "err_extension":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("<p>SOMETHING WENT WRONG!</p>"); 
                    break; 
                case "invalid_size":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("<p>THE FILE IS TOO LARGE!</p>"); 
                    break; 
                case "cant_write":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("<p>CANNOT WRITE FILE!</p>"); 
                    break; 
                case "no_tmp_dir":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("<p>NO TEMP DIRECTORY!</p>"); 
                    break; 
                case "cannot_find_error":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("<p>WE CANT FIGURE OUT THE ERROR!</p>"); 
                    break; 
                case "stmtFailed":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("<p>SOMETHING WENT WRONG!</p>"); 
                    break; 
                case "none":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("<p>UPLOAD SUCCESSFUL!</p>"); 
                    break; 
            }
        }
    ?>
    </form?
</body>
</html>