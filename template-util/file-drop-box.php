<table>
    <tr>
        <td>
            <form method="post" enctype="multipart/form-data" action="php/file-upload.php" align="center">
                <?php
                    if(isset($_SESSION["userID"])){
                        // THIS FIELD WILL CONTROL THE MAX SIZE OF THE FILE UPLOADED
                        // echo"<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"1048576\">"; 
                        // THIS FIELD WILL ALLOW THE USER TO SELECT AND UPLOAD A FILE
                        echo "<td><label for=\"file\">Select File</label></td>"; 
                        // THIS FIELD WILL DISPLAY THE NAME OF THE FILE UPLOADED
                        echo "<td><input type=\"file\" id=\"file\" name=\"file\"></td>"; 
                        // THIS FIELD WILL ALLOW THE USER TO PRESS A SUBMIT BUTTON TO UPLOAD THE FILE
                        echo"<td><input type=\"submit\" name=\"submit\"></td>"; 
                    }
                ?>
            </form>
        </td>
        <td>
        </td>
    </tr>
</table>