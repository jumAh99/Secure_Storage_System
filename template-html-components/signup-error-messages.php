<section class="error-messages">
    <!--ERROR MESSAGES WHEN SOMETHING GOES WRONG!-->
    <?php
        //IF ERROR MESSAGE EXISTS IN THE URL
        if(isset($_GET["error"])){
            //WHAT THE ERROR MESSAGE VALUE IS 
            switch($_GET["error"]){
                //IF THE VALUE IS AN EMPTY INPUT
                case "emptyInput":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    echo("<p>OPS, YOU HAVE MISSED SOMETHING!</p>"); 
                    break; 
                //IF THE USERNAME IS IN A INVALID FORMAT
                case "invalidUsername":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    echo("<p>OPS, THE USERNAME IS IN AN INCORRECT FORMAT!</p>");
                    break; 
                //WRONG EMAIL FORMAT
                case "invalidEmail":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    echo("<p>OPS, THAT EMAIL DOESNT LOOK RIGHT!</p>"); 
                    break;  
                //IF THE USERNAME IS IN A INVALID FORMAT
                case "passwordDoNotMatch":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    echo("<p>OPS, THE PASSWORD DOES NOT MATCH!</p>");
                    break; 
                //IF THE PASSSWORD SECUIRYT IS POOR
                case "pwdPoorSecuirity":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    echo("<p>THE PASSWORD MUST BE 8 CHARACTERS LONG, 1 UPPER CASE, 1 NUMBER, 1 SPECIAL CHARACTER</p>");
                    break;
                //IF THE USERNAME IS IN A INVALID FORMAT
                case "userAlreadyExists":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    echo("<p>OPS, THE USERNAME OR EMAIL ALREADY EXISTS!</p>");
                    break; 
                case "stmtFailed":
                    //THIS ERROR MESSAGE IS TOO TECHINCAL FOR THE USER TO KNOW
                    echo("<p>OPS, SOMETHING WENT WRONT!</p>");
                    break;
                //IF THERE IS NO ERROR MESSAGES  
                case "none":
                    //THIS ERROR MESSAGE IS TOO TECHINCAL FOR THE USER TO KNOW
                    echo("<p>OPS, LOGIN SUCCESSFUL!</p>");
                    break; 
            }
        }
    ?>
</section