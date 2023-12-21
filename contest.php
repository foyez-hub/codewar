<?php

session_start();
if (!isset($_SESSION['user_id'])){
    // User is logged in, redirect to another page
    header('Location: index.php');
    exit(); 
  }

  
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
    /* CSS for the table */
    .contest-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        /* margin-left:15%; */
    }

    .contest-table th, .contest-table td {
        border: 1px solid #eed6d6;
        padding: 8px;
        text-align: left;
    }

    .contest-table th {
        background-color:transparent;
    }

    /* CSS classes for different contest statuses */
    .status-running {
        color: green;
        font-weight: bold;
    }

    .status-end {
        color: red;
        font-weight: bold;
    }

    /* CSS classes with Harry Potter character names for demonstration */
    .harry-potter {
        font-style: italic;
        color: #555;
    }

    .hermione-granger {
        font-weight: bold;
        color: #800080;
    }

    .ron-weasley {
        text-decoration: underline;
        color: #008080;
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


</style>



    <title>Document</title>

</head>
<body style="background-color:#213742; color:#fff">

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


   

  </div>
</nav>



<table class="contest-table">
    <thead>
        <tr>
            <th>Contest ID</th>
            <th>Contest Name</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM `contest` WHERE 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $color='red';
                if( $row['status'] =="Running"){
                  $color='green';
                }

                echo "<tr>
                <td>" . $row['contestid'] . "</td>

                


                <td>" . $row['Contestname'] . "<a href='contestprobelmset.php?contestid=" . $row['contestid'] . "'>" .  "    Enter</a></td>
                <td style='color:" . $color . ";' class='status-running'>" . $row['status'] . "</td>
            </tr>";
        
        
            }
        }
        ?>

    </tbody>
</table>





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>