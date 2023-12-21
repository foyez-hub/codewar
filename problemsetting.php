<?php
session_start();
$host = "localhost"; // Database host
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "codewar"; // Database name

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $difficulty = $_POST['difficulty'];
    $statement = $_POST['st'];
    $example = $_POST['example'];
    $constraints = $_POST['con'];  

    $sql = "INSERT INTO problemset (title, difficulty, st, example, con) 
            VALUES ('$title', '$difficulty', '$statement', '$example', '$constraints')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("New record created successfully");</script>';
        echo '<script>window.location.href = "problemsetting.html";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
