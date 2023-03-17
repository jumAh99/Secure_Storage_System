<?php
    if(isset($_SESSION["userID"])){
        REQUIRE_ONCE 'php/connect-to-database.php';

        $sessionUserID = $_SESSION["userID"]; 
        $sql = "SELECT * FROM tb_file_details WHERE userID='$sessionUserID'"; 
        $run = mysqli_query($connectionObject, $sql);

        while($rows = mysqli_fetch_assoc($run)){
            ?>
                <tr>
                    <td maxLength="10" data-label="FileName: "><?php  echo $rows["fileName"]?></a></td>
                    <td data-label="FileSize: "><?php echo $rows["fileSize"] . " MB"?></td>
                    <?php
                        //GET THE PHP SCRIPT
                        REQUIRE_ONCE 'php/file-sharing-util.php';
                        //GET ALL THE USER INFORMATION BASED ON THE FILE 
                        $fileOwner = getUserInformation($connectionObject, $rows["userID"]); 
                        //GET THE CONDITION DEPENDING WHO IS THE OWNER OF THE FILE
                        if($fileOwner["userUID"] == $_SESSION["userUID"]){
                            ?>
                                <td data-label="Owner: ">You</td>
                            <?php
                        }else{
                            ?>
                                <td data-label="Owner: "> <?php echo $fileOwner["userUID"] ?></td> 
                            <?php
                        }
                    ?>
                    <td data-label="UploadDate: "><?php echo $rows["uploadDate"]?></td>
                    <td data-label="UploadTime: "><?php echo $rows["uploadTime"]?></td>
                    <td class="buttons">
                        <a class="options" href="php/delete-file.php?file=<?php echo $rows['fileName']?>">Delete</a><a class="options" href="share?file=
                        <?php echo $rows['fileName']?>">Share</a><a class="options" href="php/fileDownload.php?file=<?php echo $rows['fileName']?>">Download</a>
                    </td>
                </tr>
            <?php 
        }
    }
?>