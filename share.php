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
    <link rel="stylesheet" href="css/share-style.css">
    <title>Share</title>
</head>
<body>
    <?php REQUIRE_ONCE 'template-html-components/navigation-bar.php'?>

    <section>
        <!-- FILE INFORMATION -->
        <table bgcolor="#cbcbcb" width="700">
            <tr bgcolor="#92a8d1">
                <th width="120">Username</th>
                <th width="120">Option</th>
            </tr>

            <?php
                if(isset($_SESSION["userID"])){
                    REQUIRE_ONCE 'php/connect-to-database.php';

                    $sessionUserID = $_SESSION["userUID"]; 
                    $sql = "SELECT * FROM tb_user_login_info WHERE userUID <> '$sessionUserID'"; 
                    $run = mysqli_query($connectionObject, $sql);
                    $filename = $_GET['file']; 

                    while($rows = mysqli_fetch_assoc($run)){
                        ?>
                            <tr bgcolor="#eedac2" height="50" align="center">
                                <td width="120"><?php echo $rows["userUID"]?></td>
                                <td width="120">
                                <a class="option" href="php/share-file.php?file=<?php echo $filename?>&receiver=<?php echo $rows["userUID"]?>">SELECT</a>
                            </td>
                            </tr>
                        <?php 
                    }

                    
                }
            ?>
        </table>
    </section>
</body>
</html>