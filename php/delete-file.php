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
    $getCurrentReceiverFileInfo = getUserInformationByID($connectionObject, $currentFileInfo["userID"]); 
    //GET THE RECIVER INFORMATION IF NOT OWNER 
    //EXTRACT THE NECESSARY INFORMATION INTO LOCAL VARIABLES
    $fileOwner = $currentFileInfo["Owner"]; 
    //GET THE VALUE OF THE FILE BY OWNER 
    $currentShareFileInfo = getCurrentFileValue($connectionObject, $fileName, $fileOwner, $getCurrentReceiverFileInfo["userUID"]); 
    // GET THE PATH OF THE FILE PRESENT IN THE SERVER
    $ownerEncryptedDestinationPathUser = __DIR__ . "/../uploads/" . $_SESSION["userUID"] . "/encrypted/" .  $fileName;  
    $fileNameSensor = $_SESSION['userUID'] ."-". $fileName; 
    $fileReceiver = $currentShareFileInfo["receiverUID"]; 
    //IF THE USER IS THE OWNER THEN DO THE FOLLOWING
    if($_SESSION["userUID"] == $currentShareFileInfo["senderUID"]){
        deleteSharedRecord($connectionObject, $fileNameSensor, $_SESSION['userUID']); 
        deleteFilesDetailsOfTheOwner($connectionObject, $fileNameSensor, $fileOwner);  
    }else if($_SESSION["userUID"] == $currentShareFileInfo["receiverUID"]){
        //DELETE THE SHARE RECORD FOROM THE TABLE
        deleteSingleSharedRecord($connectionObject, $fileName, $_SESSION['userUID']);
    }
    //CALL THE FUNCTION TO DELETE THE FILE
    deleteFile($connectionObject, $fileName, $userID, $ownerEncryptedDestinationPathUser); 
    //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
    header("location: ../form?error=fileDeleted");
    header("location: ../form?error=$fileName&receiver=$fileReceiver");
    exit(); 

}else{
    //SEND AN ERROR MESSAGE TO THE USER
    header("location: ../form.php?error=file_not_found");
    exit();  
}
