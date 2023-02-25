<?php
    //HAS DATA BEEN REQUESTED TO THE SERVER
    if($_SERVER["REQUEST_METHOD"] !=="POST"){
        //EXIT THE SCRIPT AND OUTPUT ERROR MESSAGE
        exit("Ops, POST request has not been issued!"); 

    }

    //MAKE SURE THAT THE FILE ARRAY IS NOT EMPY 
    if(empty($_FILES)){
        exit("Ops, seems like the files was not selected properly!"); 
    }
    
    //VIEW FILE ARRAY 
    print_r($_FILES);
?>