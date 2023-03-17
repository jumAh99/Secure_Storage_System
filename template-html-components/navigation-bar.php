<link rel="stylesheet" href="css/navigation-style.css">
<!-- NAVIGATION COMPONENT -->
<header class="main-header">
    <!-- CONTAINER FOR LOGO -->
    <div class="header-main-logo">
        SECURE STORAGE
    </div>

    <!-- ECLARE THAT THIS THE NAVIGATIONN PORTION OF THE WEBSITE -->
    <nav class="navigation-bar">
        <!-- CREATE A NAVIGATION LIST WITH OPTIONS -->
        <ul>
            <li><!-- ALLOW THE USER TO VISIT THE FORM PAGE --><a href="form">Home</a></li>
            <?php
                if(isset($_SESSION["userID"])){
                    ?>
                        <li><!-- ALLOW THE USER TO LOG OUT --><a href="php/logout-user.php">Log Out</a></li>
                    <?php
                }else{
                    ?>
                        <li><!-- ALLOW THE USER TO LOG OUT --><a href="signup">Register</a></li>
                        <li><!-- ALLOW THE USER TO GO INTO THE SHARE PAGE --><a href="login">LogIn</a></li>
                    <?php
                }
            ?>
        </ul>
    </nav>
</header>