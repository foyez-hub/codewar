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
		body {
			margin-top: 10px;
		}


		/* USER LIST TABLE */
		.user-list tbody td>img {
			position: relative;
			max-width: 50px;
			float: left;
			margin-right: 15px;
		}

		.user-list tbody td .user-link {
			display: block;
			font-size: 1.25em;
			padding-top: 3px;
			margin-left: 60px;
		}

		.user-list tbody td .user-subhead {
			font-size: 0.875em;
			font-style: italic;
		}

		/* TABLES */
		.table {
			border-collapse: separate;
			background-color:transparent;
			font-size: 17px;


		}

		.table-hover>tbody>tr:hover>td,
		.table-hover>tbody>tr:hover>th {
			background-color: #eee;
		}

		.table thead>tr>th {
			border-bottom: 1px solid #C2C2C2;
			padding-bottom: 0;

		}

		.table tbody>tr>td {
			font-size: 15px;
			background: transparent;
			/* border-top: 10px solid #fff; */
			vertical-align: middle;
			padding: 12px 8px;


		}

		.table tbody>tr>td:first-child,
		.table thead>tr>th:first-child {
			padding-left: 20px;
		}

		.table thead>tr>th span {
			border-bottom: 2px solid #C2C2C2;
			display: inline-block;
			padding: 0 5px;
			padding-bottom: 5px;
			font-weight: normal;
		}

		.table thead>tr>th>a span {
			color: #344644;
		}

		.table thead>tr>th>a span:after {
			content: "\f0dc";
			font-family: FontAwesome;
			font-style: normal;
			font-weight: normal;
			text-decoration: inherit;
			margin-left: 5px;
			font-size: 0.75em;
		}

		.table thead>tr>th>a.asc span:after {
			content: "\f0dd";
		}

		.table thead>tr>th>a.desc span:after {
			content: "\f0de";
		}

		.table thead>tr>th>a:hover span {
			text-decoration: none;
			color: #2bb6a3;
			border-color: #2bb6a3;
		}

		.table.table-hover tbody>tr>td {
			-webkit-transition: background-color 0.15s ease-in-out 0s;
			transition: background-color 0.15s ease-in-out 0s;
		}

		.table tbody tr td .call-type {
			display: block;
			font-size: 0.75em;
			text-align: center;
		}

		.table tbody tr td .first-line {
			line-height: 1.5;
			font-weight: 400;
			font-size: 1.125em;
		}

		.table tbody tr td .first-line span {
			font-size: 0.875em;
			color: #969696;
			font-weight: 300;
		}

		.table tbody tr td .second-line {
			font-size: 0.875em;
			line-height: 1.2;
		}

		.table a.table-link {
			margin: 0 5px;
			font-size: 1.125em;
		}

		.table a.table-link:hover {
			text-decoration: none;
			color: #2aa493;
		}

		.table a.table-link.danger {
			color: #fe635f;
		}

		.table a.table-link.danger:hover {
			color: #dd504c;
		}

		.table-products tbody>tr>td {
			background: none;
			border: none;
			border-bottom: 1px solid #ebebeb;
			-webkit-transition: background-color 0.15s ease-in-out 0s;
			transition: background-color 0.15s ease-in-out 0s;
			position: relative;
		}

		.table-products tbody>tr:hover>td {
			text-decoration: none;
			background-color: #f6f6f6;
		}

		.table-products .name {
			display: block;
			font-weight: 600;
			padding-bottom: 7px;
		}

		.table-products .price {
			display: block;
			text-decoration: none;
			width: 50%;
			float: left;
			font-size: 0.875em;
		}

		.table-products .price>i {
			color: #8dc859;
		}

		.table-products .warranty {
			display: block;
			text-decoration: none;
			width: 50%;
			float: left;
			font-size: 0.875em;
		}

		.table-products .warranty>i {
			color: #f1c40f;
		}

		.table tbody>tr.table-line-fb>td {
			background-color: #9daccb;
			color: #262525;
		}

		.table tbody>tr.table-line-twitter>td {
			background-color: #9fccff;
			color: #262525;
		}

		.table tbody>tr.table-line-plus>td {
			background-color: #eea59c;
			color: #262525;
		}

		.table-stats .status-social-icon {
			font-size: 1.9em;
			vertical-align: bottom;
		}

		.table-stats .table-line-fb .status-social-icon {
			color: #556484;
		}

		.table-stats .table-line-twitter .status-social-icon {
			color: #5885b8;
		}

		.table-stats .table-line-plus .status-social-icon {
			color: #a75d54;
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
	<title>Problemset</title>
</head>

<body style="background-color:#213742; color:#fff">





	<nav style="margin-top:-0.6%" class="navbar navbar-expand-lg ">

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


	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="main-box clearfix">
					<div class="table-responsive">
						<table style="margin-top:2%; " class="table user-list">
							<thead>
								<tr>
									<th style="text-align: center;">ID</th>
									<th></th>
									<th>Title</th>
									<th>Difficulty</th>
								</tr>
							</thead>






							<tbody>
								<?php
								// Check if there are rows in the result
								$sql = "SELECT * FROM `problemset` WHERE 1";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {
										$col='green';
										if($row['difficulty']=="Medium"){
											$col='yellow';

										}
										else if($row['difficulty']=="Hard"){
											$col='red';
										}

										echo '<tr>';

										echo '<td class="text-center" style="width: 18%;">' . $row['problemid'] . '</td>';

										echo '<td style="width: 2%;"><a href=""></a></td>';

										echo '<td style="width: 50%;"><a href="statement.php?problemid=' . $row['problemid'] . '">' . $row['title'] . '</a></td>';


										echo '<td style="width: 30%; color:'.$col.';">
                                ' . $row['difficulty'] . '
                                </td>';


										echo  "</tr>";
									}
								}
								?>


							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>