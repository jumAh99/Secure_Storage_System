<?php
//VARIABALE FOR THE DB SERVER NAME
$serverHostName="localhost"; 
//USING XAMPP UN IS ALWAYS ROOT
$serverUserName = "root";
//NO PASSWORD IF LOCAL
$serverPassword=""; 
//NAME FOR THE DATABASE
$serverDatabseName = "file_storage_database"; 

//CONNECT TO DATABASE WHICH WILL RETEUN AN OBJ RAPRESENTING THE DATABASE CONNECTION
$connectionObject = mysqli_connect(hostname:$serverHostName, username:$serverUserName, password:$serverPassword, database:$serverDatabseName); 

//MAKE SURE THAT THE CONNECTION HAS BEEN SUCCESSFUL BY CHECKING WEATHER THE CODE WAS 0
if(mysqli_connect_errno()){
    //STOP THE SCRIPT AND PRINT A MESSAGE 
    die("Ops, connection error has occured!");
}
//THIS FUNCTION NEEDS TO CHECK WEATHER THE FILES ARE CURRENTLY PRESENT
function makeSureDirectoriesArePresent($nameDirectory){
    //CREATE THYE STORAGE FOLDER WHEN THE USER REGISTERS 
    if(!is_dir(__DIR__ . "/../uploads/" . $nameDirectory . "/encrypted/")){
        mkdir(__DIR__ . "/../uploads/" . $nameDirectory, 0777, true); 
        mkdir(__DIR__ . "/../uploads/" . $nameDirectory. "/encrypted", 0777, true);
    }
}