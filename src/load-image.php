<?php

session_start();
// echo $_GET['value'];
$_SESSION['new_path'] = $_GET['value'];
if (isset($_SESSION['new_path'])){

    // echo $_SESSION['new_path'];
    $path1 = $_SESSION['new_path'];
    $_SESSION["new_path"] = null;
    unset($_SESSION['new_path']);
    session_write_close();
    $mysqli = require __DIR__ . "/process.php";
    // echo $_SESSION["user_id"];
    $sql = "SELECT * FROM files WHERE path = '$path1'";
    $result = $mysqli->query($sql) or die($mysqli->error);
    // echo "number of rows: " . $mysqli_query->num_rows;
    $pathResult = $result->fetch_assoc();
    // echo $pathResult['path'];

    // $path = $result->fetch_assoc();
    
    // echo $_SESSION['new_path'];
}

if(isset($_POST['post_comment'])){

    $mysqli = require __DIR__ . "/process.php";

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    // echo $_SESSION['user_id'];

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
    $username = $user["name"];

    // echo $username;

    $message = $_POST['comment'];
    // echo $message;
    $comment_path = $_GET['value'];
    // echo $comment_path;
    $sql1 = "INSERT INTO comment (path, comment_username, comment) VALUES ('$comment_path', '$username', '$message')";

    $new_result = $mysqli->query($sql1);
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Image</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-image: linear-gradient(to right, #ECE9E6 0%, #FFFFFF  51%, #ECE9E6  100%);">
    <h1><?=$pathResult['filename']?></h1>

        <button class="back"><a href="home.php">Back</a></button>
        <p>Uploader: <?=$pathResult['username']?></p>
        <img src="images/<?=$pathResult['path']?>" class="img_border">
        <p class="comments">Comments:</p>
        <?php

            $img_path = $_GET['value'];
            // echo $img_path;
            $sql2 = "SELECT * FROM comment WHERE path = '$img_path'";
            $comment_result = $conn->query($sql2);
            
            if($comment_result->num_rows > 0){
                while($row = $comment_result->fetch_assoc()){
                    echo "<p class='comment'>" . $row['comment_username'] . ": " . $row['comment'] . "</p>";
                    echo "<p></p>";
                }
            }

        ?>
        <br>
        <br>
        <form class="comment_form" action="" method="post">
            <input type="text" name="comment">
            <button class="comment_btn" type="submit" name="post_comment">Post</button>
        </form>        
</body>
</html>