<?php
    // IF THE USERNAME IS SET 
    if(isset($_SESSION["userID"])){
        //GET THE REQUIRED PHP SCRIPTS
        REQUIRE_ONCE 'php/connect-to-database.php';

        //STORE THE USER ID INTO A LOCAL VARIABLE
        $sessionUserID = $_SESSION["userUID"]; 
        //CREATE A SQL QUERY WHERE YOU FETCH ALL THE USERS THAT ARE NOT THE CURRENT USER
        $sql = "SELECT * FROM tb_user_login_info WHERE userUID <> '$sessionUserID'"; 
        //EXECUTE THE SQL QUERY
        $run = mysqli_query($connectionObject, $sql);

        //SHOW ALL THE USERS PRESENT THE DATABASE AND LOOP THEM
        while($rows = mysqli_fetch_assoc($run)){
            ?>
                <tr>
                    <!-- SHOW USER NAME -->
                    <td data-label="Share with: "><?php echo $rows["userUID"]?></td>
                    <!-- SHOW THE OPTION BUTTON -->
                    <td class="buttons">
                    <!-- LINK THE PRESS TO THE SHARE PHP SCRIP WHERE THE SHARE FUCNTIONALITY WILL OCCUR, PASSING THE APPROPIATE VALUES REQUIRED -->
                    <a class="options" href="php/friend-request.php?receiver=<?php echo $rows["userUID"]?>">Add Friend</a></td>
                </tr>
            <?php 
        }
    }
?>