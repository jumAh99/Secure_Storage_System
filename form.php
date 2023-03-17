<?php REQUIRE_ONCE 'template-util/header.php'?>
<body>
    <!-- INCLUDE THE NAVIGATION BAR -->
    <?php REQUIRE_ONCE 'template-util/navigation-bar.php'?>

    <div class="container">
        <?php
            //IF THE SESSION IS SET THEN THE PAGE WILL SHOW THE REQUIRED FUNCTIONALITIES
            if(isset($_SESSION["userID"])){
                REQUIRE_ONCE "template-util/form-session-is-set.php"; 
            }
        ?>
    </div>
</body>
</html>