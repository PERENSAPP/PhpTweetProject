<?php
session_start();
require_once "conn.php";

// Check if the user is logged in
if (isset($_SESSION["email"])) {

  // 
  $tweet_id = $_POST['tweet_id'];
  $user_id = $_SESSION['account_id'];
  //----------------------------------------------------- 


  // fecting user data / account_id
  $author_id_query = $conn->prepare("SELECT account_id FROM tweets WHERE id = ?");
  $author_id_query->execute([$tweet_id]);

  $author_id = $author_id_query->fetch(PDO::FETCH_COLUMN);
  //----------------------------------------------------- 

  // Checking if the user is the author of the tweet
  if ($author_id == $user_id) {
    $delete_tweet_query = $conn->prepare("DELETE FROM tweets WHERE id = ? AND account_id = ?");
    $delete_tweet_query->execute([$tweet_id, $user_id]);

    header("Location: show_own_tweets.php");
  }
  //----------------------------------------------------- 
}
//----------------------------------------------------- 

?>