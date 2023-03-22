<?php 

function getFileInformationByName($connectionObject, $fileName, $userID){
    //GET THE USER FILES 
    $sql = "SELECT * FROM tb_file_details WHERE fileName=? AND userID=?;";

        /*PREPARED STATEMENT TO SEND SQL FIRST THEN DATA TO AVOID SQL INJEC
    SEND SQL FIRST AND THEN THE USER INPUT SO THE INPUT IS NOT RUNNED AS CODE*/

    $sql_prepared_statement = mysqli_stmt_init($connectionObject); 
    //CHECK IF THE STATEMENT HAS ANY ERRORS
    if(!mysqli_stmt_prepare($sql_prepared_statement, $sql)){
        //SEND USER BACK TO SIGNUP PAGE
        header("location: ../form?error=stmtFailed");
        exit(); 
    }
    //MAKE THE CONNECTION
    mysqli_stmt_bind_param($sql_prepared_statement, "ss" /*type:STRING*/, $fileName, $userID); 
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
// GET FILE COUNT 
function getFileByUserID($connectionObject, $userID){
    //GET THE USER FILES 
    $sql = "SELECT * FROM tb_file_details WHERE userID=?;";

        /*PREPARED STATEMENT TO SEND SQL FIRST THEN DATA TO AVOID SQL INJEC
    SEND SQL FIRST AND THEN THE USER INPUT SO THE INPUT IS NOT RUNNED AS CODE*/

    $sql_prepared_statement = mysqli_stmt_init($connectionObject); 
    //CHECK IF THE STATEMENT HAS ANY ERRORS
    if(!mysqli_stmt_prepare($sql_prepared_statement, $sql)){
        //SEND USER BACK TO SIGNUP PAGE
        header("location: ../form?error=stmtFailed");
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
function getFileSharingInfoByOwner($connectionObject, $fileName, $ownerUID){
    //GET THE USER FILES 
    $sql = "SELECT * FROM tb_file_share_info WHERE fileName=? AND senderUID=?;";

        /*PREPARED STATEMENT TO SEND SQL FIRST THEN DATA TO AVOID SQL INJEC
    SEND SQL FIRST AND THEN THE USER INPUT SO THE INPUT IS NOT RUNNED AS CODE*/

    $sql_prepared_statement = mysqli_stmt_init($connectionObject); 
    //CHECK IF THE STATEMENT HAS ANY ERRORS
    if(!mysqli_stmt_prepare($sql_prepared_statement, $sql)){
        //SEND USER BACK TO SIGNUP PAGE
        header("location: ../form?error=stmtFailed");
        exit(); 
    }
    //MAKE THE CONNECTION
    mysqli_stmt_bind_param($sql_prepared_statement, "ss" /*type:STRING*/, $fileName, $ownerUID); 
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
function getFileSharingInfoByReceiver($connectionObject, $fileName, $receiverUID){
    //GET THE USER FILES 
    $sql = "SELECT * FROM tb_file_share_info WHERE fileName=? AND receiverUID=?;";

        /*PREPARED STATEMENT TO SEND SQL FIRST THEN DATA TO AVOID SQL INJEC
    SEND SQL FIRST AND THEN THE USER INPUT SO THE INPUT IS NOT RUNNED AS CODE*/

    $sql_prepared_statement = mysqli_stmt_init($connectionObject); 
    //CHECK IF THE STATEMENT HAS ANY ERRORS
    if(!mysqli_stmt_prepare($sql_prepared_statement, $sql)){
        //SEND USER BACK TO SIGNUP PAGE
        header("location: ../form?error=stmtFailed");
        exit(); 
    }
    //MAKE THE CONNECTION
    mysqli_stmt_bind_param($sql_prepared_statement, "ss" /*type:STRING*/, $fileName, $receiverUID); 
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
function getUserInformationByUID($connectionObject, $userUID){
    //GET THE USER FILES 
    $sql = "SELECT * FROM tb_user_login_info WHERE userUID=?;";

        /*PREPARED STATEMENT TO SEND SQL FIRST THEN DATA TO AVOID SQL INJEC
    SEND SQL FIRST AND THEN THE USER INPUT SO THE INPUT IS NOT RUNNED AS CODE*/

    $sql_prepared_statement = mysqli_stmt_init($connectionObject); 
    //CHECK IF THE STATEMENT HAS ANY ERRORS
    if(!mysqli_stmt_prepare($sql_prepared_statement, $sql)){
        //SEND USER BACK TO SIGNUP PAGE
        header("location: ../form?error=stmtFailed");
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
function getUserInformationByID($connectionObject, $userID){
    //GET THE USER FILES 
    $sql = "SELECT * FROM tb_user_login_info WHERE userID=?;";

        /*PREPARED STATEMENT TO SEND SQL FIRST THEN DATA TO AVOID SQL INJEC
    SEND SQL FIRST AND THEN THE USER INPUT SO THE INPUT IS NOT RUNNED AS CODE*/

    $sql_prepared_statement = mysqli_stmt_init($connectionObject); 
    //CHECK IF THE STATEMENT HAS ANY ERRORS
    if(!mysqli_stmt_prepare($sql_prepared_statement, $sql)){
        //SEND USER BACK TO SIGNUP PAGE
        header("location: ../form?error=stmtFailed");
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

function shareAlredyExists($connectionObject, $fileName, $senderUID, $receiverUID){ 
    //CONNECT TO THE DATABASE TO CHECK IF THE USER IS PRESENT 
    $sql = "SELECT * FROM tb_file_share_info WHERE fileName=? AND senderUID=? AND receiverUID=?;"; //? IS A PLACEHOLDER

    /*PREPARED STATEMENT TO SEND SQL FIRST THEN DATA TO AVOID SQL INJEC
    SEND SQL FIRST AND THEN THE USER INPUT SO THE INPUT IS NOT RUNNED AS CODE*/

    $sql_prepared_statement = mysqli_stmt_init($connectionObject); 
    //CHECK IF THE STATEMENT HAS ANY ERRORS
    if(!mysqli_stmt_prepare($sql_prepared_statement, $sql)){
        //SEND USER BACK TO SIGNUP PAGE
        header("location: ../from?error=stmtFailed");
        exit(); 
    }
    //MAKE THE CONNECTION
    mysqli_stmt_bind_param($sql_prepared_statement, "sss" /*type:STRING*/, $fileName, $senderUID, $receiverUID); 
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
function insertShareTransaction($connectionObject, $fileName, $senderUID, $receiverUID){
    //MAKE THE SQL QUERY 
    $sql= "INSERT INTO tb_file_share_info (fileName, senderUID, receiverUID) VALUES (?,?,?)";

    /*PREPARED STATEMENT TO SEND SQL FIRST THEN DATA TO AVOID SQL INJEC
    SEND SQL FIRST AND THEN THE USER INPUT SO THE INPUT IS NOT RUNNED AS CODE*/
    $sql_prepared_statement = mysqli_stmt_init($connectionObject);


    //CHECK IF THE STATEMENT HAS ANY ERRORS
    if(!mysqli_stmt_prepare($sql_prepared_statement, $sql)){
        //SEND USER BACK TO SIGNUP PAGE
        header("location: ../form?error=stmtFailed");
        exit(); 
    }
    //MAKE THE CONNECTION
    mysqli_stmt_bind_param($sql_prepared_statement, "sss" /*type:STRING*/, $fileName, $senderUID, $receiverUID); 
    //EXECUTE THE STATEMENT 
    mysqli_stmt_execute($sql_prepared_statement /* statement we are executing */ ); 
    //CLOSE THE PREPARED STATEMENT 
    mysqli_stmt_close($sql_prepared_statement); 
}

//DELETE THE SHARED RECORD WHEN THE USER DELETES THE FILE
function deleteSharedRecord($connectionObject, $fileName, $ownerUID){
        //CONNECT TO THE DATABASE TO DELETE THE RELVENAT RECORDS
        $sqlFileSharing = "DELETE FROM tb_file_share_info WHERE fileName=? AND senderUID=?;"; //? IS A PLACEHOLDER

        $sql_prepared_statement = mysqli_stmt_init($connectionObject); 
        //CHECK IF THE STATEMENT HAS ANY ERRORS
        if(!mysqli_stmt_prepare($sql_prepared_statement, $sqlFileSharing)){
            //SEND USER BACK TO SIGNUP PAGE
            header("location: ../form?error=stmtFailed");
            exit(); 
        }
        deleteAllRelatedFilesOFTheOwner($connectionObject, $fileName, $ownerUID); 
        //MAKE THE CONNECTION
        mysqli_stmt_bind_param($sql_prepared_statement, "ss" /*type:STRING*/, $fileName, $ownerUID); 
        //EXECUTE THE STATEMENT 
        mysqli_stmt_execute($sql_prepared_statement /* statement we are executing */ ); 
        //CLOSE THE PREPARED STATEMENT 
        mysqli_stmt_close($sql_prepared_statement); 

}
function deleteSingleSharedRecord($connectionObject, $fileName, $receiverUID){
    //CONNECT TO THE DATABASE TO DELETE THE RELVENAT RECORDS
    $sqlFileSharing = "DELETE FROM tb_file_share_info WHERE fileName=? AND receiverUID=?;"; //? IS A PLACEHOLDER

    $sql_prepared_statement = mysqli_stmt_init($connectionObject); 
    //CHECK IF THE STATEMENT HAS ANY ERRORS
    if(!mysqli_stmt_prepare($sql_prepared_statement, $sqlFileSharing)){
        //SEND USER BACK TO SIGNUP PAGE
        header("location: ../form?error=stmtFailed");
        exit(); 
    }
    //MAKE THE CONNECTION
    mysqli_stmt_bind_param($sql_prepared_statement, "ss" /*type:STRING*/, $fileName, $receiverUID); 
    //EXECUTE THE STATEMENT 
    mysqli_stmt_execute($sql_prepared_statement /* statement we are executing */ ); 
    //CLOSE THE PREPARED STATEMENT 
    mysqli_stmt_close($sql_prepared_statement); 

}
function deleteAllRelatedFilesOFTheOwner($connectionObject, $fileName, $ownerUID){
    $sql = "SELECT * FROM tb_file_share_info WHERE fileName='$fileName' AND senderUID='$ownerUID';"; 
    $run = mysqli_query($connectionObject, $sql);
    while($rows = mysqli_fetch_assoc($run)){
        unlink(__DIR__ . "/../uploads/" . $rows["receiverUID"] . "/encrypted/" . $fileName); 
    }
}

function deleteFilesDetailsOfTheOwner($connectionObject, $fileName, $ownerUID){
    //CONNECT TO THE DATABASE TO DELETE THE RELVENAT RECORDS
    $sqlFileSharing = "DELETE FROM tb_file_details WHERE fileName=? AND Owner=?;"; //? IS A PLACEHOLDER

    $sql_prepared_statement = mysqli_stmt_init($connectionObject); 
    //CHECK IF THE STATEMENT HAS ANY ERRORS
    if(!mysqli_stmt_prepare($sql_prepared_statement, $sqlFileSharing)){
        //SEND USER BACK TO SIGNUP PAGE
        header("location: ../form?error=stmtFailed");
        exit(); 
    }

    //MAKE THE CONNECTION
    mysqli_stmt_bind_param($sql_prepared_statement, "ss" /*type:STRING*/, $fileName, $ownerUID); 
    //EXECUTE THE STATEMENT 
    mysqli_stmt_execute($sql_prepared_statement /* statement we are executing */ ); 
    //CLOSE THE PREPARED STATEMENT 
    mysqli_stmt_close($sql_prepared_statement); 
}
function getCurrentFileValue($connectionObject, $fileName, $fileOwner, $receiverUID){
    if(($_SESSION["userUID"] == $fileOwner)){
        //GET THE SHARING INFORMATION FROM THE TABLE
        $currentShareFileInfo = getFileSharingInfoByOwner($connectionObject, $fileOwner."-".$fileName, $fileOwner); 
        return $currentShareFileInfo; 
    }else{
        //GET THE SHARING INFORMATION FROM THE TABLE
        $currentShareFileInfo = getFileSharingInfoByReceiver($connectionObject, $fileName, $receiverUID); 
        return $currentShareFileInfo; 
    }
}