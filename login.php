<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
</head>
<body>
    <section class="login-form">
        <?php REQUIRE_ONCE 'template-util/navigation-bar.php'?>
        <section>
            <form action="php/login-user.php" method="post">
                <input type="text" name="userName" placeholder="Username/Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="submit">Log In</button>
            </form>
        </section>
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
                        //IF THE VALUE IS AN EMPTY INPUT
                        case "invalidCredentials":
                            //PRINT OUT AN HTML PHRAGRAPH THAT CONVEYS THE MISTAKE
                            exit("<p>INCORRECT CREDENTIALS!</p>"); 
                            break; 
                    }
                }
            ?>
        </section>
    </section>
</body>
</html>