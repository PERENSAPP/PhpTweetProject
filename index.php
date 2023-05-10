<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chirpify</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <main>
        <section class="item_container">
            <div>
                <div class="twitter-logo">
                    <a href="index.php"><img src="img/logo.png" alt="logo van twitter" height="55px" width="55px"></a>
                </div>
                <div class="settings">
                    <img src="img/settings.png" alt="instellingen" height="40px" width="40px">
                    <p1></p1>
                </div>
                <div class="hashtag">
                    <img src="img/hashtag.png" alt="hashtag" height="40px" width="40px">
                    <p1></p1>
                </div>
            </div>
        </section>


        <section class="tweet_container">
            <div>
                <?php
                //showing all the tweets
                require_once "conn.php";
                // getting al the tweets from the table tweets and fetching it
                $show_all_tweets = $conn->prepare("SELECT * FROM tweets");
                $show_all_tweets->execute();
                $tweets = $show_all_tweets->fetchAll();

                // show every thing from $tweets as $tweets 1 individual fetched data  
                foreach ($tweets as $tweet) {
                    echo "<div class='tweet-style'>" . "<div class='tweet-username'>" . "User:" . "</div>" . "<br>" . $tweet['title'] . "<br>" . $tweet['content'] . "</div>";
                }
                ?>
            </div>
        </section>

        <section class="button_container">
            <div class="Button">
                <p1 class="inlog-texst">New on Chirpify?</p1>
                <p1 class="intro">Register now and create your own personalized timeline!</p1>
                <a href="login_form.php"><button class='send-message-button'>Login</button></a>
                <a href="register_form.php"><button class='send-message-button'>Register</button></a>
                <div class="voorwaarden">By registering, you are agreeing to the
                    <a href="https://twitter.com/en/tos%22%3EAlgemene">our terms</a>
                    <a href="https://twitter.com/en/privacy%22%3EPrivacybeleid"></a>, including the use of cookies.
                </div>
            </div>
        </section>

    </main>
</body>

</html>