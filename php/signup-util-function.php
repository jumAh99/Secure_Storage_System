<?php
//CREATE A NEW USER 
function createUser($connectionObject, $username, $email, $password, $repeatPassword){
    //INSERT THE NEW USER INTO THE DATABASE 
    $sql = "INSERT INTO  tb_user_login_info (userUID, userEmail, userPassword) VALUES "; //? IS A PLACEHOLDER

}