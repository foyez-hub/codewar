
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        .navbar{
            background-color:#465962;
            
        }
        .nav-link{
            color:#fff
        }
        .navbar-nav > li{
            margin-right:50px;
        }
        .indexPageLeft{
            
          /* background-image:url({{url('frontend/img/indximg.png')}}) */
        }

    </style>

<style>
 


 .navbar-nav.profile {
    display: flex;
    align-items: center;
  }

  .navbar-nav.profile img {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin-right: 5px;
  }

  .navbar-nav.profile .nav-link {
    display: flex;
    align-items: center;
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


</style>

    
    <title>Document</title>

</head>
<body style="background-color:#213742; color:#fff">

  <nav class="navbar navbar-expand-lg">

    <a class="navbar-brand ml-5 mr-5" href=""><img src="img/logo.png" width="90" height="50"></a>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="">HOME</a>
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
      
      <!-- New profile section -->
  
      
      <!-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      </form> -->


      <?php
session_start();

include('db.php');




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
    
    echo '<ul class="navbar-nav">
    <li class="nav-item">
        <span class="nav-link ml-2">' . $handle . '</span>
    </li>
    <li class="nav-item">
        <img style="border-radius: 20px; width: 50px; height: 50px;" src="img/' . $image . '" alt="User Image">
    </li>
    <li class="nav-item">
        <form method="post" action="logout.php">
            <button id="logoutbt" type="submit" name="logout">Logout</button>
        </form>
    </li>
</ul>';

} else {
    // User not found
    echo "User not found!";
}

}

$conn->close();
?>
    
    </div>
  </nav>



  

<div class="p-1">
    <h1 style="font-size: 2.2rem; width:40%;text-align:center; margin-left:46% ;margin-top: 2%;" class="text-right pr-5">WELCOME TO CODEWAR</h1>
    <div class="container-fluid">
  <div class="row indexPageLeft">
    <div class="col-sm ">
      <img style="width: 700px;height:500px;float:left;" class="ml-5 mt-5"src="img/final.png" alt="">
    </div>
    <div class="col" >
      <h4 class="mt-5 ml-5 pr-5" style="color:#fcca6c;
      text-align: center;margin-right:20%;">Start your coding journey today</h4>
      <p style="margin-right:6%;" class="ml-5 pr-5">CodeWar is the best platform to help you enhance coding skills, expand your knowledge.<br>
      Sharpen your problem-solving mastery with CodeWar: the epicenter of relentless competition for fierce problem solvers. Immerse yourself in high-stakes battles designed to push the limits of your skills. Whether you're a problem-solving virtuoso or a battle-tested expert, CodeWar is the ultimate arena for champions. It's not just a platform; it's a relentless pursuit of excellence. Unleash your strategic genius, dominate your rivals, and thrive in an environment that breeds champions. Join CodeWar – where the best compete, and only the strongest emerge victorious. Are you prepared to conquer the challenges?
    </p>

    <?php

      if (!isset($_SESSION['user_id'])) {

      echo '<div style="margin-right: 20%;"  class="text-center p-3">

        <a style="background-color:#E58D00" type="button" class="btn btn-primary m-3 pl-5 pr-5" href="login.html">Login</a>
        <a style="background-color:#E58D00" type="button" class="btn btn-primary pl-5 pr-5" href="signup.html">SignUp</a>
      </div>';


      }

      ?>


    </div>
  </div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>