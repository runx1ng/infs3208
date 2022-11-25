<?php

session_start();

if (isset($_SESSION["user_id"])){

    $mysqli = require __DIR__ . "/process.php";

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <style>
        body{
            /* background-image: linear-gradient(to right, #ECE9E6 0%, #FFFFFF  51%, #ECE9E6  100%); */
            background-image: linear-gradient(to right, #E0EAFC 0%, #CFDEF3  51%, #E0EAFC  100%);
        }

        h1{
            text-align: center;
        }

        .welcome{
            text-align: center;
        }

        .upload{
            text-align: center;
        }

        .upload a{
            text-transform: uppercase;
            font-weight: bold;
            color: #800080;
        }

        .logout{
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
        }

        .select{
            text-align: center;
        }

        .select a{
            font-weight: bold;
        }

        .pic{
            display: flex;
            flex-flow: wrap;
            margin-left: 50px;
            margin-right: 50px;
        }

        .pic img{
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }

        a{
            text-decoration: none;
            color: black;
        }

        .pic div{
            width: 200px;
            height: 200px;
            padding: 10px;
        }

        .img_name{
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            text-align: center;
            display: block;
        }
    </style>
</head>
<body>
    <h1>Home</h1>

    <?php if (isset($user)): ?>
        <p class="welcome">Welcome <?= htmlspecialchars($user["name"]) ?></p>
        <p class="upload"><a href="upload.php">Upload</a></p>
        <div class="pic">
        <?php
            $sql = "SELECT * FROM files ORDER BY id DESC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0){
                while ($images = mysqli_fetch_assoc($result)){ ?>

                        <div>
                        <span><a class="img_name" href="load-image.php?value=<?=$images['path']?>"><?=$images['filename']?></a><span>
                        <img src="images/<?=$images['path']?>">
                        </div>
                    
        <?php } } ?>
        </div>
        <?php echo $_SESSION["new_path"]; ?>
        
        
        <p class="logout"><a href="logout.php">Logout</a></p>
    <?php else: ?>

        <p class="select"><a href="login.php">Login</a> or <a href="signup.html">sign up</a></p>

    <?php endif; ?>
</body>
</html>