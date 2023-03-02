<?php
//DID THE USER PRESS THE SUBMIT BUTTON 
if(isset($_POST["submit"])){
    //GET THE USERNAME FROM THE INPUT FIELD
    $username = $_POST["username"]; 
    //GET THE EMAIL FROM THE INPUT FIELD
    $email = $_POST["email"]; 
    //GET THE PASSWORD FROM THE INPUT FIELD
    $password = $_POST["password"]; 
    //GET THE REPEAT PASSWORD FROM THE INPUT FIELD
    $repeatPassword = $_POST["repeatPassword"]; 

    //GET THE CONNECTION PHP FILE 
    require_once 'connect-to-database.php'; 
    //GET THE ERROR HANDLING FUNCTION FILE
    require_once 'error-handling.php'; 
    //GET THE SIGNUP UTIL FUNCTIONS
    require_once 'signup-util-function.php'; 

    //IF THE USER LEFT ANY FIELDS BLANK
    if(emptyInputSignup($username, $email, $password, $repeatPassword) !== false){
        //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
        header("location: ../signup.php?error=emptyInput");
        exit(); 
    }
    //IF THE USERNAME IS INVALID 
    if(invalidUsername($username) !== false){
        //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
        header("location: ../signup.php?error=invalidUsername");
        exit(); 
    }
    //IF THE EMAIL IS INVALID
    if(invalidEmail($email) !== false){
        //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
        header("location: ../signup.php?invalidEmail");
        exit(); 
    }
    //THE PASSWORD DO NOT MATCH
    if(invalidPassword($password, $repeatPassword) !== false){
        //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
        header("location: ../signup.php?error=passwordDoNotMatch");
        exit(); 
    }
    //THE USER ALREADY EXISTS
    if(userAlreadyExists($connectionObject, $username, $email) !== false){
        //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
        header("location: ../signup.php?error=userAlreadyExists");
        exit(); 
    }
    //CREATE THE USER 
    createUser($connectionObject, $username, $email, $password); 
}else{
    header("location: ../signup.php");
    exit(); 
}