<?php
//START THE SESSION 
session_start();//START THE SESSION 
REQUIRE_ONCE 'file-upload-util.php'; 
REQUIRE_ONCE 'file-sharing-util.php';
REQUIRE_ONCE 'connect-to-database.php';
//IF THE FILE NAME IN THE URL IS NOT EMPTY
if(!empty($_GET['file'])){
    //ASSIGN THE FILE NAME TO A VARIABLE THAT WILL BE USED TO FETCH IT FROM LOCAL SYSTEM
    $fileName = basename($_GET['file']);
    
    //GET THE CURRENT INFORMATION OF THE USER
    $currentFileInfo = getFileInformationByName($connectionObject, $fileName, $_SESSION["userID"]); 
    $getInfoOfTheOwnerOfTheFile = getUserInformationByUID($connectionObject, $currentFileInfo["Owner"]); 

    //GET THE PATCH OF THE FILE INSTALLED IN THE LOCAL SYSTEM
    $encryptedDestinationPathUser = __DIR__ . "/../uploads/" . $_SESSION["userUID"] . "/encrypted/" .  $fileName; 
    $decryptedDestinationPathUser = __DIR__ . "/../uploads/" . $_SESSION["userUID"] .  $fileName; 
    //IF THE FILE IS THERE 
    if(!empty($encryptedDestinationPathUser) && file_exists($encryptedDestinationPathUser)){
        //IF THE CURRENT USER IS THE OWNER OF THE FILE 
        if($currentFileInfo["Owner"] == $_SESSION["userUID"]){
            //GET AND DEFINE THE FILE HEADER 
            decryptFile($encryptedDestinationPathUser, $decryptedDestinationPathUser, $_SESSION["userID"] . "_key"); 
        }else{
            //IF THE OWNER OF THE FILE IS NOT THE CURRENT USER
            decryptFile($encryptedDestinationPathUser, $decryptedDestinationPathUser, $getInfoOfTheOwnerOfTheFile["userID"] . "_key"); 
        }
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application");
        header("Content-Transfer-Encoding: binary");
        //READ THE FILE 
        readfile($decryptedDestinationPathUser);
        unlink($decryptedDestinationPathUser); 
        exit;
    }else{
        //SEND AN ERROR MESSAGE TO THE USER
        header("location: ../form.php?error=file_not_found");
        exit(); 
    }
}