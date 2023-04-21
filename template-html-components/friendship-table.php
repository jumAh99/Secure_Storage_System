<?php
    // IF THE USERNAME IS SET 
    if(isset($_SESSION["userID"])){
        //GET THE REQUIRED PHP SCRIPTS
        REQUIRE_ONCE 'php/connect-to-database.php';
        REQUIRE_ONCE 'php/friend-request-util.php';
        REQUIRE_ONCE 'php/file-sharing-util.php';

        //STORE THE USER ID INTO A LOCAL VARIABLE
        $sessionUserUID = $_SESSION["userUID"]; 
        //CREATE A SQL QUERY WHERE YOU FETCH ALL THE USERS THAT ARE NOT THE CURRENT USER
        $sql = "SELECT * FROM tb_user_login_info WHERE userUID <> '$sessionUserUID'"; 
        //EXECUTE THE SQL QUERY
        $run = mysqli_query($connectionObject, $sql);
        //SHOW ALL THE USERS PRESENT THE DATABASE AND LOOP THEM
        while($rows = mysqli_fetch_assoc($run)){
            // GET ALL DATA IN THE FRIEND TABLE 
            $friendTableInformation = getFriendInformationByUID($connectionObject, $sessionUserUID, $rows["userUID"]); 
            ?>
            <tr>
                <!-- SHOW USER NAME -->
                <td data-label="Share with: "><?php echo $rows["userUID"]?></td>
                <!-- SHOW THE OPTION BUTTON -->
                <td class="buttons">
            <?php
                // IF THE USER HAS NOT SENT A FRIEND REQUEST 
                if(friendRequestAlredyExists($connectionObject, $sessionUserUID, $rows["userUID"]) == false){
                    // IF THE USER HAS A FRIEND REQUEST AND HAS TO ACCEPTED IT
                    if(!empty($friendTableInformation) && $friendTableInformation['receiverUID'] == $sessionUserUID && $friendTableInformation['senderUID'] == $rows['userUID'] && $friendTableInformation['isFriend'] == false){
                        ?>
                        <!-- LINK THE PRESS TO THE SHARE PHP SCRIP WHERE THE SHARE FUCNTIONALITY WILL OCCUR, PASSING THE APPROPIATE VALUES REQUIRED -->
                        <p>YOU HAVE A NEW SHARE REQUEST!</p>
                        <!-- LINK THE PRESS TO THE SHARE PHP SCRIP WHERE THE SHARE FUCNTIONALITY WILL OCCUR, PASSING THE APPROPIATE VALUES REQUIRED -->
                        <a class="options" href="php/friend-request.php?status=ACCEPTED&receiver=<?php echo $sessionUserUID?>&sender=<?php echo $rows["userUID"]?>">Accept Request!</a></td>
                        <?php  
                    // IF A USER HAS NOT SENT ANY FRIEND REQUESTS
                    }else if(!empty($friendTableInformation) && $friendTableInformation['receiverUID'] == $sessionUserUID && $friendTableInformation['senderUID'] == $rows['userUID'] && $friendTableInformation['isFriend'] == true){
                        ?>
                        <!-- LINK THE PRESS TO THE SHARE PHP SCRIP WHERE THE SHARE FUCNTIONALITY WILL OCCUR, PASSING THE APPROPIATE VALUES REQUIRED -->
                        <p>YOU ARE SARING FILES WITH THIS USER</p>
                        <!-- LINK THE PRESS TO THE SHARE PHP SCRIP WHERE THE SHARE FUCNTIONALITY WILL OCCUR, PASSING THE APPROPIATE VALUES REQUIRED -->
                        <a class="options" href="php/friend-request.php?status=REMOVE&receiver=<?php echo $sessionUserUID?>&sender=<?php echo $rows["userUID"]?>">Stop Sharing</a></td>
                        <?php  
                    }else{
                        ?>
                        <!-- LINK THE PRESS TO THE SHARE PHP SCRIP WHERE THE SHARE FUCNTIONALITY WILL OCCUR, PASSING THE APPROPIATE VALUES REQUIRED -->
                        <a class="options" href="php/friend-request.php?status=SENT&receiver=<?php echo $rows["userUID"]?>&sender=<?php echo $sessionUserUID ?>">Request Sharing</a></td>
                        <?php  
                    }
                }else{
                    ?>
                    <!-- LINK THE PRESS TO THE SHARE PHP SCRIP WHERE THE SHARE FUCNTIONALITY WILL OCCUR, PASSING THE APPROPIATE VALUES REQUIRED -->
                    <p> YOU HAVE REQUESTED TO SHARE</p>
                    <!-- LINK THE PRESS TO THE SHARE PHP SCRIP WHERE THE SHARE FUCNTIONALITY WILL OCCUR, PASSING THE APPROPIATE VALUES REQUIRED -->
                    <a class="options" href="php/friend-request.php?status=CANCEL&receiver=<?php echo $rows["userUID"]?>&sender=<?php echo $sessionUserUID ?>">Requesting...</a></td>
                    <?php
                }
            ?>
            </tr>
<?php
        }
    }
?>