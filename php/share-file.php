<?php
//START THE SESSION 
session_start();//START THE SESSION 

//IMPORT THE PHP SHARING SCRIPT
REQUIRE_ONCE 'file-upload-util.php'; 
REQUIRE_ONCE 'connect-to-database.php'; 
REQUIRE_ONCE 'file-sharing-util.php';

if(isset($_GET['file'], $_GET['uploadDate'], $_GET['uploadTime'], $_GET['receiver'])){
    // GET THE RECIVER NAME FROM THE URL
    $receiverUID = $_GET['receiver'];
    $getReceiverUID = getUserInformationByUID($connectionObject, $receiverUID);  
    // GET THE FILE NAME FROM THE URL
    $fileName = $_GET['file'];
    $currentFileInformation = getFileInformationByName($connectionObject, $fileName, $_SESSION["userID"]); 
    //GET THE SENDER NAME 
    $senderUID = $_SESSION["userUID"];



    //GET THE SHARE INFORMATIONS 
    $fileID = $currentFileInformation["fileID"]; 
    $receiverID = $getReceiverUID["userID"]; 
    $senderID = $_SESSION["userID"];
    
    
    $senderFileLocation = __DIR__ . "/../uploads/" . $senderUID . "/encrypted/" . $fileName; 
    $receiverFileLocation = __DIR__ . "/../uploads/" . $receiverUID ."/encrypted/" . $senderUID . $fileName;
    
    copy($senderFileLocation, $receiverFileLocation); 
    //SAVE THE NEW FILE
    uploadFileSQLRecord($connectionObject, $getReceiverUID["userID"], $senderUID . $fileName,  $currentFileInformation["uploadDate"] , $currentFileInformation["fileSize"],  $currentFileInformation["uploadTime"], $senderUID); 

    //SAVE THE SHARING INFORMATION 
    insertShareTransaction($connectionObject, $fileName, $senderUID, $receiverUID); 

    //IF UPLOAD WAS SUCECSSFUL THEN PRINT IT 
    header("location: ../form?error=none");
    exit(); 
    
}else{
    //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
    header("location: ../form?error=cannot_find_file");
}