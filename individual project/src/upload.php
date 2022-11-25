<!DOCTYPE html>
<html>
<head>
    <title>Upload</title>
    <meta charset="UTF-8">
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>
</head>
<body?>
    <h1>Upload Image</h1>

    <form action="process-upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>
