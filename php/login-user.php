<?php
//DID THE USER SUBMIT THE FORM
if(isset($_POST["submit"])){
    //GET THE USERNAME FORM THE INPUT FIELD 
    $username = $_POST["userName"]; 
    //GET THE PASSWORD FORM THE INPUT FIELD 
    $password = $_POST["password"]; 

    //GET THE DATABSE CONNECTION FILE 
    require_once 'connect-to-database.php'; 
    //GET THE ERROR HANDLING FILE 
    require_once 'error-handling.php'; 
    //GET THE SIGNUP UTIL FUNCTIONS FILE
    require_once 'authentication-util-function.php'; 

    //IF THE USER LEFT ANY FIELDS BLANK
    if(emptyInputLogin($username, $password) !== false){
        //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
        header("location: ../login.php?error=emptyInput");
        exit(); 
    }

    //LOG THE USER INTO HIS ACCOUNT 
    loginUser($connectionObject, $username, $password); 
}else{
    //SEND THE USER BACK TO THE LOGIN FORM
    header("location: ../login.php");
    exit(); 
}