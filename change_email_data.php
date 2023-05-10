<?php
session_start();
require_once "conn.php";

// Check if the form has been submitted
if (isset($_POST['email'])) {
    //----------------------------------------------------- 
    
    // Get the current username and password from session and form data
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $new_email = strip_tags($_POST['new_email']);
    //----------------------------------------------------- 

    // Retrieve the hashed password for the given email address
    $sql = "SELECT * FROM account WHERE email = :un";
    $stmt = $conn->prepare($sql);
    $stmt->execute(["un" => $email]);
    $data = $stmt->fetch(PDO::FETCH_OBJ);

    $hashed_password = $data->password;
    $username = $data->username;
    $email = $data->email;
    $id = $data->id;
    //----------------------------------------------------- 

    // Check if the entered password matches the one in the database
    if (password_verify($password, $hashed_password)) {

        // Update the username in the database
        $query = $conn->prepare("UPDATE account SET email = :new_email WHERE email = :un");
        $query->bindParam(":new_email", $new_email);
        $query->bindParam(":un", $email);
        $query->execute();
        //----------------------------------------------------- 

        header("Location: index.php");
        exit();
    } else {
        header("Location: retry_email_change.php");
        exit();
    }
}