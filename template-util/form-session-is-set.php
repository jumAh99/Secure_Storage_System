<!-- MAIN FILE UPLOAD UTIL -->
<section class="file-upload-util">
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

<!-- ERROR HANDLING CALLS -->
<section class="error-handling">
    <div align="center">
        <?php
            //CHECK FOR ERROR MESSAGES
            if(isset($_GET["error"])){
                //WHAT THE ERROR MESSAGE VALUE IS 
                switch($_GET["error"]){
                    //IF THE VALUE IS AN EMPTY INPUT
                    case "file_partial":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        echo("<p>THERE WAS AN ERROR WITH THE UPLOAD!</p>"); 
                        break; 
                    //IF THE VALUE IS AN EMPTY INPUT
                    case "no_file":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        echo("<p>NO FILE WAS SELECTED!</p>"); 
                        break; 
                    case "err_extension":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        echo("<p>SOMETHING WENT WRONG!</p>"); 
                        break; 
                    case "invalid_size":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        echo("<p>THE FILE IS TOO LARGE!</p>"); 
                        break; 
                    case "cant_write":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        echo("<p>CANNOT WRITE FILE!</p>"); 
                        break; 
                    case "no_tmp_dir":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        echo("<p>NO TEMP DIRECTORY!</p>"); 
                        break; 
                    case "cannot_find_error":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        echo("<p>WE CANT FIGURE OUT THE ERROR!<p>"); 
                        break; 
                    case "stmtFailed":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        echo("<p>SOMETHING WENT WRONG!</p>"); 
                        break; 
                    case "bad_file":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        echo("<p>FILE IS UNSUPPORTED!</p>"); 
                        break; 
                    case "file_not_found":
                        //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                        echo("<p>NO FILE WAS FOUND, PLEASE TRY AGAIN!</p>"); 
                        break; 
                }
            }
        ?>
    </div>
</section>

<!-- FILE INFORMATION -->
<section class="file-innfo-table">
    <table bgcolor="#cbcbcb" width="700" align="center">
        <tr bgcolor="#92a8d1">
            <th width="120">File Name</th>
            <th width="120">File Size</th>
            <th width="120">Owner</th>
            <th width="120">Upload Date</th>
            <th width="120">Upload Time</th>
        </tr>

        <?php
            if(isset($_SESSION["userID"])){
                REQUIRE_ONCE 'php/connect-to-database.php';

                $sessionUserID = $_SESSION["userID"]; 
                $sql = "SELECT * FROM tb_file_details WHERE userID='$sessionUserID'"; 
                $run = mysqli_query($connectionObject, $sql);

                while($rows = mysqli_fetch_assoc($run)){
                    ?>
                        <tr bgcolor="#eedac2" height="50" align="center">
                            <td width="120"><a class="link" href="php/fileDownload.php?file=<?php echo $rows['fileName']?>"><?php  echo $rows["fileName"]?></a></td>
                            <td width="120"><?php echo $rows["fileSize"] . " MB"?></td>
                            
                            <?php
                                //GET THE PHP SCRIPT
                                REQUIRE_ONCE 'php/file-sharing-util.php';
                                //GET ALL THE USER INFORMATION BASED ON THE FILE 
                                $fileOwner = getUserInformation($connectionObject, $rows["userID"]); 

                                //GET THE CONDITION DEPENDING WHO IS THE OWNER OF THE FILE
                                if($fileOwner["userUID"] == $_SESSION["userUID"]){
                                    ?>
                                        <td width="120">You</td>
                                    <?php
                                }else{
                                    ?>
                                        <td width="120"> <?php echo $fileOwner["userUID"] ?></td> 
                                    <?php
                                }
                            ?>
                            <td width="120"><?php echo $rows["uploadDate"]?></td>
                            <td width="120"><?php echo $rows["uploadTime"]?></td>
                        </tr>
                    <?php 
                }
            }
        ?>
    </table>
</section>