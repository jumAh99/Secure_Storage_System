<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login-style.css">
    <title>LogIn</title>
    <?php REQUIRE_ONCE 'template-html-components/navigation-bar.php'?>
</head>
<body>
    <!-- SECTION FOR THE LOGIN TABLE -->
    <section class="login-form">
        <div class="container">
            <!-- FORM FOR GATHERING USER INFO -->
            <form action="php/login-user.php" method="post">
                <!-- GET USERNAME OR EMAIL -->
                <div class="form-group">
                    <label for="">Eamil/Username</label>
                    <input type="text" name="userName" class="form-control">
                </div>
                <!-- GET PASSWORD -->
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <!-- GET THE INFORMATION AN PROCCESS THE LOGIN -->
                <input type="submit" name="submit" class="submit-button" value="OK">
                <!-- ALLOW THE USER TO REGISTER IF THEY HAVE NOT DO SO -->
                <div class="navigation-link">
                    <p>New here? <a href="signup">Register here</a></p>
                </div>
                <!-- GET THE SCRIPT WITH ALL THE ERROR MESSAGES FOR LOGIN -->
                <?php REQUIRE_ONCE 'template-html-components/login-error-messages.php'?>
            </form>
    </section>
</body>
</html>