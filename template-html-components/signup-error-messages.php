<section>
    <!--ERROR MESSAGES WHEN SOMETHING GOES WRONG!-->
    <?php
        //IF ERROR MESSAGE EXISTS IN THE URL
        if(isset($_GET["error"])){
            //WHAT THE ERROR MESSAGE VALUE IS 
            switch($_GET["error"]){
                //IF THE VALUE IS AN EMPTY INPUT
                case "emptyInput":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("<p>YOU HAVE MISSED SOMETHING!</p>"); 
                    break; 
                //IF THE USERNAME IS IN A INVALID FORMAT
                case "invalidUsername":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("<p>THE USERNAME IS IN AN INCORRECT FORMAT!</p>");
                    break; 
                //IF THE EMAIL IS IN A INVALID FORMAT
                case "invalidEmail":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("<p>INVALID EMAIL!</p>");
                    break; 
                //IF THE USERNAME IS IN A INVALID FORMAT
                case "passwordDoNotMatch":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("<p>THE PASSWORD DOES NOT MATCH!</p>");
                    break; 
                //IF THE USERNAME IS IN A INVALID FORMAT
                case "userAlreadyExists":
                    //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                    exit("<p>THE USERNAME OR EMAI ALREDY EXISTS!</p>");
                    break; 
                case "stmtFailed":
                    //THIS ERROR MESSAGE IS TOO TECHINCAL FOR THE USER TO KNOW
                    exit("<p>SOMETHING WENT WRONT!</p>");
                    break;
                //IF THERE IS NO ERROR MESSAGES  
                case "none":
                    //THIS ERROR MESSAGE IS TOO TECHINCAL FOR THE USER TO KNOW
                    exit("<p>LOGIN SUCCESSFUL!</p>");
                    break; 
            }
        }
    ?>
</section