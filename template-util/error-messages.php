<!-- ERROR HANDLING CALLS -->
<div class="error-handling">
    <?php
        //CHECK FOR ERROR MESSAGES
        if(isset($_GET["error"])){
            //WHAT THE ERROR MESSAGE VALUE IS 
            switch($_GET["error"]){
                //IF THE VALUE IS AN EMPTY INPUT
                case "file_partial":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    echo("<p>THERE WAS AN ERROR WITH THE UPLOAD!</p>"); 
                    break; 
                //IF THE VALUE IS AN EMPTY INPUT
                case "no_file":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    echo("<p>NO FILE WAS SELECTED!</p>"); 
                    break; 
                case "err_extension":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    echo("<p>SOMETHING WENT WRONG!</p>"); 
                    break; 
                case "invalid_size":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    echo("<p>THE FILE IS TOO LARGE!</p>"); 
                    break; 
                case "cant_write":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    echo("<p>CANNOT WRITE FILE!</p>"); 
                    break; 
                case "no_tmp_dir":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    echo("<p>NO TEMP DIRECTORY!</p>"); 
                    break; 
                case "cannot_find_error":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    echo("<p>WE CANT FIGURE OUT THE ERROR!<p>"); 
                    break; 
                case "stmtFailed":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    echo("<p>SOMETHING WENT WRONG!</p>"); 
                    break; 
                case "bad_file":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    echo("<p>FILE IS UNSUPPORTED!</p>"); 
                    break; 
                case "file_not_found":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    echo("<p>NO FILE WAS FOUND, PLEASE TRY AGAIN!</p>"); 
                    break; 
                case "fileDeleted":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    echo("<p>FILE DELETED!</p>"); 
                    break; 
            }
        }
    ?>
</div>