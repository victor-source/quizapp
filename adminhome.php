<?php 
session_start();
if (isset($_SESSION['admin'])) {
?>




<!DOCTYPE html>
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
    <a class="navbar-brand" href="exit.php"> <span style="color: red; font-size: 30px;">Sparkite</span> Quiz</a>
    <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	        	<li class="nav-item active"><a href="exit.php" class="nav-link pl-0">Home</a></li>
	        	<li class="nav-item"><a href="add.php" class="nav-link">Add Question</a></li>
	        	<li class="nav-item"><a href="allquestions.php" class="nav-link">View QUestions</a></li>
	        	<li class="nav-item"><a href="players.php" class="nav-link">View Players</a></li>
	        	<li class="nav-item"><a href="exit.php" class="nav-link">Exit</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	        </ul>
	      </div>

  <form  class="form-inline" action="/action_page.php">
  </form>
</nav><br><br>
		
		</header>

		<div class="container box">
				<h2>Welcome back, Admin</h2>
				</div>
				</main>
				</body>
				</html>

				<?php } 
				else {
				header("location: admin.php");
				}
				?>