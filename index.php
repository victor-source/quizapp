<?php
session_start();
include "connection.php";
?>
<?php 
if (isset($_SESSION['id'])) {
	header("location: home.php");
}
?>
<?php
if (isset($_POST['email'])) {
$email = mysqli_real_escape_string($conn , $_POST['email']);
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$checkmail = "SELECT * from users WHERE email = '$email'";
	$runcheck = mysqli_query($conn , $checkmail) or die(mysqli_error($conn));
	if (mysqli_num_rows($runcheck) > 0) {
		$played_on = date('Y-m-d H:i:s');
		$update = "UPDATE users SET played_on = '$played_on' WHERE email = '$email' ";
		$runupdate = mysqli_query($conn , $update) or die(mysqli_error($conn));
		$row = mysqli_fetch_array($runcheck);
			$id = $row['id'];
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $row['email'];
		header("location: home.php");
	}
	else {
		$played_on = date('Y-m-d H:i:s');
	$query = "INSERT INTO users(email,played_on) VALUES ('$email','$played_on')";
	$run = mysqli_query($conn, $query) or die(mysqli_error($conn)) ;
	if (mysqli_affected_rows($conn) > 0) {
		$query2 = "SELECT * FROM users WHERE email = '$email' ";
		$run2 = mysqli_query($conn , $query2) or die(mysqli_error($conn));
		if (mysqli_num_rows($run2) > 0) {
			$row = mysqli_fetch_array($run2);
			$id = $row['id'];
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $row['email'];
			header("location: home.php");
		}
}
	else {
		echo "<script> alert('something is wrong'); </script>";
	}
}
}
else {
	echo "<script> alert('Invalid Email'); </script>";
}
}



?>
<html>
<head>
		<title>sparkite Quiz</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

	</head>

	<body style="background-image:url(sparkite-bg.png)">
		
<style>
  .box{
    border: 1px solid blue; background-color: rgb(238 242 189);color:black; align-content: center; padding:20px; border-radius: 5px;
  }
  .foot {
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: black;
  color: white;
  text-align: center;
}
  </style>
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
  <!-- Brand -->
    <a class="navbar-brand" href="index.html"> <span style="color: red; font-size: 30px;">Sparkite</span> Quiz</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="admin.php">Admin Panel</a>
    </li>
	<li><a class="nav-link" href="exit.php" >Exit</a>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Others
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">How it works</a>
        <a class="dropdown-item" href="#">Trusted Agents</a>
        <a class="dropdown-item" href="#">Smart quizes</a>
      </div>
    </li>
  </ul>

  <form  class="form-inline" action="/action_page.php">
  </form>
</nav><br><br>
		
		</header>

		<div class="container box"><center>
				<p>Enter Your Email</p>
				<form method="POST" action="">
				<input class="form-control" type="email" style="width: auto; " name="email" required="" >
				<br><input type="submit" name="submit" class="btn btn-primary" value="PLAY NOW">
</center>
			</div>




	</body>
</html>