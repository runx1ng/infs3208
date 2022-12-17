<?php
$servername = "mysql";
$username = "php";
$password = "php";
$dbname = "cloud_computing";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


//
// Check connection
 if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
   }

   return $conn;
  //  echo "SQL connected successfully! <br>";
  //  echo "Server Info: ". mysqli_get_server_info($conn);

  // $sql = "SELECT username from account";
  // $result = mysqli_query($conn, $sql) or die('SQL Error :: '.mysql_error());
  // $row = mysqli_fetch_assoc($result);
  // echo $row['username'];

  //  $sql = "INSERT INTO account(name, username, password, email) VALUES('hello', 'abc', '1234', '123@gmail.com')";
  //  $result = $conn->query($sql);
?>
