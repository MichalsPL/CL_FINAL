<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php include_once 'src/User.php'; ?>

    </head>
    <body>

        <form method="POST">
            <input type="text" name="login" placeholder="name"/>
            <input type="text" name="email" placeholder="email address"/>
            <input type="password" name="password" placeholder="password"/>    
            <button type="submit">create</button>
            <p class="message">Masz konto <a href="index.php">Zaloguj się</a></p>
            <p class="message" style="color: red; font-size: 14px">
                <?php
                    if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
                        User::addUser($_POST['email'], $_POST['login'],$_POST['password']);
                    }
                ?>
            </p>
        </form>

    </body>
</html>
