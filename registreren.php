<?php
session_start();
require_once "conn.php";

// here we retrieve the typed data and store it in a variable
$username = strip_tags($_POST["username"]);
$email = strip_tags($_POST["email"]);
$password = strip_tags($_POST["password"]);
$dob = strip_tags($_POST["dob"]);

$_SESSION["logged_in_user"] = $username;
$_SESSION["email"] = $email;
//----------------------------------------------------- 


// preparation and execution to check if the email already exists
$sql = "SELECT COUNT(*) AANTAL FROM account WHERE email = :un";
$stmt = $conn->prepare($sql);
$stmt->execute(["un" => $_POST['email']]);
$aantal = $stmt->fetchColumn();
//-----------------------------------------------------

// checks if the account already exists
if ($aantal == 1) {
    header("location: retry_register.php");
} else {
    // this is to put the typed data into the database >>> Note the $hashed_password to better understand the encryption
    $stmt = $conn->prepare("INSERT INTO account(username, email, password, dob) VALUES(:username, :email, :password, :dob)");
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $hashed_password);
    $stmt->bindParam(":dob", $dob);
    //----------------------------------------------------- 

    //for better encryption// // cost 12 = default encryption //
    $password_difficulty = ['difficulty' => 11];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $password_difficulty);
    $stmt->execute();
    header("Location: logged_in_user.php");
    exit();
}
;
//-----------------------------------------------------
?>