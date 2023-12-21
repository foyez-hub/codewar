<?php

if (session_status() == PHP_SESSION_NONE) {
    // If not started, start the session
    session_start();
  }
  

include('db.php');
$userEmail = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input from the form
    $fastName = $_POST['fastName'];
    $email = $_POST['email'];
    $existingImage = $_POST['existingImage']; // Existing image filename

    // Handle image upload
    if ($_FILES['userImage']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'img/'; // Change this to your desired upload directory
        $uploadedFile = $uploadDir . basename($_FILES['userImage']['name']);
        
        // Move the uploaded file to the destination directory
        move_uploaded_file($_FILES['userImage']['tmp_name'], $uploadedFile);

        // Update the image filename if a new image is uploaded
        $newImage = basename($_FILES['userImage']['name']);
    } else {
        // No new image uploaded, keep the existing image
        $newImage = $existingImage;
    }

    // Update user information in the database
    // Example SQL update statement, replace with your actual table and column names
    $sql = "UPDATE user SET name = '$fastName', handle = '$email', image = '$newImage' WHERE email = '$userEmail'";
    
 
    if ($conn->query($sql) === TRUE) {
        // echo "Profile updated successfully!";
        header("Location: profile.php");  
    } else {
        echo "Error updating profile: " . $conn->error;
    }

} else {
    echo "Form not submitted!";
}
?>
