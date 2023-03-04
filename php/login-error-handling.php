<?php
//LOGIN PAGE EMPTY INPUT CHECK 
function emptyInputLogin($username, $password){
    //IF ANY OF THE VARIBALE ARE EMPTY
    if(empty($username) || empty($password)){
        //MAKE THE RESULT TRUE BECAUSE THERE IS AN ERROR
        $isSomethingWrong = true; 
    }else{
        //THERE IS NOTHING WRONG
        $isSomethingWrong = false;
    }
    //RETURN THE VALUE
    return $isSomethingWrong; 
}