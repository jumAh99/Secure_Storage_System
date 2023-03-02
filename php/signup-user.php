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

    //IF THE USER LEFT ANY FIELDS BLANK
    if(emptyInputSignup() !== false){
        
    }
}else{
    header("location: ../signup.html");
}