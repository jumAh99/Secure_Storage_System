<?php REQUIRE_ONCE 'template-html-components/header.php'?>
<body>
    <!-- INCLUDE THE NAVIGATION BAR -->
    <?php REQUIRE_ONCE 'template-html-components/navigation-bar.php'?>

    <div class="container">
        <?php
            //IF THE SESSION IS SET THEN THE PAGE WILL SHOW THE REQUIRED FUNCTIONALITIES
            if(isset($_SESSION["userID"])){
                REQUIRE_ONCE "template-html-components/form-session-is-set.php"; 
            }else{
                // JUST A FRIEDNLY WELCOME MESSAGE 
                REQUIRE_ONCE "template-html-components/welcome-message.php"; 
            }
        ?>
    </div>
</body>
</html>