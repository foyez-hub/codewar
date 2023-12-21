<?php
session_start();

include('db.php');




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















if (isset($_GET['code'])) {
  // Retrieve the values from the URL parameters
  $code = $_GET['code'];
  $pdid = isset($_GET['pdid']) ? $_GET['pdid'] : null; // Check if pdid is set
  $ptitle = isset($_GET['ptitle']) ? $_GET['ptitle'] : null; // Check if ptitle is set
  
  $sql1 = "SELECT * FROM problemset WHERE problemid = '$pdid'";
  $result1 = $conn->query($sql1);
  
  if ($result1->num_rows > 0) {
      $row = $result1->fetch_assoc();
      
      $output = $row['output'];
      
  }


  $eamil = $_SESSION['user_id'];
  $status = "Accepted";
  $lang = "C++";
  $contestid=$_SESSION['conid'];

  $status = "Accepted";
// echo $output;
// echo $code;
$cnt=0;
if (strlen($output) === strlen($code)) {
  $length = strlen($output);
  $status = "Accepted";  // Assuming they are equal until proven otherwise
  
  for ($i = 0; $i < $length; $i++) {
      if ($output[$i] !== $code[$i]) {
          
          $status = "wrong answer";
          break;  // No need to continue checking once a difference is found
      }
      $cnt++;
      
  }

  
 
} else {
  $status = "wrong answer";  // Different lengths mean different strings
}

$checkSql = "SELECT * FROM `contestsubs` WHERE `email`='$email' AND `status`='$status' AND `pid`='$pdid' AND `code`='$code'";
$result = $conn->query($checkSql);

if ($result->num_rows > 0) {

} else {


  $sql = "INSERT INTO `contestsubs`  (`conid`, `code`, `email`, `status`, `language`, `pid`, `pname`) 
    VALUES ('$contestid','$code', '$eamil','$status', '$lang','$pdid', '$ptitle')";
    if ($conn->query($sql) === TRUE) {
    // echo "Record updated successfully";
} else {
    // echo "Error updating record: " . $conn->error;
}

}

  if($status=="Accepted")
  {

      $sql = "SELECT * FROM `contestsubs` where email='$eamil' ";

      $result = $conn->query($sql);
      
      $row = $result->fetch_assoc();

      $sql2 = "SELECT * FROM `contest` where contestid='$contestid' ";

      $result2 = $conn->query($sql2);
      
      $row2 = $result2->fetch_assoc();  



      $timestamp1 = $row['time'];
      $timestamp2 = $row2['startcontesttime'];


      $date1 = new DateTime($timestamp1);
      $date2 = new DateTime($timestamp2);


      $interval = $date1->diff($date2);


      $minutes = $interval->format('%i');
      $penalty=$minutes;

      $sql3 = "SELECT * FROM `contestrank` where email='$eamil' ";
      $result3 = $conn->query($sql3);
      $row3 = $result3->fetch_assoc(); 

      // echo $row3['solveCount'];


      $sql = "UPDATE contestrank SET penalty = penalty + '$penalty' WHERE email = '$eamil' AND contestid = '$contestid'";
      if ($conn->query($sql) === TRUE) {
    // echo "Record updated successfully";
} else {
    // echo "Error updating record: " . $conn->error;
}



      $sq2 = "UPDATE contestrank SET solveCount = solveCount + 1 WHERE email = '$eamil' AND contestid = '$contestid'";
      
if ($conn->query($sq2) === TRUE) {
    // echo "Record updated successfully";
} else {
    // echo "Error updating record: " . $conn->error;
}
$sq3 = "UPDATE user SET solveCount = solveCount + 1 WHERE email = '$eamil'";
      
if ($conn->query($sq3) === TRUE) {
    // echo "Record updated successfully";
} else {
    // echo "Error updating record: " . $conn->error;
}



    }
  }








  




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LeetCode-like Page</title>
  <style>
    .problem-section {
      margin-bottom: 20px;
    }



    #middiv {
      background-color: #192932;
      float: left;
      width: 70%;
      height: 78%;
      margin-left: 12%;
      margin-top: 5%;
      padding-left: 20px;
      border: 1px solid gray;

    }

    #rightdiv {
      background-color: #192932;
      float: right;
      width: 18%;
      margin-right: 2%;
      height: 70%;
      margin-top: 4%;
      border: 1px solid gray;
    }

    .maindiv {
      background-color: #223742;
      height: 700px;
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

    .submissiontd {
      /* background-color: aqua; */
      width: 98%;
      height: 80%;

    }

    .submissiontd td {
      text-align: center;
      font-size: 25px;
      border: 1px solid white;

    }

    .submissiontd th {
      text-align: center;
      font-size: 25px;
      border: 1px solid white;



    }

    .submissiontd tr {
      text-align: center;
      font-size: 25px;


    }
  </style>
  <style>
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

  </style>
</head>

<body style="background-color:#213742; color:#fff">

  <nav class="navbar navbar-expand-lg ">
    <!-- <a class="nav-link ml-5 mr-5" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->
    <a class="navbar-brand ml-5 mr-5" href="{{url('/')}}"><img src="img/logo.png" width="90" height="50"></a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="{{url('/')}}">HOME</a>
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="{{url('/profile')}}">PROFILE</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{url('/problem')}}#">PROBLEMSET</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{url('/contest')}}">CONTEST</a>
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







  <div class="maindiv">


    <div id="middiv">

      <table class="submissiontd">
        <h2 style="text-align: center;">SUBMISSION STATUS</h2>
        <thead>
          <tr>
            <th>Problem Name</th>
            <th>Language</th>
            <th>Time</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $sql = "SELECT * FROM `contestsubs` WHERE 1 ORDER BY time DESC";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

              echo '<tr>
              <td>' . $row["pname"] . '</td>
              <td>' . $row["language"] . '</td>
              <td>' . $row["time"] . '</td>
              <td style="color: green;">' . $row["status"] . '</td>
            </tr>';
      
          } 
          
        

        }


        $conn->close();
          ?>

          <tr>

            <td>Jellyfish and Hack</td>
            <td>C</td>
            <td>12/7/23 9:00p.m.</td>
            <td style="color: red;">Wrong answer</td>
          </tr>


        </tbody>
      </table>

    </div>


  </div>
</body>

</html>