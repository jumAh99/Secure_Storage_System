<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <?php REQUIRE_ONCE 'template-html-components/navigation-bar.php'?>
    <section class="signup-form">
        <form action="php/signup-user.php" method="post">
            <input type="text" name="username" placeholder="Username..">
            <input type="email" name="email" placeholder="Enter Email..">
            <input type="password" name="password" placeholder="Password..">
            <input type="password" name="repeatPassword" placeholder="Type password again..">
            <button type="submit" name="submit">Sign Up</button>
        </form>
    </section>
    <!-- GET THE SCRIPT WITH ALL THE ERROR MESSAGES FOR LOGIH -->
    <?php REQUIRE_ONCE 'template-html-components/signup-error-messages.php'?>>
</body>
</html>