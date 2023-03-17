<?php REQUIRE_ONCE 'template-html-components/header.php'?>
<body>
    <?php REQUIRE_ONCE 'template-html-components/navigation-bar.php'?>

    <section>
        <div class="container">
            <h1 class="heading">Share File: <p><?php echo $_GET['file']?></p></h1>
            <!-- FILE INFORMATION -->
            <table class="table">
                <thead>
                    <tr>
                        <th width="120">Username</th>
                        <th width="120">Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($_SESSION["userID"])){
                            REQUIRE_ONCE 'php/connect-to-database.php';

                            $sessionUserID = $_SESSION["userUID"]; 
                            $sql = "SELECT * FROM tb_user_login_info WHERE userUID <> '$sessionUserID'"; 
                            $run = mysqli_query($connectionObject, $sql);
                            $filename = $_GET['file']; 
                            $uploadDate = $_GET['uploadDate']; 
                            $uploadTime = $_GET['uploadTime']; 
                            $fileSize = $_GET['fileSize'];

                            while($rows = mysqli_fetch_assoc($run)){
                                ?>
                                    <tr>
                                        <td data-label="Share with: "><?php echo $rows["userUID"]?></td>
                                        <td class="buttons">
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