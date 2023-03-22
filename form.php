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
                echo "<div class=\"welcome-message\"> <h1>Welcome to my Secure Storage, this project has been undergoing development for a long time,  
                 has been entirely programmed by myself with the goal to offer anyone,with a reliable way to store their precious files. Note that the application is still in it's infancy and improvment and enchancements
                 are undergoing everyday. I would really appriciate it if you gave it it a try and <a href=\"login\">logged</a> in to give it a try, 
                 any feedbacks that you might offer is appricated.
                 Thank you for your time and I hope you have a nice experience with my creation!</h1></div>";
            }
        ?>
    </div>
</body>
</html>