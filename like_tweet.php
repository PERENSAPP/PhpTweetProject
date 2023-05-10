<?php
session_start();
require_once "conn.php";

// is getting account ID of the logged in user from the session
$account_id = $_SESSION["account_id"];
//----------------------------------------------------- 

// checks if the logged in user has liked a tweet
if (isset($_POST['likes'])) {
    // gets the ID of the tweet from the tweets table wich the user wants to like
    $tweet_id = strip_tags($_POST['likes']);
    //----------------------------------------------------- 

    // is selecting all from likes en if from the user that wants to like the tweets 
    $stmt = $conn->prepare("SELECT * FROM likes WHERE account_id = :account_id AND tweet_id = :tweet_id");
    $stmt->bindParam(":account_id", $account_id);
    $stmt->bindParam(":tweet_id", $tweet_id);
    $stmt->execute();
    $liked = $stmt->fetchAll();
    //----------------------------------------------------- 

    // checks if the logged in user has already liked the tweet
    if (count($liked) == 0) {
        // if the user has not liked the tweet then it will update the tweets table and adds a like 
        $query = $conn->prepare("UPDATE tweets SET likes = likes + 1 WHERE id = :id");
        $query->bindParam(":id", $tweet_id);
        $query->execute();
        //----------------------------------------------------- 

        // it will also insert te new data into likes 
        $query = $conn->prepare("INSERT INTO likes (account_id, tweet_id) VALUES (:account_id, :tweet_id)");
        $query->bindParam(":account_id", $account_id);
        $query->bindParam(":tweet_id", $tweet_id);
        $query->execute();
        //----------------------------------------------------- 
    }
    header("Location: logged_in_user.php");
}
?>