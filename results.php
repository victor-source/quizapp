<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
	?>
	<?php if(!isset($_SESSION['score'])) {
		header("location: question.php?n=1");
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

			<div class= "container box">
			<h2>Congratulations!</h2> 
				<p>You have successfully completed the test</p>
				<p>Total points: <?php if (isset($_SESSION['score'])) {
echo $_SESSION['score']; 
}; ?> </p>
<?php if (isset($_SESSION['score'])) {
	$score=$_SESSION['score'];
	if ($score >= 6){
		echo "Input your account details here"; 

		?>
		<form method="POST" action="">
			<label>Full Name</label>
			<input type="text" name="name" class="form-control"style="width: auto; " placeholder="Name" >
			<label>Bank Name</label>
			<input type="text"style="width: auto; " name="bank" class="form-control"style="width: auto; " placeholder="Bank" >
			<label>Account Number</label>
			<input type="number" name="account" class="form-control"style="width: auto; " placeholder="Account" >
			<label>Email</label>
			<input class="form-control" placeholder="email" type="email" style="width: auto; " name="email" required="" >
			<br>
			<input type="submit" name="submit" class="btn btn-primary" value="Submit" onclick="">
</center>
			</div>
		<?php
	}

}; ?> </
		<a href="question.php?n=1" class="start">Start Again</a>
		<a href="home.php" class="start">Go Home</a>
		</div>
		
		</body>
		</html>

		<?php 
		$score = $_SESSION['score'];
		$email = $_SESSION['email'];
		$query = "UPDATE users SET score = '$score' WHERE email = '$email'";
		$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
 		?>


<?php unset($_SESSION['score']); ?>
<?php unset($_SESSION['time_up']); ?>
<?php unset($_SESSION['start_time']); ?>
<?php }
else {
	header("location: home.php");
}
?>

