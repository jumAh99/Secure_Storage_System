<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login-style.css">
    <title>Register</title>
</head>
<body>
    <?php REQUIRE_ONCE 'template-html-components/navigation-bar.php'?>
    <section class="signup-form">
        <div class="container">
            
        </div>
    </section>

    <section class="login-form">
        <div class="container">
            <!-- FORM FOR GATHERING USER INFO -->
            <form action="php/signup-user.php" method="post">
                <!-- GET USERNAME OR EMAIL -->
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <!-- GET USER EMAIL -->
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <!-- GET PASSWORD -->
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <!-- GET THE PASSSWORD AGAIN TO MAKE SURE -->
                <div class="form-group">
                    <label for="">Repeat Password</label>
                    <input type="password" name="repeatPassword" class="form-control">
                </div>
                <!-- GET THE INFORMATION TROUGH A SUBMIT INTERACTION -->
                <input type="submit" name="submit" class="submit-button" value="Register">
                <!-- GET THE SCRIPT WITH ALL THE ERROR MESSAGES FOR LOGIH -->
                <?php REQUIRE_ONCE 'template-html-components/signup-error-messages.php'?>
            </form>
        </div>
    </section>
</body>
</html>