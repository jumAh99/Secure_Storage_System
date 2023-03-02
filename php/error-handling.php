<?php
//CHECK EMPTY INPUT FIELDS
function emptyInputSignup($username, $email, $password, $repeatPassword){ 
    //IF ANY OF THE VARIBALE ARE EMPTY
    if(empty($username) || empty($email) || empty($password) || empty($repeatPassword)){
        //MAKE THE RESULT TRUE BECAUSE THERE IS AN ERROR
        $isSomethingWrong = true; 
    }else{
        //THERE IS NOTHING WRONG
        $isSomethingWrong = false;
    }
    //RETURN THE VALUE
    return $isSomethingWrong; 
}
//CHECK IF THE USERNAME IS IN THE CORRECT FORMAT
function invalidUsername($username){ 
    //IF THE USERNAME HAS SOME STRANGE CHARACTERS IN IT
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        //MAKE THE RESULT TRUE BECAUSE THERE IS AN ERROR
        $isSomethingWrong = true; 
    }else{
        //THERE IS NOTHING WRONG
        $isSomethingWrong = false;
    }
    //RETURN THE VALUE
    return $isSomethingWrong; 
}
//CHECK IF TH EMAIL IS IN THE CORRECT FORMAT
function invalidEmail($email){ 
    //USER BUILT IN FILTER FUNCTION TO CHECK WEATHER THE EMAIL IS CORRECT
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        //MAKE THE RESULT TRUE BECAUSE THERE IS AN ERROR
        $isSomethingWrong = true; 
    }else{
        //THERE IS NOTHING WRONG
        $isSomethingWrong = false;
    }
    //RETURN THE VALUE
    return $isSomethingWrong; 
}
//CHECK IF THE PASSWORDS ARE MATCHING
function invalidPassword($password, $repeatPassword){ 
    //THE PASSWORD IS NOT EQUAL TO THE VARABLE REPEAT PASSWORD
    if($password != $repeatPassword){
        //MAKE THE RESULT TRUE BECAUSE THERE IS AN ERROR
        $isSomethingWrong = true; 
    }else{
        //THERE IS NOTHING WRONG
        $isSomethingWrong = false;
    }
    //RETURN THE VALUE
    return $isSomethingWrong; 
}
//CHECK IF THE USER IS ALREDY PRESENT IN THE DATABASE
function userAlreadyExists($connectionObject, $username, $email){ 
    //CONNECT TO THE DATABASE TO CHECK IF THE USER IS PRESENT 
    $sql = "SELECT * FROM tb_user_login_info WHERE userUID=? OR userEmail=?;"; //? IS A PLACEHOLDER

    /*PREPARED STATEMENT TO SEND SQL FIRST THEN DATA TO AVOID SQL INJEC
    SEND SQL FIRST AND THEN THE USER INPUT SO THE INPUT IS NOT RUNNED AS CODE*/

    $sql_prepared_statement = mysqli_stmt_init($connectionObject); 
    //CHECK IF THE STATEMENT HAS ANY ERRORS
    if(!mysqli_stmt_prepare($sql_prepared_statement, $sql)){
        //SEND USER BACK TO SIGNUP PAGE
        header("location: ../signup.html?stmtFailed");
        exit(); 
    }
    //MAKE THE CONNECTION
    mysqli_stmt_bind_param($sql_prepared_statement, "ss" /*type:STRING*/, $username, $email); 
    //EXECUTE THE STATEMENT 
    mysqli_stmt_execute($sql_prepared_statement /* statement we are executing */ ); 
    //GET THE DATA FROM THE DATABASE
    $resultDatabaseData = mysqli_stmt_get_result($sql_prepared_statement); 
    //IF THE DATA MATCH TO THE DATA PRESENT IN THE FORM
    if ($isDataTrue = mysqli_fetch_assoc($resultDatabaseData) /*FETCH THE DATA AS AN ASSOCIATIVE ARRAY*/ ) {
        //GET ALL THE DATA THAT MATCHES
        return $isDataTrue; 
    }else{
        //THERE IS NOTHING WRONG 
        $isSomethingWrong = false; 
        return $isSomethingWrong; 
    }
    //CLOSE THE PREPARED STATEMENT 
    mysqli_stmt_close($sql_prepared_statement); 
}