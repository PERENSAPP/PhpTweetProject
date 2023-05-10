<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Chirpify - Change username </title>
    <link rel="stylesheet" href="create_account.css">
</head>

<body>

    <main>
        <div class="contact-box">
            <form class="form-box" action="change_username_data.php" method="POST">
                <H1>Change username.</H1>
                <input type="text" class="input-field" placeholder="New username" name="new_username" required>
                <input type="email" class="input-field" placeholder="Email" name="email" required>
                <input type="password" class="input-field" placeholder="Password" name="password" required>
                <input type="submit" class="button-styling-login"  name="change_username" value="change_username">
            </form> 
        </div>
    </main>

</body>
</html>