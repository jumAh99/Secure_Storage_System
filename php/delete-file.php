<?php
//START THE SESSION 
session_start();//START THE SESSION 
REQUIRE_ONCE 'file-upload-util.php'; 
REQUIRE_ONCE 'connect-to-database.php'; 
//CHECK WEATHER THE FILE IS SELECTED CORRECTLY AND ITS VALID
if(!empty($_GET['file'])){
    //GET THE FILE AND STORE IT INTO A LOCAL VARIABLE
    $fileName = basename($_GET['file']);
    // GET THE USER ID FROPM THE CURRENT SESSION
    $userID = $_SESSION["userID"];
    // GET THE PATH OF THE FILE PRESENT IN THE SERVER
    $encryptedDestinationPathUser = __DIR__ . "/../uploads/" . $_SESSION["userUID"] . "/encrypted/" .  $fileName; 
    //CALL THE FUNCTION TO DELETE THE FILE
    deleteFile($connectionObject, $fileName, $userID, $encryptedDestinationPathUser); 

    //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
    header("location: ../form?error=fileDeleted");
    exit(); 

}else{
    //SEND AN ERROR MESSAGE TO THE USER
    header("location: ../form.php?error=file_not_found");
    exit();  
}
