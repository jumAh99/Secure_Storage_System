<?php 
function getUserInformationByUID($connectionObject, $userUID){
    //GET THE USER FILES 
    $sql = "SELECT * FROM tb_user_login_info WHERE userUID=?;";

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
    mysqli_stmt_bind_param($sql_prepared_statement, "s" /*type:STRING*/, $userUID); 
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

function shareAlredyExists($connectionObject, $reciverName, $senderName, $fileName){ 
    //CONNECT TO THE DATABASE TO CHECK IF THE USER IS PRESENT 
    $sql = "SELECT * FROM tb_file_share_info WHERE receiverUID=? AND senderUID=? AND fileName=?;"; //? IS A PLACEHOLDER

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
    mysqli_stmt_bind_param($sql_prepared_statement, "sss" /*type:STRING*/, $reciverName, $senderName, $fileName); 
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
//STORE SHARING RECORDS IN A DATABASE
function insertShareTransaction($connectionObject, $receiverName, $senderName, $fileName){
    //IF FILE IS NOT ALREDY BEING SAHARED
    $presentUser = shareAlredyExists($connectionObject, $receiverName, $senderName, $fileName);

    //MAKE THE SQL QUERY 
    $sql= "INSERT INTO tb_file_share_info (fileName, senderUID, receiverUID) VALUES (?,?,?)";

    /*PREPARED STATEMENT TO SEND SQL FIRST THEN DATA TO AVOID SQL INJEC
    SEND SQL FIRST AND THEN THE USER INPUT SO THE INPUT IS NOT RUNNED AS CODE*/
    $sql_prepared_statement = mysqli_stmt_init($connectionObject);


    //CHECK IF THE STATEMENT HAS ANY ERRORS
    if(!mysqli_stmt_prepare($sql_prepared_statement, $sql)){
        //SEND USER BACK TO SIGNUP PAGE
        header("location: ../signup?stmtFailed");
        exit(); 
    }
    //IF SHARE DID NOT HAPPEN
    if($presentUser == false){
        //MAKE THE CONNECTION
        mysqli_stmt_bind_param($sql_prepared_statement, "sss" /*type:STRING*/, $fileName, $senderName, $receiverName); 
        //EXECUTE THE STATEMENT 
        mysqli_stmt_execute($sql_prepared_statement /* statement we are executing */ ); 
        //CLOSE THE PREPARED STATEMENT 
        mysqli_stmt_close($sql_prepared_statement); 
    }else{
        //MAKE THE USER GO BACK TO THE LOGIN PAGE SO THEY CAN AUTHENTICATE 
        header("location: ../form?error=shareAlreadyDone");
        exit(); 
    }

}

function clenFileName($fileName){
    $fileName= str_replace(' ','-', $fileName); 
    return preg_replace('/[^A-Za-z0-9\-]/','',$fileName); 
}