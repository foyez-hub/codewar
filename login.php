
<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($email=="admin@admin" && $password=="admin"){
        header("Location: admin.php");


    }
    else{

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $hashed_password = $user['password'];

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user['email'];  
            header("Location: index.php");  
            exit();
        } else {
            $error_message = "Invalid email or password";
        }
    } else {
        $error_message = "Invalid email or password";
    }

}

}
?>

<?php if(isset($error_message)) { ?>
    <div class="alert alert-danger"><?php echo $error_message; ?></div>
<?php } ?>
