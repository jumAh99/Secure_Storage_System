<?php
//START THE SESSION 
session_start();//START THE SESSION 
//GET NECESSARY SCRIPT FILES
REQUIRE_ONCE 'file-upload-util.php'; 
REQUIRE_ONCE 'connect-to-database.php'; 
REQUIRE_ONCE 'file-sharing-util.php'; 
//CHECK WEATHER THE FILE IS SELECTED CORRECTLY AND ITS VALID
if(!empty($_GET['file'])){
    //EXTRACT THE FILE INFORMATION FROM THE URL
    $fileName = basename($_GET['file']);
    //GET THE USER ID FROM THE CURRENT SESSION
    $userID = $_SESSION["userID"];
    //GET THE FILE INFORMATION FROM THE DATABASE USING THE USER ID
    $currentFileInfo = getFileInformationByName($connectionObject, $fileName, $userID);
    //GET THE USER INFROMATION FROM THE FILE USING THE USER ID
    $getCurrentReceiverFileInfo = getUserInformationByID($connectionObject, $currentFileInfo["userID"]); 
    //GET THE CURRENT OWNER OF THE FILE
    $fileOwner = $currentFileInfo["Owner"]; 
    //GET THE SHARING RECORDS FORM THE SHARE TABLE
    $currentShareFileInfo = getCurrentFileValue($connectionObject, $fileName, $fileOwner, $getCurrentReceiverFileInfo["userUID"]); 
    //GET THE PATH OF THE OWNER FILE LAOCATION
    $ownerEncryptedDestinationPathUser = __DIR__ . "/../uploads/" . $_SESSION["userUID"] . "/encrypted/" .  $fileName;  
    //GET THE CORRECT FILR FILE NAME IMPLEMENTATION 
    $fileNameSensor = $_SESSION['userUID'] ."-". $fileName; 
    //GET THE RECEIVER OF THE CURRENT FILE INFORMATION 
    $fileReceiver = $currentShareFileInfo["receiverUID"];
    //IF THE USER IS THE OWNER OF THE FILE THEN DELETE ALL THE FILES WHAT WERE SHARED ELSE JUST THE CURRENT FILE AND THE SHARE RECORD 
    if($_SESSION["userUID"] == $currentShareFileInfo["senderUID"]){
        //DELETE ALL THE SHARED RECORD ASSOCIATED WITH THE FILE
        deleteSharedRecord($connectionObject, $fileNameSensor, $_SESSION['userUID']); 
        //DELETE THE DILES PRESENT IN THE RECEIVER DIRECTORIES
        deleteFilesDetailsOfTheOwner($connectionObject, $fileNameSensor, $fileOwner);  
    }else if($_SESSION["userUID"] == $currentShareFileInfo["receiverUID"]){
        //JUST DELETE THE FILE RECORD ASSOCIATED WITH THE RECEIVVER
        deleteSingleSharedRecord($connectionObject, $fileName, $_SESSION['userUID']);
    }
    //DELETE THE FILE THAT IS PRESENT IN THIS DIRECTORY
    deleteFile($connectionObject, $fileName, $userID, $ownerEncryptedDestinationPathUser); 
    //SEND BACK THE USER TO FORM PAGE
    header("location: ../form?error=fileDeleted");
    exit(); 

}else{
    //SEND AN ERROR MESSAGE TO THE USER
    header("location: ../form.php?error=file_not_found");
    exit();  
}
