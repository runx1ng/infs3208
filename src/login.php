<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__ . "/process.php";

    $sql = sprintf("SELECT * FROM user 
                    WHERE email = '%s'",
                    $mysqli->real_escape_string($_POST["email"]));
    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if($user){

        if (password_verify($_POST["password"], $user["password"])){
            
            session_start();

            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];

            header("Location: home.php");
            exit;
        }
    }
    $is_invalid = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src = "js/javascript.js" type = "text/javascript"></script>
</head>
<body>
    <h1 class="login_title">Login</h1>

    <?php if ($is_invalid): ?>
        <em class="invalid">Invalid login: Please check your email and password is correct</em>
    <?php endif; ?>

    <form class="login_form" method="post">
        <div class="data">
        <label for="email">email</label>
        <input id="email" type="email" name="email" id="email"
                value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        </div>
        <div class="data">
        <label for="password">password</label>
        <input id="password" type="password" name="password" id="password">
        </div>
        <button id="login">Login</button>
        <div class="signup">Don't have an account? <a href="signup.html">Signup Now</a></div>
    </form>
</body>
</html>
