<?php REQUIRE_ONCE 'template-html-components/header.php'?>
<body>
    <?php REQUIRE_ONCE 'template-html-components/navigation-bar.php'?>

    <section>
        <div class="container">
            <h1 class="heading">Share File: <p><?php echo $_GET['file']?></p></h1>
            <!-- FILE INFORMATION -->
            <table class="table">
                <thead>
                    <!-- TABLE TITLERS -->
                    <tr>
                        <th width="120">Username</th>
                        <th width="120">Option</th>
                    </tr>
                </thead>
                <tbody>
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
                            //GET THE FILE NAME FROM THE URL
                            $filename = $_GET['file']; 
                            //GET THE UPLOAD DATE FROM THE URL
                            $uploadDate = $_GET['uploadDate']; 
                            //GET THE UPLOAD TIME FROM THE URL
                            $uploadTime = $_GET['uploadTime']; 
                            //GET THE FILE SIZE FROM THE URL
                            $fileSize = $_GET['fileSize'];

                            //SHOW ALL THE USERS PRESENT THE DATABASE AND LOOP THEM
                            while($rows = mysqli_fetch_assoc($run)){
                                ?>
                                    <tr>
                                        <!-- SHOW USER NAME -->
                                        <td data-label="Share with: "><?php echo $rows["userUID"]?></td>
                                        <!-- SHOW THE OPTION BUTTON -->
                                        <td class="buttons">
                                        <!-- LINK THE PRESS TO THE SHARE PHP SCRIP WHERE THE SHARE FUCNTIONALITY WILL OCCUR, PASSING THE APPROPIATE VALUES REQUIRED -->
                                        <a class="options" href="php/share-file.php?file=<?php echo $filename?>&uploadDate=<?php echo $uploadDate?>&uploadTime=<?php echo $uploadTime?>&fileSize=<?php echo $fileSize?>&receiver=<?php echo $rows["userUID"]?>">SELECT</a></td>
                                    </tr>
                                <?php 
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>