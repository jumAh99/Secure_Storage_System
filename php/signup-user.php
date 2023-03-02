<?php
//DID THE USER PRESS THE SUBMIT BUTTON 
if(isset($_POST["submit"])){
    echo "Hello"; 
}else{
    header("location:../signup.html");
}