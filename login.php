<?php
session_start();
require_once "conn.php";

$email = strip_tags($_POST["email"]);
$password = strip_tags($_POST["password"]);

// gets the hashed password from the table account 
$sql = "SELECT * FROM account WHERE email = :un";
$stmt = $conn->prepare($sql);
$stmt->execute(["un" => $email]);
$data = $stmt->fetch(PDO::FETCH_OBJ);

$hashed_password = $data->password;
$username = $data->username;
$email = $data->email;
$id = $data->id;

//----------------------------------------------------- 

if (!$data) {
    // User is not found
    header("location: retry_login.php");
    exit;
}
if (password_verify($password, $hashed_password)) {
    // If the password is correct 
    $_SESSION["logged_in_user"] = $username;
    $_SESSION["username"] = $username;
    $_SESSION["id"] = $id;
    $_SESSION["email"] = $email;
    header("location: logged_in_user.php");
    exit;
} else {
    // This is if the typed in password is incorrect
    header("location: retry_login.php");
    exit;
}
?>