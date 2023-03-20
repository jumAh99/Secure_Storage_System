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
    <!-- ALLOW THE USER TO SEE FILE INFORMATION -->
    <?php REQUIRE_ONCE 'responsive-table.php' ?>
</section>