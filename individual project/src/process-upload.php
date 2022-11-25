<?php
session_start();
if (isset($_POST['submit']) && isset($_FILES['image'])){
    include "process.php";

    // echo "<pre>";
    // print_r($_FILES['image']);
    // echo "<pre>";

    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

    if ($error === 0){
        if($img_size > 2000000){
            $em = "Sorry, your image size is too big";
            header("Location: upload.php?error=$em");
        }else{
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $lower_case = strtolower($img_ex);

            $allow_ex = array("jpg", "jpeg", "png");

            if(in_array($lower_case, $allow_ex)){
                $new_img_name = uniqid("IMG-", true).'.'.$lower_case;
                $upload_path = 'images/'.$new_img_name;
                // echo exec('whoami');
                move_uploaded_file($tmp_name, $upload_path);

                $mysqli = require __DIR__ . "/process.php";
                // echo $_SESSION["user_id"];
                $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

                $result = $mysqli->query($sql);
                $user = $result->fetch_assoc();
                $username = htmlspecialchars($user['name']);

                $new_sql = "INSERT INTO files(filename, path, username) VALUES('$img_name', '$new_img_name', '$username')";
                mysqli_query($conn, $new_sql);
                header("Location: home.php");
            }else{
                $em = "We do not support this file type";
                header("Location: upload.php?error=$em");
            }
        }
    }else {
        $em = "unknown error occurred";
        header("Location: upload.php?error=$em");
    }

}else {
    header("Location: upload.php");
}
?>