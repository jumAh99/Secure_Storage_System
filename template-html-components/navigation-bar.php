<link rel="stylesheet" href="css/navigation-style.css">
<!-- NAVIGATION COMPONENT -->
<header class="main-header">
    <!-- ECLARE THAT THIS THE NAVIGATIONN PORTION OF THE WEBSITE -->
    <nav class="navigation-bar">
        <!-- CREATE A NAVIGATION LIST WITH OPTIONS -->
        <ul>
            <li><!-- ALLOW THE USER TO VISIT THE FORM PAGE --><a href="form">Home</a></li>
            <?php
                if(isset($_SESSION["userID"])){
                    ?>
                        <li><!-- ALLOW THE USER TO ACCESS THE FRIEND PAGE --><a href="friends">Friends</a></li>
                        <li><!-- ALLOW THE USER TO LOG OUT --><a href="php/logout-user.php">Log Out</a></li>
                    <?php
                }else{
                    ?>
                        <li><!-- ALLOW THE USER TO GO INTO THE SHARE PAGE --><a href="login">Log In</a></li>
                    <?php
                }
            ?>
        </ul>
    </nav>
</header>