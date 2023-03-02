<?php
include 'connect-to-database.php';

if(isset($_POST["submit"])){
    //HAS DATA BEEN REQUESTED TO THE SERVER
    if($_SERVER["REQUEST_METHOD"] !=="POST"){
        //EXIT THE SCRIPT AND OUTPUT ERROR MESSAGE
        exit("Ops, POST request has not been issued!"); 
    }

    //MAKE SURE THAT THE FILE ARRAY IS CORRECTLY FORMATTED
    if(empty($_FILES)){
        exit("Ops, seems like the files was not selected properly!"); 
    }
    //IF THE FILE ARRAY IS NOT CORRECT
    if($_FILES["file"]["error"] !== UPLOAD_ERR_OK){
        switch($_FILES["file"]["error"]){
            //CHECK FOR PARTIALLY UPLOADED FILE
            case UPLOAD_ERR_PARTIAL:
                exit("Ops seems like upload was not correctly done.");
            //IF NO FILE HAS BEEN SUBMITTED 
            case UPLOAD_ERR_NO_FILE:
                exit("Ops, seems like you have not submitted anything!."); 
            //IF THERE WAS A PROBLEM WITH THE PHP EXTENSION
            case UPLOAD_ERR_EXTENSION:
                exit("Ops, there is a conflicting extension."); 
            //IF THERE WAS A PROBLEM WITH THE SIZE OF THE FILE
            case UPLOAD_ERR_FORM_SIZE: 
                exit("Ops, file is too large!");
            //IF FILE CANNOT BE SAVED
            case UPLOAD_ERR_CANT_WRITE:
                exit("Ops, looks like there was a problem during writing!");  
            //IF TEMP FILE CANNOT BE FOUND 
            case UPLOAD_ERR_NO_TMP_DIR:
                exit("Ops, the tmp file cannot be found!"); 
            default:
                exit("Ops, I cant figure out the error!"); 
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
        exit("Ops, the file is not supported!");
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
    $destinationPath = __DIR__ . "/../uploads/" . $fileName; 

    //INSERT THE FILE INFORMATION INTO THE DATABASE
    $fileDate =  date('Y-m-d'); 
    $fileTime = date("h:i:s");
    $fileSize = round(filesize($_FILES["file"]["tmp_name"])/1024/1024,2); 
    $sql="INSERT INTO tb_file_details(Name, Date, Size, Time) VALUES ('$fileName','$fileDate','$fileSize', '$fileTime');"; 
    mysqli_query($connectionObject, $sql); 

    //CHECK WEATHER THE FILE NAME ALREADY EXISTS IN THE FOLDER 
    $temp = 1;
    //LOOP TROUGH ALL THE FILES PRESENT CURRENTLY IN THE FOLDER 
    while(file_exists(($destinationPath))){
        $fileName = $base . "($temp)." . $pathInfo["extension"]; 
        //RECREATE THE DESTINATION 
        $destinationPath = __DIR__ . "/../uploads/" . $fileName; 
        //INCREMENT THE INDEX GIVE THE NEXT FILE A DIFFERNT NUMERIC NAME
        $temp++; 
    }
    if( ! move_uploaded_file($_FILES["file"]["tmp_name"], $destinationPath)){
        exit("Ops, looks like the upload was not successful!");
    }
    //IF UPLOAD WAS SUCECSSFUL THEN PRINT IT
    echo "UPLOAD SUCCESSFUL!"; 
}