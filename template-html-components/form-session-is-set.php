<!-- MAIN FILE UPLOAD UTIL -->
<!-- MAIN FORM WHERE THE USER WILL UPLOAD FILES -->
<section class="main-content">
    <div class="session_information">
        <label for="">Logged as:  <p><?php echo $_SESSION["userUID"]?></p></label>
    </div>
    <!-- ALLOW THE USER TO UPLOAD FILES -->
    <?php REQUIRE_ONCE 'file-drop-box.php' ?>
    <!-- MAKE SURE THAT THE USER UNDERSTAND THE ERROR -->
    <?php REQUIRE_ONCE 'form-error-messages.php' ?>

    <?php
        // GET THE SCRIPT REQUIRED 
        REQUIRE_ONCE 'php/file-sharing-util.php'; 
        REQUIRE_ONCE 'php/connect-to-database.php'; 
        // GET THE CURRENT FILES PRESENT IN THE DATABSE
        $filePresentInDatabase = getFileByUserID($connectionObject, $_SESSION["userID"]); 
        //IF THE USER HAS MORE THAN ONE FILE
        if($filePresentInDatabase){
            // SHOW TABLE WITH THE FILES
            REQUIRE_ONCE 'responsive-table.php';
        }else{
            echo "<p>No files to show.</p>";
        }
    ?>
</section>