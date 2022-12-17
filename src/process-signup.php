<?php
if (empty($_POST["name"])){
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 6){
    die("Password must be at least 6 characters");
}

if(!preg_match("/[a-z]/i", $_POST["password"])){
    die("Password must contain at least one letter");
}

if ($_POST["password"] !== $_POST["password_confirmation"]){
    die("Passwords must match");
}

$hash_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/process.php";

$sql = "INSERT INTO user (name, email, password)
        VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

$stmt->prepare($sql);

if(!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss", $_POST["name"], $_POST["email"], $hash_password);

if ($stmt->execute()){
    header("Location: signup-success.html");
    exit;
} else {

    if ($mysqli->errno === 1062){
        die("email already exist and signup");
    } else{
        die($mysqli->error . " " . $mysqli->errno);
    }
}
