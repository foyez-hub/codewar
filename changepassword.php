<?php
session_start();

// Include your database connection code here
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input from the form
    $oldPassword = $_POST['old'];
    $newPassword = $_POST['new_pass'];
    $confirmPassword = $_POST['new_pass_conf'];

    // Retrieve user information from the session
    $userEmail = $_SESSION['user_id'];

    // Fetch user data based on the email
    $sql = "SELECT * FROM user WHERE email = '$userEmail'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $storedPassword = $user['password'];

        // Check if the old password matches the stored password
        if (password_verify($oldPassword, $storedPassword)) {
            // Check if the new password and confirmation match
            if ($newPassword === $confirmPassword) {
                // Hash the new password before updating the database
                $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // Update the password in the database
                $updateSql = "UPDATE user SET password = '$hashedNewPassword' WHERE email = '$userEmail'";
                $conn->query($updateSql);

                echo "Password changed successfully!";
            } else {
                echo "New password and confirmation do not match!";
            }
        } else {
            echo "Old password is incorrect!";
        }
    } else {
        echo "User not found!";
    }

    // Close the database connection
    // Example: $conn->close();
} else {
    // Redirect or handle other cases where the form is not submitted
    echo "Form not submitted!";
}
?>
