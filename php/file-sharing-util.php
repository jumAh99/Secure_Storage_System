<?php 

function getUserInformation($connectionObject, $userID){
    //GET THE USER FILES 
    $sql = "SELECT * FROM tb_user_login_info WHERE userID=?;";

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
    mysqli_stmt_bind_param($sql_prepared_statement, "s" /*type:STRING*/, $userID); 
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