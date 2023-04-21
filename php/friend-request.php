<?php
//START THE SESSION 
session_start();//START THE SESSION 

//IMPORT THE PHP SHARING SCRIPT
REQUIRE_ONCE 'file-upload-util.php'; 
REQUIRE_ONCE 'connect-to-database.php'; 
REQUIRE_ONCE 'friend-request-util.php';

// GET THE RECIVER NAME FROM THE URL
$receiverUID = $_GET['receiver'];
$getReceiverUID = getUserInformationByUID($connectionObject, $receiverUID);  

//GET THE SENDER NAME 
$senderUID = $_SESSION["userUID"];