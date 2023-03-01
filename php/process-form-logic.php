
<?php
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
    if($_FILES["image"]["error"] !== UPLOAD_ERR_OK){
        switch($_FILES["image"]["error"]){
            //CHECK FOR PARTIALLY UPLOADED FILE
            case UPLOAD_ERR_PARTIAL:
                exit("Ops seems like upload was not correctly done."); 
            case UPLOAD_ERR_NO_FILE:
                exit("Ops, seems like you have not submitted anything!."); 
            case UPLOAD_ERR_EXTENSION:
                exit("Ops, there is a conflicting extension."); 
            case UPLOAD_ERR_FORM_SIZE: 
                exit("Ops, file is too large!");
            default:
                exit("Ops, I cant figure out the error!"); 
        }
    }

    //CREATE AN ARRAY OF SUPPORTED FILE TYPES 
    $mime_types = ["image/gif", "image/png", "image/jpeg"]; 

    //CHECK QWATHER THE FILE UPLOADED IS PART OF THE ARRAY
    if(!in_array(($_FILES["image"]["type"]), $mime_types)){
        exit("Ops, the file is not supported!");
    }

    //VIEW FILE ARRAY 
    print_r($_FILES);
?>