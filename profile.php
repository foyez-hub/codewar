<?php
// Check if a session is already started
if (session_status() == PHP_SESSION_NONE) {
  // If not started, start the session
  session_start();
}

if (!isset($_SESSION['user_id'])){
  // User is logged in, redirect to another page
  header('Location: index.php');
  exit(); 
}

// Rest of your PHP code follows...
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Profile</title>


  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/profile.css">
  <link rel="stylesheet" href="css/navbar.css">
  <style>
    @import url("https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap");

    body {
      background-color: #f8f9fa;
      font-family: 'Lato', sans-serif;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: 'Playfair Display', serif;
      text-align: center;
    }

    .play-font {
      font-family: 'Playfair Display', serif;
    }

    .poppins-font {
      font-family: 'Poppins', sans-serif;
    }

    .lato-font {
      font-family: 'Lato', sans-serif;
    }

    .btn {
      font-family: 'Montserrat', sans-serif;
    }

    .navbar {
      /* background-color: #2b4c0a5c !important; */
      /* color: #ffffff; */
      background-color: #465962;
      /*font-size: 18px;
      padding-bottom: 0px;*/
    }
    .nav-link {
      color: #fff
    }

    .navbar-nav>li {
      margin-right: 50px;
    }
/*
    .navbar-brand {
      font-size: 24px;
      font-weight: bold;
    }

    .navbar-nav a {
      /* color: #ffffff !important; */
      /*font-weight: bold;
      margin-right: 20px;*/
    }
*/
    .card {
      margin-top: 40px;
      border: none;
      border-radius: 10px;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.1);
    }

    .card img {
      border-radius: 10px 10px 0 0;
      height: 200px;
    }

    .card-body {
      padding: 20px;
    }

    .card-title {
      font-weight: bold;
      font-size: 24px;
    }

    .card-text {
      margin-top: 20px;
      color: #6c757d;
      font-size: 18px;
    }

    .card-link {
      margin-top: 20px;
      color: #17a2b8;
      font-size: 18px;
      font-weight: bold;
    }

    .card-link:hover {
      text-decoration: none;
      color: #138496;
    }

    .dropbtn {
      background-color: #04AA6D;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #343a40;
      min-width: 140px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
      border-radius: 5px;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 6px;
      text-decoration: none;
      display: block;
      margin-left: 5px;
    }

    .dropdown-content a:hover {
      background-color: #8aaccc;
      margin-right: 0px;
      border-radius: 5px;
      margin-left: 0px;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown:hover .dropbtn {
      background-color: #3e8e41;
    }

    .dropdown-menu {
      padding: 0;
      min-width: 0;
    }

    .dropdown-menu .dropdown-item {
      background-color: #343a40;
      font-weight: bold;
      font-size: 18px;
    }

    .dropdown-menu .dropdown-item:hover {
      background-color: #8aaccc;
      
    }

    .copy-text {
      margin-top: 30px;
    }

    .sub-menu-wrap {
      position: absolute;
      top: 100%;
      right: 10%;
      width: 250px;
      max-height: 0px;
      overflow: hidden;
      transition: max-height 0.5s;
    }

    .sub-menu-wrap.open-menu {
      max-height: 400px;
    }

    .sub-menu {
      background-color: #343a40;
      padding: 20px 20px 0px;
      margin: 10px 1px;
      z-index: 9999;
      position: relative;
      border-radius: 5px;
    }

    .user-info {
      display: flex;
      align-items: center;

    }

    .user-info h3 {
      font-weight: 400;
      color: black;
      font-size: 25px;
      font-family: sans-serif;
    }

    .user-info h3 a {
      font-weight: 600;

      font-size: 12.5px;
      text-decoration: none;
    }

    .user-info h3 :hover {
      color: aliceblue;
    }

    .user-info img {
      width: 40px;
      border-radius: 50%;
      margin-right: 15px;
    }

    .user-pic {
      width: 40px;
      border-radius: 50%;
      margin-right: 15px;
    }

    .sub-menu hr {
      border: 0;
      height: 1px;
      width: 100%;
      background: #cccccc;
      margin: 10px 0 10px;
    }

    .sub-menu-link {
      display: flex;
      align-items: center;
      color: #f68b1f;
      margin: 15px 0;
      text-decoration: none;

    }

    .sub-menu-link p {
      width: 100%;
    }

    .sub-menu-link:hover p {
      font-weight: 800;
      text-decoration: none;
    }

    .shadow {
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
    }

    .profile-tab-nav {
      min-width: 250px;
    }

    .tab-content {
      flex: 1;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    .nav-pills a.nav-link {
      padding: 15px 20px;
      border-bottom: 1px solid #ddd;
      border-radius: 0;
      color: #333;
    }

    .nav-pills a.nav-link i {
      width: 20px;
    }

    .img-circle img {
      height: 100px;
      width: 100px;
      border-radius: 100%;
      border: 5px solid #fff;
    }

    .navbar {
      background-color: #465962;

    }

    .nav-link {
      color: #fff
    }

    .navbar-nav>li {
      margin-right: 50px;
    }
  </style>
  <style>
    .myprogessbar {
      margin-top: 2%;
      background-color: transparent;
      height: 250px;
      margin-right: 2%;
    }

    .myprogessbar table {
      height: 100%;

    }





    .problem-section {
      margin-bottom: 20px;
    }



    #leftdiv {
      background-color: #192932;
      float: left;
      width: 70%;
      height: 100%;
      margin-left: 3%;
      padding-left: 20px;
      border: 1px solid gray;
    }

    #leftdiv table {
      background-color: transparent;
      width: 98%;
      margin-top: 2%;

    }

    #leftdiv td {

      background-color: rgb(255, 127, 138);
      height: 20px;
      text-align: center;
      font-size: 20px;


    }

    #leftdiv h2 {
      background-color: white;
      color: black;
      text-align: center;


    }

    #rightdiv {
      background-color: #192932;
      float: right;
      width: 25%;
      height: 50%;
      margin-top: 4%;
      border: 1px solid gray;
    }

    .maindiv {
      background-color: transparent;
      height: 550px;
      width: 100%;
      color: white;



    }

    #codearea {
      height: 300px;
      width: 290px;
      margin-left: 1%;
    }

    #codebutton {
      margin-left: 31%;
      color: black;
      width: 100px;
    }

    #codebutton:hover {
      background-color: orange;
    }

    .mainsection {
      /* background-color: aliceblue; */
    }

    #logoutbt {
      background-color: transparent;
      margin-top: 8%;
      border: 2px solid #465962;
      color: white;
      font-size: 18px;
    }

    #logoutbt:hover {
      background-color: #465962;
      color: red;
    }


    #bio {
      background-color: #192932;
      width: 100%;
      height: 100px;
      text-align: center;

    }
  </style>
</head>

<!-- Body Part -->

<body style="background-color:#213742">

  <nav style="margin-top:-0.6%; " class="navbar navbar-expand-lg ">

    <a class="navbar-brand ml-5 mr-5" href=""><img src="img/logo.png" width="90" height="50"></a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="index.php">HOME</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="profile.php">PROFILE</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="problemset.php">PROBLEMSET</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="contest.php">CONTEST</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->

        <?php


        include('db.php');

        if (isset($_POST['logout1'])) {
          // Unset and destroy the session
          session_unset();
          session_destroy();
      
          // Redirect to the index page
          header("Location: index.php");
          exit();
      }


        // Assuming you have sanitized the session data to prevent SQL injection


        if (isset($_SESSION['user_id'])) {

          $userEmail = $_SESSION['user_id'];
          // Fetch user data based on the email
          $sql = "SELECT * FROM user WHERE email = '$userEmail'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // User found
            $user = $result->fetch_assoc();

            // Access user fields
            $name = $user['name'];
            $handle = $user['handle'];
            $email = $user['email'];
            $password = $user['password'];
            $rank = $user['rank'];
            $image = $user['image'];
            $solveCount = $user['solveCount'];


            // Check solveCount and update rank accordingly
            $rankcol='green';
            if ($solveCount <= 3) {
              $newRank = 'Beginner';
            } elseif ($solveCount <= 5) {
              $newRank = 'Expert';
                          $rankcol='blue';

            } elseif ($solveCount <= 10) {
              $newRank = 'Grandmaster';
                          $rankcol='red';

            } else {
              $newRank = 'DefaultRank';
            }

            $updateSql = "UPDATE user SET rank = '$newRank' WHERE email = '$userEmail'";
            $conn->query($updateSql);
            $rank=$newRank;
    
        



            echo '<ul class="navbar-nav">
          <li class="nav-item">
              <span class="nav-link ml-2">' . $handle . '</span>
          </li>
          <li class="nav-item">
              <img style="border-radius: 20px; width: 50px; height: 50px;" src="img/' . $image . '" alt="User Image">
          </li>';
          } else {
            // User not found
            echo "User not found!";
          }
        }

        $conn->close();
        ?>

   <li class="nav-item">
          <form method="post" action="logout.php">
            <button id="logoutbt" type="submit" name="logout">Logout</button>
        </form>
          </li>
      </ul>
    </div>
  </nav>


  <section class="mainsection">
    <div class="container-fluid">

      <div class="bg-white shadow rounded-lg d-block d-sm-flex">
        <div  class="profile-tab-nav border-right" style=" background-color:#192932; color:white; ">
          <div class="p-4">

            <h4 class="text-center"></h4>
          </div>
          <div ;" class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a style="background-color:transparent;color:white;" class="nav-link active<?php //if($pro==true) echo 'active' 
                                      ?>" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
              <i class="fa fa-key  text-center mr-1"></i>

              Profile

            </a>
            <!-- <i class="fa-solid fa-lock"></i> -->
            <a  style="background-color:transparent;color:white;" class="nav-link  <?php //if($pass==true) echo 'active' 
                                ?>" id="seting-tab" data-toggle="pill" href="#seting" role="tab" aria-controls="seting" aria-selected="true">
              <i class="fa fa-user  text-center mr-1"></i>
              Profile Settings
            </a>

            <a style="background-color:transparent;color:white;" class="nav-link  <?php //if($pass==true) echo 'active' 
                                ?>" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="true">
              <i class="fa fa-lock  text-center mr-1"></i>
              Security
            </a>



          </div>
        </div>
        <div class="tab-content p-4 p-md-5" id="v-pills-tabContent" style="background-color:#213742; color:#fff">

          <div class="tab-pane fade show active <?php //if($pro==true) echo 'active' 
                                                ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">





            <div class="maindiv">
              <div id="rightdiv">

                <img style="height:300px; width:100%;" src="img/<?php if (isset($image)) echo $image ?>">
                <h2 id="bio"><?php if (isset($name)) echo $name ?></h2>

                <h5 style="background-color:#192932 ;" >Coding enthusiast exploring new horizons at CodeWar. #CodeWarrior </h3>


              </div>

              <div id="leftdiv">

                <table>

                  <tr>
                    <td style="background-color:#E58D00;
                border: 2px solid yellow;" colspan="2">
                      <h2 style="font-size:20px ;background-color:#E58D00; color:white">ACTIVITIES</h2>
                    </td>
                  </tr>

                  <tr>
                    <td colspan="3" style="background-color:transparent;">
                      <br>
                    </td>
                  </tr>


                  <tr>
                    <td style="background-color:#E58D00;
                color: black;border: 2px solid yellow;">
                      <h3 style="font-size:20px;color:white" >SOLVED</h3>

                    </td>



                    <td style="background-color:#E58D00;
                color: black;border: 2px solid yellow;">
                      <h3 style="font-size:20px ;color:white" >RANK</h3>

                    </td>



                  </tr>



                  <tr>
                    <td style="height:150px;
                background-color: transparent;
                border: 1px solid white;">

                      <h3 style="font-size:20px"  ><?php if (isset($solveCount)) echo $solveCount ?></h3>

                    </td>

                    <td style="height:150px;
                background-color: transparent;
                border: 1px solid white; ">
                      <h3 style="color:<?php if (isset($rankcol)) echo $rankcol ?>; font-size:20px"  ><?php if (isset($rank)) echo $rank ?></h3>

                    </td>
                  </tr>
                </table>

                 <label style="margin-top: 4%;font-size:15px">
                CodeWar invites you to step into the world of competitive programming! Engage in thrilling contests and tournaments, showcasing your coding prowess. Our platform, codewar.com, serves as the battleground where the brightest minds converge. Elevate your skills, learn from peers, and measure your knowledge against the best. Join us in the ultimate coding experience and see how you stand out in the world of CodeWar. Are you
                 ready to code your way to victory? 
                 #CodeWar #CodingCompetition #ProgrammingChallenge</label>




              </div>


            </div>
          </div>


          <div class="tab-pane fade show p-5" style="margin-bottom: 10%; border-style: solid; height:420px; border-color:transparent" id="seting" role="tabpanel" aria-labelledby="seting-tab">
    <div class="p-5">
        <h3 style="margin-right:20%;" class="mb-4">GENERAL SETTING</h3>

        <form action="profileUpdate.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" value="<?php echo $name; ?>" name="fastName" required>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="form-group">
                        <label>Handle</label>
                        <input type="text" class="form-control" value="<?php echo $handle; ?>" name="email" required>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="form-group">
                        <label>Image change</label>
                        <!-- Replace the textarea with an input field of type "file" -->
                        <input type="file" class="form-control-file" name="userImage">
                    </div>
                </div>

                <!-- Add a hidden input field to store the existing image filename -->
                <input type="hidden" name="existingImage" value="<?php echo $image; ?>">

                <div class="col-md-12">
                    <button type="submit" style="margin-left:26%; background-color:#E58D00" class="btn btn-primary">Update Profile</button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="tab-pane fade show p-5" style="padding-left: 50%; width: 70%; background-color:transparent; height: 550px; margin-right: 30%; margin-left: 5%; border-style: solid; border-color: transparent;" id="password" role="tabpanel" aria-labelledby="password-tab">
    <div class="p-5">
        <h3 style="margin-right: 20%; " class="mb-4">Security</h3>

        <form style="align-items: center;" action="changepassword.php" method="POST">
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label>Old password</label>
                        <input type="password" name="old" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label>New password</label>
                        <input type="password" name="new_pass" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password" name="new_pass_conf" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <button style="margin-right: 20%;background-color:#E58D00" type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </div>
        </form>

        <!-- Display feedback message to the user -->
        <?php
        if (isset($_SESSION['password_change_message'])) {
            echo '<div class="alert alert-info mt-3" role="alert">' . $_SESSION['password_change_message'] . '</div>';
            unset($_SESSION['password_change_message']); // Clear the message after displaying
        }
        ?>
    </div>
</div>





        </div>
      </div>
    </div>
  </section>



  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script>
    let subMenuW = document.getElementById("subMenuW");

    function toggleMenu() {
      subMenuW.classList.toggle("open-menu");
    }
  </script>



</body>

</html>