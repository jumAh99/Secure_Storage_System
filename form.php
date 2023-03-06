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
    <table border="7px" align="center">
        <tr>
            <td>
                <form method="post" enctype="multipart/form-data" action="php/file-upload.php" align="center">
                    <!-- FIELD THAT ASSESS WEATHER FILE IS TOO BIG-->
                    <!-- <input type="hidden" name="MAX_FILE_SIZE" value="1048576">-->
                    <!-- INPUT FIELD TO SELECT FILE-->
                    <!-- CHECK IF THE USER IS LOGGED IN -->
                    <?php
                        if(isset($_SESSION["userID"])){
                            echo"<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"1048576\">"; 
                            echo "<td><label for=\"file\">Select File</label></td>"; 
                            echo "<td><input type=\"file\" id=\"file\" name=\"file\"></td>"; 
                            echo"<td><input type=\"submit\" name=\"submit\"></td>"; 
                        }
                    ?>
                </form>
            </td>
            <td>
            </td>
        </tr>
    </table>
    <section>
        <?php
            if(isset($_SESSION["userID"])){
                REQUIRE_ONCE 'php/connect-to-database.php';
    
                $sessionUserID = $_SESSION["userID"]; 
                $sql = "SELECT * FROM tb_file_details WHERE userID='$sessionUserID'"; 
                $run = mysqli_query($connectionObject, $sql);
    
                while($rows = mysqli_fetch_assoc($run)){
                    ?><a href="php/fileDownload.php?file=<?php echo $rows['fileName']?>"><?php echo 
                        $rows["fileName"] . " || size: " . $rows["fileSize"] . "MB"?></a><br><?php 
                }
            }
        ?>
        <?php
            if(isset($_SESSION["userID"])){
                echo "<td><button><a href='php/logout-user.php'>LogOut</a></button></td>";
            }else{
                echo "<button><a href='signup'>Register!</a></button>"; 
                echo"<button><a href='login'>Login!</a></button>"; 
            }
            //CHECK FOR ERROR MESSAGES
            if(isset($_GET["error"])){
                //WHAT THE ERROR MESSAGE VALUE IS 
                switch($_GET["error"]){
                    //IF THE VALUE IS AN EMPTY INPUT
                    case "file_partial":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        exit("<td><p>THERE WAS AN ERROR WITH THE UPLOAD!</p></td>"); 
                        break; 
                    //IF THE VALUE IS AN EMPTY INPUT
                    case "no_file":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        exit("<td>NO FILE WAS SELECTED!</td>"); 
                        break; 
                    case "err_extension":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        exit("<td>SOMETHING WENT WRONG!</td>"); 
                        break; 
                    case "invalid_size":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        exit("<td>THE FILE IS TOO LARGE!</td>"); 
                        break; 
                    case "cant_write":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        exit("<td>CANNOT WRITE FILE!</td>"); 
                        break; 
                    case "no_tmp_dir":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        exit("<td>NO TEMP DIRECTORY!</td>"); 
                        break; 
                    case "cannot_find_error":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        exit("<td>WE CANT FIGURE OUT THE ERROR!</td>"); 
                        break; 
                    case "stmtFailed":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        exit("<td>SOMETHING WENT WRONG!</td>"); 
                        break; 
                    case "bad_file":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        exit("<td>FILE IS UNSUPPORTED!</td>"); 
                        break; 
                    case "file_not_found":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        exit("<td>NO FILE WAS FOUND, PLEASE TRY AGAIN!</td>"); 
                        break; 
                    case "none":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        exit("<td>UPLOAD SUCCESSFUL!</td>"); 
                        break; 
                }
            }
        ?>
    </section>
</body>
</html>