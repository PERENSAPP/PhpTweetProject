<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Chirpify - Register </title>
    <link rel="stylesheet" href="create_account.css">
</head>

<body>
    <main>
        <div class="contact-box">
            <form class="form-box" action="registreren.php" method="POST">
                <H1>Create account.</H1>
                <input type="text" class="input-field" placeholder="Username" name="username" id="username" autofocus>
                <input type="email" class="input-field" placeholder="Email" name="email" required>
                <input type="password" class="input-field" placeholder="Password" name="password" required>
                <input type="date" class="input-field" id="dob" name="dob" required>
                <input type="submit" class="button-styling-register" value="Create account">
            </form> 
        </div>
    </main> 
</body>
</html> 