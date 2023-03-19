<?php
function uploadFileSQLRecord($connectionObject, $userID, $fileName, $fileDate, $fileSize, $fileTime, $isOwner){
    //INSERT THE FILE INFORMATION INTO THE DATABASE
    $sql= "INSERT INTO tb_file_details (userID, fileName, uploadDate, fileSize, uploadTime, Owner) VALUES (?,?,?,?,?,?)"; 

    $sql_prepared_statement = mysqli_stmt_init($connectionObject); 
    if(!mysqli_stmt_prepare($sql_prepared_statement, $sql)){
        //SEND USER BACK TO SIGNUP PAGE
        header("location: ../form?stmtFailed");
        exit(); 
    }
    //MAKE THE CONNECTION
    mysqli_stmt_bind_param($sql_prepared_statement, "ssssss" /*type:STRING*/, $userID, $fileName, $fileDate, $fileSize, $fileTime, $isOwner);
    //EXECUTE THE STATEMENT 
    mysqli_stmt_execute($sql_prepared_statement /* statement we are executing */ ); 
    //CLOSE THE PREPARED STATEMENT 
    mysqli_stmt_close($sql_prepared_statement); 
}

define('FILE_ENCRYPTION_BLOCKS', 2000000);
function encryptFile($source, $dest, $key)
{
    $cipher = 'aes-256-cbc';
    $ivLenght = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivLenght);

    $fpSource = fopen($source, 'rb');
    $fpDest = fopen($dest, 'w');

    fwrite($fpDest, $iv);

    while (! feof($fpSource)) {
        $plaintext = fread($fpSource, $ivLenght * FILE_ENCRYPTION_BLOCKS);
        $ciphertext = openssl_encrypt($plaintext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        $iv = substr($ciphertext, 0, $ivLenght);

        fwrite($fpDest, $ciphertext);
    }

    fclose($fpSource);
    fclose($fpDest);
}

function decryptFile($source, $dest, $key)
{
    $cipher = 'aes-256-cbc';
    $ivLenght = openssl_cipher_iv_length($cipher);

    $fpSource = fopen($source, 'rb');
    $fpDest = fopen($dest, 'w');

    $iv = fread($fpSource, $ivLenght);

    while (! feof($fpSource)) {
        $ciphertext = fread($fpSource, $ivLenght * (FILE_ENCRYPTION_BLOCKS + 1));
        $plaintext = openssl_decrypt($ciphertext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        $iv = substr($plaintext, 0, $ivLenght);

        fwrite($fpDest, $plaintext);
    }

    fclose($fpSource);
    fclose($fpDest);
}

function deleteFile($connectionObject, $fileName, $userID, $destinationPathUser){
    //CONNECT TO THE DATABASE TO CHECK IF THE USER IS PRESENT 
    $sql = "DELETE FROM tb_file_details WHERE fileName=? AND userID=?;"; //? IS A PLACEHOLDER

    /*PREPARED STATEMENT TO SEND SQL FIRST THEN DATA TO AVOID SQL INJEC
    SEND SQL FIRST AND THEN THE USER INPUT SO THE INPUT IS NOT RUNNED AS CODE*/

    $sql_prepared_statement = mysqli_stmt_init($connectionObject); 
    //CHECK IF THE STATEMENT HAS ANY ERRORS
    if(!mysqli_stmt_prepare($sql_prepared_statement, $sql)){
        //SEND USER BACK TO SIGNUP PAGE
        header("location: ../signup.html?stmtFailed");
        exit(); 
    }
    //DELETE THE FILE IN THE FOLDER PRESENT IN THE SERVER
    unlink($destinationPathUser);
    //MAKE THE CONNECTION
    mysqli_stmt_bind_param($sql_prepared_statement, "ss" /*type:STRING*/, $fileName, $userID); 
    //EXECUTE THE STATEMENT 
    mysqli_stmt_execute($sql_prepared_statement /* statement we are executing */ ); 
    //CLOSE THE PREPARED STATEMENT 
    mysqli_stmt_close($sql_prepared_statement); 
}
