<?php
//START THE SESSION 
session_start();//START THE SESSION 

//IMPORT THE PHP SHARING SCRIPT
REQUIRE_ONCE 'file-upload-util.php'; 
REQUIRE_ONCE 'connect-to-database.php'; 
REQUIRE_ONCE 'file-sharing-util.php';

if(isset($_GET['file'], $_GET['uploadDate'], $_GET['uploadTime'], $_GET['receiver'])){
    // GET THE RECIVER NAME FROM THE URL
    $receiverName = $_GET['receiver'];
    $getReceiverUID = getUserInformationByUID($connectionObject, $receiverName);  
    // GET THE FILE NAME FROM THE URL
    $fileName = $_GET['file'];
    $uploadDate = $_GET['uploadDate'];
    $uploadTime = $_GET['uploadTime'];
    $fileSize = $_GET['fileSize'];
    //GET THE SENDER NAME 
    $senderName = $_SESSION["userUID"];
    $senderFileLocation = __DIR__ . "/../uploads/" . $senderName . "/encrypted/" . $fileName; 
    $receiverFileLocation = __DIR__ . "/../uploads/" . $receiverName ."/encrypted/" . $senderName . $fileName;
    
    copy($senderFileLocation, $receiverFileLocation); 
    //SAVE THE NEW FILE
    uploadFileSQLRecord($connectionObject, $getReceiverUID["userID"], $senderName . $fileName, $uploadDate , $fileSize, $uploadTime, $senderName); 

    //SAVE THE SHARING INFORMATION 
    insertShareTransaction($connectionObject, $receiverName, $senderName, $fileName); 

    //IF UPLOAD WAS SUCECSSFUL THEN PRINT IT 
    header("location: ../form?error=none");
    exit(); 
    
}else{
    //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
    header("location: ../form?error=cannot_find_file");
}