<?php
session_start();
require_once "conn.php";

// Retrieve the typed data and store it in variables
$title = strip_tags($_POST["title"]);
$content = strip_tags($_POST["content"]);

if (isset($_SESSION["email"])) {
    // fetching data from 1 user where email =  $_SESSION["email"]
    $sql = "SELECT * FROM account WHERE email = :un";
    $stmt = $conn->prepare($sql);
    $stmt->execute(["un" => $_SESSION["email"]]);

    $data = $stmt->fetch(PDO::FETCH_OBJ);
    $username = $data->username;
    $email = $data->email;
    $id = $data->id;

    $_SESSION["id"] = $id;
    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;
    //----------------------------------------------------- 

    // gets the data from the user
    $posting = (strip_tags($_POST["posting"]));
    $not_posting = (strip_tags($_POST["not_posting"]));
    //----------------------------------------------------- 

    // Checks if the form fields are empty if not then post 
    if (isset($posting) && !empty($title) && empty($content)) {
        // Insert the data into the "tweets" table
        $stmt = $conn->prepare("INSERT INTO tweets(title, content, account_id, account_username) VALUES(:title, :content, :account_id, :account_username)");
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":account_id", $id);
        $stmt->bindParam(":account_username", $username);

        $stmt->execute();
        // Redirect the user to the logged in user page
        header("Location: logged_in_user.php");
        exit;
    }
    //----------------------------------------------------- 

    // Checks if the form fields are empty if not then post 
    if (isset($posting) && empty($title) && !empty($content)) {
        // Insert the data into the "tweets" table
        $stmt = $conn->prepare("INSERT INTO tweets(title, content, account_id, account_username) VALUES(:title, :content, :account_id, :account_username)");
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":account_id", $id);
        $stmt->bindParam(":account_username", $username);

        $stmt->execute();
        // Redirect the user to the logged in user page
        header("Location: logged_in_user.php");
        exit;
    }
    //----------------------------------------------------- 

    // Checks if the form fields are empty if not then post 
    if (isset($posting) && !empty($title) && !empty($content)) {
        // Insert the data into the "tweets" table
        $stmt = $conn->prepare("INSERT INTO tweets(title, content, account_id, account_username) VALUES(:title, :content, :account_id, :account_username)");
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":account_id", $id);
        $stmt->bindParam(":account_username", $username);

        $stmt->execute();
        // Redirect the user to the logged in user page
        header("Location: logged_in_user.php");
        exit;
    } else {
        // Redirect the user to the login page if they are not logged in
        header("location:logged_in_user.php");
    }
    ;
    //----------------------------------------------------- 
}
;
?>