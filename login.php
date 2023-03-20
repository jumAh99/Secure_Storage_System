<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <?php REQUIRE_ONCE 'template-html-components/navigation-bar.php'?>
</head>
<body>
    <section class="login-form">
            <form action="php/login-user.php" method="post">
                <input type="text" name="userName" placeholder="Username/Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="submit">Log In</button>
            </form>
    </section>
    <!-- GET THE SCRIPT WITH ALL THE ERROR MESSAGES FOR LOGIH -->
    <?php REQUIRE_ONCE 'template-html-components/login-error-messages.php'?>
</body>
</html>