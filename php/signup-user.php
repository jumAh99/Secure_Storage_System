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
    REQUIRE_ONCE 'connect-to-database.php'; 
    //GET THE ERROR HANDLING FUNCTION FILE
    REQUIRE_ONCE 'signup-error-handling.php'; 
    //GET THE SIGNUP UTIL FUNCTIONS
    REQUIRE_ONCE 'authentication-util-function.php'; 

    //IF THE USER LEFT ANY FIELDS BLANK
    if(emptyInputSignup($username, $email, $password, $repeatPassword) !== false){
        //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
        header("location: ../signup?error=emptyInput");
        exit(); 
    }
    //IF THE USERNAME IS INVALID 
    if(invalidUsername($username) !== false){
        //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
        header("location: ../signup?error=invalidUsername");
        exit(); 
    }
    //IF THE EMAIL IS INVALID
    if(invalidEmail($email) !== false){
        //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
        header("location: ../signup?error=invalidEmail");
        exit(); 
    }
    //THE PASSWORD DO NOT MATCH
    if(invalidPassword($password, $repeatPassword) !== false){
        //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
        header("location: ../signup?error=passwordDoNotMatch");
        exit(); 
    }
    //THE USER ALREADY EXISTS
    if(userAlreadyExists($connectionObject, $username, $email) !== false){
        //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
        header("location: ../signup?error=userAlreadyExists");
        exit(); 
    }
    //CREATE THE USER 
    createUser($connectionObject, $username, $email, $password); 
}else{
    header("location: ../signup");
    exit(); 
}