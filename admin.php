<?php
session_start();
include "connection.php";
if (isset($_SESSION['admin'])) {
	header("location: adminhome.php");
}
if (isset($_POST['password']))  {
	$password = mysqli_real_escape_string($conn , $_POST['password']);
	$adminpass = '$2y$10$8WkSLFcoaqhJUJoqjg3K8eWixJWswsICf7FTxehKmx8hpmIKYWqju';
	if (password_verify($password , $adminpass)) {
		$_SESSION['admin'] = "active";
		header("Location: adminhome.php");
	}
	else {
		echo  "<script> alert('wrong password');</script>";
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
      <a class="nav-link" href="#">Our policy</a>
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
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-primary" type="submit">Search</button>
  </form>
</nav><br><br>
			<div class="container box">			<h2>Enter Password</h2>
				<form method="POST" action="">
				<input type="password" class="form-control" name="password" required="" style="width: auto" ><br>
				<input type="submit" name="submit" class="btn btn-primary"> 

			</div>
	</body>
</html>