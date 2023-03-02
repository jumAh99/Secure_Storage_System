<?php
//CREATE A NEW USER 
function createUser($connectionObject, $username, $email, $password){
    //INSERT THE NEW USER INTO THE DATABASE 
    $sql = "INSERT INTO  tb_user_login_info (userUID, userEmail, userPassword) VALUES (?,?,?)"; //? IS A PLACEHOLDER

    /*PREPARED STATEMENT TO SEND SQL FIRST THEN DATA TO AVOID SQL INJEC
    SEND SQL FIRST AND THEN THE USER INPUT SO THE INPUT IS NOT RUNNED AS CODE*/
    $sql_prepared_statement = mysqli_stmt_init($connectionObject);

    //CHECK IF THE STATEMENT HAS ANY ERRORS
    if(!mysqli_stmt_prepare($sql_prepared_statement, $sql)){
        //SEND USER BACK TO SIGNUP PAGE
        header("location: ../signup.html?stmtFailed");
        exit(); 
    }
    //HASH THE PASSWORD TO THE ENCRYPTED PASSWORD IS NOT VISSIBLE INTO THE DATABASE
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); //THE METHOD IS AUTOMATICALLY UPDATED TO THE NEWEST VERSION AGAINST THREATS
    //MAKE THE CONNECTION
    mysqli_stmt_bind_param($sql_prepared_statement, "sss" /*type:STRING*/, $username, $email, $hashedPassword); 
    //EXECUTE THE STATEMENT 
    mysqli_stmt_execute($sql_prepared_statement /* statement we are executing */ ); 
    //CLOSE THE PREPARED STATEMENT 
    mysqli_stmt_close($sql_prepared_statement); 

    //MAKE THE USER GO BACK TO THE LOGIN PAGE SO THEY CAN AUTHENTICATE 
    header("location: ../signup.html?error=none");
    exit(); 
}