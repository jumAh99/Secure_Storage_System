<?php
function uploadFileSQLRecord($connectionObject, $userID, $fileName, $fileDate, $fileSize, $fileTime){
    //INSERT THE FILE INFORMATION INTO THE DATABASE
    $sql= "INSERT INTO tb_file_details (userID, fileName, uploadDate, fileSize, uploadTime) VALUES (?,?,?,?,?)"; 

    $sql_prepared_statement = mysqli_stmt_init($connectionObject); 
    if(!mysqli_stmt_prepare($sql_prepared_statement, $sql)){
        //SEND USER BACK TO SIGNUP PAGE
        header("location: ../form.php?stmtFailed");
        exit(); 
    }
    //MAKE THE CONNECTION
    mysqli_stmt_bind_param($sql_prepared_statement, "sssss" /*type:STRING*/, $userID, $fileName, $fileDate, $fileSize, $fileTime);
    //EXECUTE THE STATEMENT 
    mysqli_stmt_execute($sql_prepared_statement /* statement we are executing */ ); 
    //CLOSE THE PREPARED STATEMENT 
    mysqli_stmt_close($sql_prepared_statement); 
}
