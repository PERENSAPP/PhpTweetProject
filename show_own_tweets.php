<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <main>
        <section class="item_container">
            <div>
                <div class="twitter-logo">
                    <a href="logged_in_user.php"><img src="img/logo.png" alt="logo van twitter" height="55px"
                            width="55px"></a>
                </div>
                <div class="settings">
                    <img src="img/settings.png" alt="instellingen" height="40px" width="40px">
                    <a href="change_username.php">
                        <p1>Change username</p1>
                    </a>
                </div>
                <div class="hashtag">
                    <img src="img/hashtag.png" alt="hashtag" height="40px" width="40px">
                    <a href="change_email.php">
                        <p1>Change E-mail</p1>
                    </a>
                </div>
            </div>
        </section>

        <section class="tweet_container">
            <?php
            require_once "conn.php";

            // selecting some data form account to use
            $sql = "SELECT * FROM account WHERE email = :un";
            $stmt = $conn->prepare($sql);
            $stmt->execute(["un" => $_SESSION["email"]]);
            $account_data = $stmt->fetch(PDO::FETCH_OBJ);

            $account_username = $account_data->username;
            $account_email = $account_data->email;
            $account_id = $account_data->id;

            $_SESSION["username"] = $account_username;
            $_SESSION["account_id"] = $account_id;
            $_SESSION["email"] = $account_email;
            //----------------------------------------------------- 
            
            // fetching, preparing and executing to show all tweets
            $show_all_tweets = $conn->prepare("SELECT * FROM tweets WHERE account_id = :un");
            $show_all_tweets->execute(["un" => $_SESSION["account_id"]]);
            $tweets = $show_all_tweets->fetchAll();
            //----------------------------------------------------- 
            
            foreach ($tweets as $tweet) {
                echo
                    "<div class='tweet-style'>" .
                    "<div class='tweet-username'>" .
                    "User:" . " " . $tweet['account_username'] .
                    "</div>" .
                    "<br>" . $tweet['title'] . "<br>" . $tweet['content'] . "<br>" .
                    "<br>" .

                    "<form action='delete_tweet.php' method='POST'>" .
                    "<button name='tweet_id' value='" . $tweet['id'] . "' class='button_like_tweets'>delete tweet</button>" . " " . "if deleted it will be lost for ever" .
                    "</form>" .
                    "</div>";
            }
            ?>
        </section>

        <section class="item_container">
            <div class="Button">
                <p1 class="inlog-texst">Tweet.</p1>
                <p1 class="intro">Maak een tweet en deel je mening<span class="tweet-username">
                        <?php echo $_SESSION["username"] ?>
                    </span></p1>
                <a href="logged_in_user.php"><button class='send-message-button'>Home page</button></a>
                <button class='send-message-button' onclick=logout()>Logout</button>
                <p1 class="intro">Logged in user:
                    <?php echo $_SESSION["username"] ?>
                </p1>
            </div>
        </section>
    </main>
    <script src="main.js"></script>
</body>
</html>