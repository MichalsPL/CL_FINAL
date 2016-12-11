<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <form method="POST">
                <button type="submit" name="logout" action="#">WYLOGUJ</button>
            </form>
            <form method="POST" action="preferences.php">
                <button type="submit" name="preferences">USTAWIENIA</button><br><br>
            </form>
            <form method="POST">
                <button type="submit" name="show_tweet" value="all">Wyświetl wszystkie Ćwięrknięcia</button>
                <button type="submit" name="show_tweet" value="my">Wyświetl moje Ćwięrknięcia</button><br><br>
                <button type="submit" name="showMessages" value="sended"  >Zobacz wysłane wiadomośći</button>
                <button type="submit" name="showMessages" value="recieved">zobacz odebrane wiadomości </button>
                <button type="submit" name="createMessage">stwórz wiadomość </button>
            </form>
        </div>
        <div>
            <div>

                <form method="POST">
                    <textarea  name="tweet"  maxlength="160" rows="3" cols ="60">
                        ćwierknijcoś
                    </textarea>
                    <button type="submit">Ćwerknij</button>
                </form>
            </div>

            <?php
                include_once 'src/User.php';
                include_once 'src/Preferences.php';
                include_once 'src/Comments.php';
                include_once 'src/Tweet.php';
                include_once 'src/Message.php';

                session_start();
                $tweet = new Tweet;
                $message = new Message;
                $comment = new comments();
                $conn = getDbConnection();
               
                User::checkLoggedUser($conn, $_SESSION['userInputMail'], $_SESSION['hash']);
// creating new tweet
                if (isset($_POST['tweet']) && $_POST['tweet'] != "") {
                    $tweet->createNewTweet($_POST['tweet'], $_SESSION['userId']);
                    $tweet->saveToDB($conn);
                }
// showing all tweets basic
                if (isset($_POST['show_tweet'])) {
                    $show = Tweet::loadTweets($conn, $_SESSION['userId'], $_POST['show_tweet']);
                    Tweet::displayTweetsOnPage($show, $conn);
                }
// showing details of tweet 
                if (isset($_POST['CheckTweet']) && $_POST['CheckTweet'] != "") {
                    $showById = $tweet->loadTweets($conn, ($_POST['CheckTweet']), "tweet");
                    Tweet::displayTweetsOnTweetPage($showById, $conn);
                }
// showing messages basic
                if (isset($_POST['showMessages']) && $_POST['showMessages'] != 'id') {
                    $showM = Message::loadMessages($conn, $_SESSION['userId'], ($_POST['showMessages']));
                    Message::displayMessages($showM, $conn);
                }
// showing form for creating messages if needed
                if (isset($_POST['createMessage'])) {
                    print '<div class="login-page"><div class="form">
                   <form class="login-form" method="POST">
                   <textarea type="text" name="newMessage"placeholder="napisz nową wiadomość "  rows="3" cols ="60"> 
                   </textarea>';
                    if (isset($_POST['TweetCreator'])) {
                        print '<input type="hidden" name="recieverId" value="' . $_POST["TweetCreator"] . '">';
                    } else {
                        print'   <input type="text" name="recieverId" placeholder="odiorca" maxlength="5" >';
                    }
                    print'  <button type="submit">Ćwerknij</button> </form> </div>';
                }
// creating new message 
                if (isset($_POST['newMessage']) && isset($_POST['recieverId'])) {
                    $message->createNewMessage($_POST['newMessage'], $_SESSION['userId'], $_POST['recieverId']);
                    $message->saveMessagetoDB($conn);
                }
// showing details of message 
                if (isset($_POST['showMessages']) && $_POST['showMessages'] == 'id') {
                    $mes = Message::loadMessages($conn, $_POST['displayessage'], $_POST['showMessages']);
                    Message::displayDetailsMessagesOnPage($mes[0], $conn);
                }
// creating new comment
                if (isset($_POST['comment']) && isset($_POST['CheckTweet'])) {
                    $comment->createNewComment($_POST['comment'], $_SESSION['userId'], $_POST['CheckTweet']);
                    $comment->saveCommentToDB($conn);
                }

                if (isset($_POST['logout']) || !isset($_SESSION['userInputMail']) || !isset($_SESSION['hash'])) {
                    logout();
                }

                $conn->close();
                $conn = null;
            ?>

        </div>
    </body>
</html>
