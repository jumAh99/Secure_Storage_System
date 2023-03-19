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
        header("location: ../signup?stmtFailed");
        exit(); 
    }
    //HASH THE PASSWORD SO THE ENCRYPTED PASSWORD IS NOT VISSIBLE INTO THE DATABASE
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); //THE METHOD IS AUTOMATICALLY UPDATED TO THE NEWEST VERSION AGAINST THREATS
    //MAKE THE CONNECTION
    mysqli_stmt_bind_param($sql_prepared_statement, "sss" /*type:STRING*/, $username, $email, $hashedPassword); 
    //EXECUTE THE STATEMENT 
    mysqli_stmt_execute($sql_prepared_statement /* statement we are executing */ ); 
    //CLOSE THE PREPARED STATEMENT 
    mysqli_stmt_close($sql_prepared_statement); 

    //CREATE THYE STORAGE FOLDER WHEN THE USER REGISTERS 
    if(!is_dir(__DIR__ . "/../uploads/" . $username . "/encrypted/")){
        mkdir(__DIR__ . "/../uploads/" . $username, 0777, true); 
        mkdir(__DIR__ . "/../uploads/" . $username . "/encrypted", 0777, true);
    }
    //MAKE THE USER GO BACK TO THE LOGIN PAGE SO THEY CAN AUTHENTICATE 
    header("location: ../login?error=none");
    exit(); 
}
//ALLOW THE USER TO LOGIN
function loginUser($connectionObject, $username, $password){
    //IF THE USER LOGIN IS PRESENT INTO THE DATABASE
    $presentUser = userAlreadyExists($connectionObject, $username, $username); //USAGE OF 'OR' SO EVEN IF THE USER WERE TO PUT EMAIL THEY WILL STILL BE ABLE TO LOGIN 
    //IF THE RETUN VALUE IS FALSE
    if($presentUser == false){
        //MAKE THE USER GO BACK TO THE LOGIN PAGE SO THEY CAN AUTHENTICATE 
        header("location: ../login?error=invalidCredentials");
        exit(); 
    }
    //PASSWORD IN THE ASSOCIATIVE ARRAY AND ASSIGN THE VALUE
    $passwordHashed = $presentUser["userPassword"]; //MAKE REFERENCE TO COLUM NAME
    //CHECK WEATHER THE HASHED PASSWORD MATCHES
    $checkPassword = password_verify($password /*THE PASSWORD THAT THE USER GAVE US*/, $passwordHashed);

    //IF THE PASSWORD GIVEN MATCHES TO THE HASHED PASSWORD
    if($checkPassword == false){
        //SEND THE USER BACK WITH AN ERROR MESSAGE
        header("location: ../login?error=invalidCredentials");
        exit(); 
    }else if($checkPassword == true){
        //LOGIN THE USER INTO THE WEBSITE WITH A NEW SESSION
        session_start();
        //CREATE A SESSION VARIABLE AND GET THE USER ID FROM THE DB
        $_SESSION["userID"] =  $presentUser["userID"]; 
        //GET THE USERNAME FROM THE DATABASE
        $_SESSION["userUID"] =  $presentUser["userUID"]; 
        header("location: ../form");
        exit(); 
    }
}