<?php
//START THE SESSION 
session_start();//START THE SESSION 

REQUIRE_ONCE 'connect-to-database.php';
REQUIRE_ONCE 'file-upload-util.php'; 

if(isset($_SESSION["userID"])){
    if(isset($_POST["submit"])){
        //MAKE SURE THAT THE FILE ARRAY IS CORRECTLY FORMATTED
        if(empty($_FILES)){
            exit("Ops, seems like the files was not selected properly!"); 
        }
        //IF THE FILE ARRAY IS NOT CORRECT
        if($_FILES["file"]["error"] !== UPLOAD_ERR_OK){
            switch($_FILES["file"]["error"]){
                //CHECK FOR PARTIALLY UPLOADED FILE
                case UPLOAD_ERR_PARTIAL:
                    //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
                    header("location: ../form?error=file_partial");
                    exit(); 
                //IF NO FILE HAS BEEN SUBMITTED 
                case UPLOAD_ERR_NO_FILE:
                    //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
                    header("location: ../form?error=no_file");
                    exit(); 
                //IF THERE WAS A PROBLEM WITH THE PHP EXTENSION
                case UPLOAD_ERR_EXTENSION:
                    //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
                    header("location: ../form?error=err_extension");
                    exit(); 
                //IF THERE WAS A PROBLEM WITH THE SIZE OF THE FILE
                case UPLOAD_ERR_FORM_SIZE: 
                    //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
                    header("location: ../form?error=invalid_size");
                    exit(); 
                //IF FILE CANNOT BE SAVED
                case UPLOAD_ERR_CANT_WRITE:
                    //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
                    header("location: ../form?error=cant_write");
                    exit(); 
                //IF TEMP FILE CANNOT BE FOUND 
                case UPLOAD_ERR_NO_TMP_DIR:
                    //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
                    header("location: ../form?error=no_tmp_dir");
                    exit(); 
                default:
                    //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
                    header("location: ../form?error=cannot_find_error");
                    exit(); 
            }
        }

        //GET THE FILE INFORMATION TO ASSESS WEATHER THE FILE UPLOADED IS SAFE 
        $fileInfo = new finfo(FILEINFO_MIME_TYPE);
        $mime_type = $fileInfo->file($_FILES["file"]["tmp_name"]); 

        //CREATE AN ARRAY OF SUPPORTED FILE TYPES 
        $fileExt = explode('.', $_FILES['file']['name']); 
        $filesPresentInTheFolder = strtolower(end($fileExt)); 
        $mime_types = ["gif", "png", "jpeg","jpg", "txt"]; 

        //CHECK QWATHER THE FILE UPLOADED IS PART OF THE ARRAY
        if(!in_array($filesPresentInTheFolder, $mime_types)){
            //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
            header("location: ../form?error=bad_file");
            exit(); 
        }
        //SPLIT THE FILE NAME INTO DIFFERENT PARTS 
        $pathInfo = pathinfo($_FILES["file"]["name"]);
        //GET THE FILE NAME WITHOUT IT'S EXTENSION 
        $base=$pathInfo["filename"]; 
        //REPLACE ANY SPECIAL CHARACTERS FROM THE FILE NAME 
        $base = preg_replace("/[^\w-]/", "_", $base); 
        //GET THE TEMP FILE NAME ASSIGNED TO THE FILE WHEN UPLOADED TO SERVER
        $fileName = $base . "." . $pathInfo["extension"]; 
        //ABSOLUTE PATH TO THE DESTINATION FOLDER
        if(!is_dir(__DIR__ . "/../uploads/" . $_SESSION["userUID"])){
            mkdir(__DIR__ . "/../uploads/" . $_SESSION["userUID"], 0777, true);  
        }
        $destinationPathUser = __DIR__ . "/../uploads/" . $_SESSION["userUID"] . "/" .  $fileName; 

        //INSERT THE FILE INFORMATION INTO THE DATABASE
        $fileDate =  date('Y-m-d'); 
        $fileTime = date("h:i:s", strtotime('-1 hour'));
        $fileSize = round(filesize($_FILES["file"]["tmp_name"])/1024/1024,2); 
        //MAKE THE PREPARED STATEMENT
        uploadFileSQLRecord($connectionObject, $_SESSION["userID"], $fileName, $fileDate, $fileSize, $fileTime); 

        //CHECK WEATHER THE FILE NAME ALREADY EXISTS IN THE FOLDER 
        $temp = 1;
        //LOOP TROUGH ALL THE FILES PRESENT CURRENTLY IN THE FOLDER 
        while(file_exists(($destinationPathUser))){
            $fileName = $base . "($temp)." . $pathInfo["extension"]; 
            //RECREATE THE DESTINATION 
            $destinationPathUser = __DIR__ . "/../uploads/" . $_SESSION["userUID"] . "/". $fileName; 
            //INCREMENT THE INDEX GIVE THE NEXT FILE A DIFFERNT NUMERIC NAME
            $temp++; 
        }
        if( ! move_uploaded_file($_FILES["file"]["tmp_name"], $destinationPathUser)){
            //ADD THE ERROR TYPE TO URL SO WE CAN USE THAT AS A MESSAGE
            header("location: ../form?error=file_partial");
            exit(); 
        }
        //IF UPLOAD WAS SUCECSSFUL THEN PRINT IT 
        header("location: ../form?error=none");
        exit(); 
    }
}else{
    //IF UPLOAD WAS SUCECSSFUL THEN PRINT IT 
    header("location: ../login?error=session_not_set");
    exit(); 
}