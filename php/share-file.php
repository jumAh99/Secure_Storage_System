<?php

if(isset($_GET['file'], $_GET['receiver'])){
    // GET THE RECIVER NAME FROM THE URL
    $receiverName = $_GET['receiver']; 
    // GET THE FILE NAME FROM THE URL
    $fileName = $_GET['file'];

    
}else{
    //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
    header("location: ../form?error=cannot_find_file");
}