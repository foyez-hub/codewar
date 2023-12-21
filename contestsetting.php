

?>

<?php
session_start();
$host = "localhost"; // Database host
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "codewar"; // Database name

$conn = new mysqli($host, $username, $password, $dbname);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $contestTitle = $_POST["title"];
    // echo $contestTitle;
    $startTime = $_POST["start_time"];
    // echo $startTime;

    $endTime = $_POST["end_time"];

    $problemIDs = $_POST["problem_ids"];

$sql = "INSERT INTO `contest` (`startcontesttime`, `endcontesttime`, `Contestname`, `problemid`) 
        VALUES ('$startTime', '$endTime', '$contestTitle', '$problemIDs')";



    if ($conn->query($sql) === TRUE) {
        // echo "Contest setting saved successfully";
        echo '<script>alert("New record created successfully");</script>';
        echo '<script>window.location.href = "contestsetting.html";</script>';
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
