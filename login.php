<section class="login-form">
    <h2>Login</h2>
    <form action="php/login-user.php" method="post">
        <input type="text" name="userName" placeholder="Username/Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="submit">Login</button>
        <li><a href="signup">Register!</a></li>

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
    </form>
</section>