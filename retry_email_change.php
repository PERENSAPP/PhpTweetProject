<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Chirpify - retry change email </title>
    <link rel="stylesheet" href="create_account.css">
</head>
<body>
    <main>
        <div class="contact-box">
            <form class="form-box" action="change_email_data.php" method="POST">
                <H1>Change email.</H1>
                <input type="email" class="input-field" placeholder="New email" name="new_email" required>
                <input type="email" class="input-field" placeholder="Old email" name="email" required>
                <input type="password" class="input-field" placeholder="Password" name="password" required>
                <input type="submit" class="button-styling-login" name="change_email" value="change email">
                <p1>retry changing E-mail</p1>
            </form> 
        </div>
    </main>

</body>
</html>