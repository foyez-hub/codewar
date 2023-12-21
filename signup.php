<?php
include('db.php');  

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
      $fastName = isset($_POST['fastName']) ? $_POST['fastName'] : '';
     $handle = isset($_POST['handle']) ? $_POST['handle'] : '';
     $email = isset($_POST['email']) ? $_POST['email'] : '';
     $password = isset($_POST['password']) ? $_POST['password'] : '';
     $hashed_password = password_hash($password, PASSWORD_DEFAULT);


     $sql = "INSERT INTO user (name, handle, email, password) VALUES ('$fastName', '$handle', '$email', '$hashed_password')";

    
    if ($conn->query($sql) === TRUE) {
        header("Location: login.html"); 
        exit();
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }

    
}



if(isset($error_message)) { ?>
    <div class="alert alert-danger"><?php echo $error_message; ?></div>
<?php } ?>

<?php
$conn->close();
?>
