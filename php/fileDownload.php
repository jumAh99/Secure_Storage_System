<?php
//START THE SESSION 
session_start();//START THE SESSION 
REQUIRE_ONCE 'file-upload-util.php'; 
//IF THE FILE NAME IN THE URL IS NOT EMPTY
if(!empty($_GET['file'])){
    //ASSIGN THE FILE NAME TO A VARIABLE THAT WILL BE USED TO FETCH IT FROM LOCAL SYSTEM
    $fileName = basename($_GET['file']);
    //GET THE PATCH OF THE FILE INSTALLED IN THE LOCAL SYSTEM
    $encryptedDestinationPathUser = __DIR__ . "/../uploads/" . $_SESSION["userUID"] . "/encrypted/" .  $fileName; 
    $decryptedDestinationPathUser = __DIR__ . "/../uploads/" . $_SESSION["userUID"] .  $fileName; 
    //IF THE FILE IS THERE 
    if(!empty($encryptedDestinationPathUser) && file_exists($encryptedDestinationPathUser)){
        //GET AND DEFINE THE FILE HEADER 
        decryptFile($encryptedDestinationPathUser, $decryptedDestinationPathUser, $_SESSION["userID"] . "_key"); 
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
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