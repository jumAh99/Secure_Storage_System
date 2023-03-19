<?php
//START THE SESSION 
session_start();//START THE SESSION 
//GET NECESSARY SCRIPT FILES
REQUIRE_ONCE 'file-upload-util.php'; 
REQUIRE_ONCE 'connect-to-database.php'; 
REQUIRE_ONCE 'file-sharing-util.php'; 
//CHECK WEATHER THE FILE IS SELECTED CORRECTLY AND ITS VALID
if(!empty($_GET['file'])){
    //GET THE FILE AND STORE IT INTO A LOCAL VARIABLE
    $fileName = basename($_GET['file']);
    // GET THE USER ID FROPM THE CURRENT SESSION
    $userID = $_SESSION["userID"];
    //DELETE THE SHARED RECORD 
    $currentFileInfo = getFileInformationByName($connectionObject, $fileName, $userID); 
    //EXTRACT THE NECESSARY INFORMATION INTO LOCAL VARIABLES
    $fileOwner = $currentFileInfo["Owner"]; 
    //GET THE SHARING INFORMATION FROM THE TABLE
    $currentShareFileInfo = getFileSharingInfoByOwner($connectionObject, $fileName, $fileOwner); 
    // GET THE PATH OF THE FILE PRESENT IN THE SERVER
    $ownerEncryptedDestinationPathUser = __DIR__ . "/../uploads/" . $_SESSION["userUID"] . "/encrypted/" .  $fileName; 
    $receiverEncryptedDestinationPathUser = __DIR__ . "/../uploads/" . $currentShareFileInfo["receiverUID"] . "/encrypted/" . $_SESSION["userUID"] .  $fileName; 

    $getReceiverInformation = getUserInformationByUID($connectionObject, $currentShareFileInfo["receiverUID"]); 
    //DELETE THE SHARE RECORD FOROM THE TABLE
    if($_SESSION["userUID"] != $currentShareFileInfo["senderUID"]){
        deleteSingleSharedRecord($connectionObject, $currentShareFileInfo["fileName"], $_SESSION["userUID"]); 
    }else{
        deleteSharedRecord($connectionObject, $fileName,$currentShareFileInfo["senderUID"]); 
        deleteFilesDetailsOfTheOwner($connectionObject, $_SESSION["userUID"] .  $fileName, $fileOwner); 
    }
    //CALL THE FUNCTION TO DELETE THE FILE
    deleteFile($connectionObject, $fileName, $userID, $ownerEncryptedDestinationPathUser); 
    //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
    header("location: ../form?error=fileDeleted");
    exit(); 

}else{
    //SEND AN ERROR MESSAGE TO THE USER
    header("location: ../form.php?error=file_not_found");
    exit();  
}
