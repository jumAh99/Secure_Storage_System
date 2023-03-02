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
}else{
    //IF THE CONNECTION WAS SUCCESSFUL
    echo "Connection Estabilished!"; 
}