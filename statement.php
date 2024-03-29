<?php
session_start();



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "codewar";

$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}




$userEmail = $_SESSION['user_id'];
// Fetch user data based on the email
$sql = "SELECT * FROM user WHERE email = '$userEmail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // User found
  $user = $result->fetch_assoc();


  $name = $user['name'];
  $handle = $user['handle'];
  $email = $user['email'];
  $password = $user['password'];

  $rank = $user['rank'];

  $image = $user['image'];

  $solveCount = $user['solveCount'];
}


?>





<!DOCTYPE html>


<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Problem Statement</title>
  <style>
    .navbar {
      background-color: #465962;

    }

    .nav-link {
      color: #fff
    }

    .navbar-nav>li {
      margin-right: 50px;
    }

    .indexPageLeft {
      /* background-image:url({{url('frontend/img/indximg.png')}}) */
    }
  </style>

  <style>
    .problem-section {
      margin-bottom: 20px;
      /* background-color: #fff; */
    }



    #leftdiv {
      /* background-color: green; */

      background-color: #192932;
      float: left;
      width: 70%;
      height: 600px;
      margin-left: 5%;
      padding-left: 20px;
      border: 1px solid gray;
      margin-top: 1%;

    }

    #rightdiv {
      /* background-color: red; */
      background-color: #192932;

      float: right;
      width: 20%;
      margin-right: 2%;
      height: 90%;
      margin-top: 2%;
      border: 1px solid gray;
    }

    .maindiv {
      background-color: #223742;
      /* background-color: green; */

      height: 650px;
      width: 100%;
      color: white;



    }

    #codearea {
      height: 40%;
      width: 98%;
      margin-left: 1%;
    }

    #codebutton {
      margin-left: 31%;
      color: black;
      width: 100px;
      background-color: orange;
      height: 30px;
    }
    #runbutton {
      margin-left: 31%;
      color: black;
      width: 100px;
      background-color: orange;
      height: 30px;
    }

    #codebutton:hover {
      background-color: orange;
    }

    /* navbar start */
    .navbar {
      background-color: #465962;
      /* border: 5px solid red; */
      /* margin-bottom:10%; */


    }

    .nav-link {
      color: #fff
    }

    .navbar-nav>li {
      margin-right: 50px;
    }

    .indexPageLeft {

      /* background-image:url({{url('frontend/img/indximg.png')}}) */
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

    /* navbar start end */

    .popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 20px;
      background-color: #223742;
      border: 1px solid #ccc;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      z-index: 1000;
      color: white;
    }

    #closeButton {
      margin-top: 10px;
      cursor: pointer;
      background-color: #E58D00;
    }
    #output{
      height:25%;
      width: 100%;
      
    }

  </style>
</head>

<body style="background-color:#213742; color:#fff">






  <?php


  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "codewar";

  $conn = new mysqli($servername, $username, $password, $dbname);

  ?>

  <?php



  if (isset($_GET['problemid'])) {
    $problemid = $_GET['problemid'];
  } else {
    echo "Problem ID not provided in the URL.";
  }


  $sql = "SELECT * FROM `problemset` WHERE problemid=$problemid";
  $result = $conn->query($sql);

  ?>

  <nav class="navbar navbar-expand-lg ">

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
        <!-- <button class="btn  my-2 my-sm-0" type="submit">Search</button> -->
      </form>

      <!-- new nav bar start -->



      <ul class="navbar-nav">
        <li class="nav-item">
          <span class="nav-link ml-2"><?php echo $handle; ?></span>
        </li>
        <li class="nav-item">
          <img style="border-radius: 20px; width: 50px; height: 50px;" src="img/<?php echo $image; ?>" alt="User Image">
        </li>
        <li class="nav-item">
          <form method="post" action="logout.php">
            <button id="logoutbt" type="submit" name="logout">Logout</button>
          </form>
        </li>
      </ul>

      <!-- new nav bar start end -->
    </div>
  </nav>

  <?php

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<div class="maindiv">

      <div id="rightdiv">

      <form id="cppForm" enctype="multipart/form-data">

        <h2 style="text-align: center">Solution</h2>
        <input type="hidden" id="problemid" value="' . $row['problemid'] . '">
        <input type="hidden" id="problemname" value="' . $row['title'] . '">
        <textarea name="cppCode" value="nocode" id="codearea" placeholder="Write your code here..."></textarea

        <label for="cppFile">or Upload C++ File:</label>

        <input type="file" name="cppFile" id="cppFile" accept=".cpp"><br>
        <button id="runbutton" type="button" onclick="runCode()">Run Code</button>

    </form>


    <br>

    <label>Output</label>
    <textarea id="output" >hello </textarea>
    <button id="codebutton">

    Submit

</button>

      </div>


      

      <div id="leftdiv">
        <div class="problem-section" id="problem-description">';
      echo '<h2>' . $row['title'] . '</h2>';
      echo '<p>' . $row['st'] . '
            
          </p>';
      echo '</div>

        <div class="problem-section" id="problem-examples">
          <h2>Examples</h2>
          <!-- <p>Provide examples to illustrate the problem.</p> -->
          <!-- <pre> -->
            <label>' . $row['example'] . '</label>';

            
      echo '
        </div>

        <div style="width:90%;" class="problem-section" id="problem-constraints">
          <h2>Constraints</h2>' . '
          <!-- <p>State any constraints or limitations for the problem.</p> -->
          <ul>' .


        $row['con']

        . '</ul>
          
          <a style="float:right;margin-bottom:20%;color:black; background-color:#E58D00"  href="text/'.$row['testcase'].'" download="1.txt">Download Test Cases</a>
          <button style="margin-left:75%;color:black; background-color:#E58D00" id="helpButton">Help</button>
          <div  id="infoPopup" class="popup">
    <p>'.$row['help'].'</p>
    <button id="closeButton">Close</button>
    



  </div>
        </div>
           
       

      </div>
    </div>';
    }
  }

  ?>



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function runCode() {
            var formData = new FormData($('#cppForm')[0]);

            $.ajax({
                url: 'run_cpp.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#output').html(response);
                }
            });
        }
    </script>





  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var helpButton = document.getElementById('helpButton');
      var infoPopup = document.getElementById('infoPopup');
      var closeButton = document.getElementById('closeButton');

      helpButton.addEventListener('click', function() {
        infoPopup.style.display = 'block';
      });

      closeButton.addEventListener('click', function() {
        infoPopup.style.display = 'none';
      });
    });


    // Wait for the DOM to be ready
    document.addEventListener("DOMContentLoaded", function() {
      // Get the textarea and submit button elements
      var codearea = document.getElementById("codearea");
      var codebutton = document.getElementById("codebutton");

      // Add a click event listener to the submit button
      codebutton.addEventListener("click", function() {
        var codeValue = codearea.value;

        var encodedCode = encodeURIComponent(codeValue);

        var pdidValue = document.getElementById("problemid").value;
        var ptitleValue = document.getElementById("problemname").value;

        var submitUrl = 'submit.php?code=' + encodedCode + '&pdid=' + pdidValue + '&ptitle=' + ptitleValue;


        window.location.href = submitUrl;
      });
    });
  </script>

  

</body>

</html>