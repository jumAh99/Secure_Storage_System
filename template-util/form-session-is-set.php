<!-- MAIN FILE UPLOAD UTIL -->
<section>
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
                            // echo"<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"1048576\">"; 
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
</section>

<!-- FILE INFORMATION -->
<section>
        <table bgcolor="#cbcbcb" width="700" align="center">
            <tr bgcolor="#92a8d1">
                <th width="120">File Name</th>
                <th width="120">File Size</th>
            </tr>

            <?php
                if(isset($_SESSION["userID"])){
                    REQUIRE_ONCE 'php/connect-to-database.php';
        
                    $sessionUserID = $_SESSION["userID"]; 
                    $sql = "SELECT * FROM tb_file_details WHERE userID='$sessionUserID'"; 
                    $run = mysqli_query($connectionObject, $sql);
        
                    while($rows = mysqli_fetch_assoc($run)){
                        ?>
                            <tr bgcolor="#eedac2" align="center">
                                <td width="120"><a href="php/fileDownload.php?file=<?php echo $rows['fileName']?>"><?php  echo $rows["fileName"]?></a></td>
                                <td width="120"><?php echo $rows["fileSize"] . " MB"?></td>
                            </tr>
                        <?php 
                    }
                }
            ?>
        </table>
</section>

<!-- ERROR HANDLING CALLS -->
<section>
    <?php
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
                    exit("NO FILE WAS SELECTED!"); 
                    break; 
                case "err_extension":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("SOMETHING WENT WRONG!"); 
                    break; 
                case "invalid_size":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("THE FILE IS TOO LARGE!"); 
                    break; 
                case "cant_write":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("CANNOT WRITE FILE!"); 
                    break; 
                case "no_tmp_dir":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("NO TEMP DIRECTORY!"); 
                    break; 
                case "cannot_find_error":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("WE CANT FIGURE OUT THE ERROR!"); 
                    break; 
                case "stmtFailed":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("SOMETHING WENT WRONG!"); 
                    break; 
                case "bad_file":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("FILE IS UNSUPPORTED!"); 
                    break; 
                case "file_not_found":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("NO FILE WAS FOUND, PLEASE TRY AGAIN!"); 
                    break; 
                case "none":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("UPLOAD SUCCESSFUL!"); 
                    break; 
            }
        }
    ?>
</section>

<!-- LOGOUT UTIL -->
<section>
    <button><a href='php/logout-user.php'>LogOut</a></button>
</section>