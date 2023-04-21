<?php
//START THE SESSION 
session_start();//START THE SESSION 

//IMPORT THE PHP SHARING SCRIPT
REQUIRE_ONCE 'file-upload-util.php'; 
REQUIRE_ONCE 'connect-to-database.php'; 
REQUIRE_ONCE 'friend-request-util.php';
REQUIRE_ONCE 'file-sharing-util.php';

// CHECK IF THE RECEIVER INFORMATION IS PRESENT
if(isset($_GET['receiver'])){
    // GET THE RECIVER NAME FROM THE URL
    $receiverUID = $_GET['receiver']; 
    // GET THE REQUEST STATUS
    $isRequestStatus = $_GET['status']; 
    //GET THE SENDER NAME 
    $senderUID = $_GET['sender'];

    // IF THE USER SEND THE USER REQUEST 
    if($isRequestStatus == 'SENT'){
        // CHECK IF THE FRIEND REQUEST IS ALRREDY PRESENT IN THE DATABSE 
        if(friendRequestAlredyExists($connectionObject, $senderUID, $receiverUID) == false){
            // INSERT THE REQUEST IN THE DATABASE 
            createFriendRequest($connectionObject, $senderUID, $receiverUID, false); 

        }else{
            //IF UPLOAD WAS SUCECSSFUL THEN PRINT IT 
            header("location: ../form?error=friendRequestAlreadySent");
            exit(); 
        }
    }
    // IF THE USER ACCEPTED THE REQUEST
    if($isRequestStatus == 'ACCEPTED'){
        // SET THE IS FRIEND VALUE TO BE TRUE THUS ACCEPTING THE REQUEST
        updateRequestStatus($connectionObject, $senderUID, $receiverUID, true); 
        //IF UPLOAD WAS SUCECSSFUL THEN PRINT IT 
        header("location: ../friends");
        exit(); 
    }
    // IF THE USER WANTS TO REMOVE A FRIEND
    if($isRequestStatus == 'REMOVE'){
        // CALL THE FUNCTION TO REMOVE THE FRIEND FROM DATABASE
        removeFriend($connectionObject, $senderUID, $receiverUID); 
        //IF UPLOAD WAS SUCECSSFUL THEN PRINT IT 
        header("location: ../friends");
        exit(); 
    }
    // IF THE USER WANTS TO CANCEL THE REQUEST SENT
    if($isRequestStatus == 'CANCEL'){
        // CALL THE FUNCTION TO REMOVE THE FRIEND FROM DATABASE
        removeFriend($connectionObject, $senderUID, $receiverUID); 
        //IF UPLOAD WAS SUCECSSFUL THEN PRINT IT 
        header("location: ../friends");
        exit(); 
    }
    //IF UPLOAD WAS SUCECSSFUL THEN PRINT IT 
    header("location: ../friends");
    exit(); 
}