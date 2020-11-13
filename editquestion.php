<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {
	?>



<?php 
if (isset($_GET['qno'])) {
	$qno = mysqli_real_escape_string($conn , $_GET['qno']);
	if (is_numeric($qno)) {
		$query = "SELECT * FROM questions WHERE qno = '$qno' ";
		$run = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if (mysqli_num_rows($run) > 0) {
			while ($row = mysqli_fetch_array($run)) {
				 $qno = $row['qno'];
                 $question = $row['question'];
                 $ans1 = $row['ans1'];
                 $ans2 = $row['ans2'];
                 $ans3 = $row['ans3'];
                 $ans4 = $row['ans4'];
                 $correct_answer = $row['correct_answer'];
			}
		}
		else {
			echo "<script> alert('error');
			window.location.href = 'allquestions.php'; </script>" ;
		}
	}
	else {
		header("location: allquestions.php");
	}
}

?>
<?php 
if(isset($_POST['submit'])) {
	$question =htmlentities(mysqli_real_escape_string($conn , $_POST['question']));
	$choice1 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice1']));
	$choice2 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice2']));
	$choice3 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice3']));
	$choice4 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice4']));
	$correct_answer = mysqli_real_escape_string($conn , $_POST['answer']);
    

	$query = "UPDATE questions SET question = '$question' , ans1 = '$choice1' , ans2= '$choice2' , ans3 = '$choice3' , ans4 = '$choice4' , correct_answer = '$correct_answer' WHERE qno = '$qno' ";
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>alert('Question successfully updated');
		window.location.href= 'allquestions.php'; </script> " ;
	}
	else {
		"<script>alert('error, try again!'); </script> " ;
	}
}

?>


<!DOCTYPE html>
<html>
<head>
		<title>sparkite Quiz</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">

		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit">

	</head>

	<body>
		
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

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="exit.php">Home</a>
    </li>
    <li><a class="nav-link" href="add.php" >Add Question</a>
    <li><a class="nav-link" href="allquestions.php" >View QUestions</a>

	<li><a class="nav-link" href="players.php" >View Players</a>

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
</nav>
		
		</header>
		
	<h1 class="box" style="border-radius: 0px; border: 0px solid white; background-color: rgb(3 107 163); color: white"> Edit Questions</h1>	<div style="padding: 20px; "><form method="post" action="">

					<p>
						<label>Question</label>
						<input type="text" class="form-control" style="" name="question"value="<?php echo $question; ?>" required="">
					</p>
					<p>
						<label>Choice #1</label>
						<input type="text"class="form-control" style="" value="<?php echo $ans1; ?>"  name="choice1" required="">
					</p>
					<p>
						<label>Choice #2</label>
						<input type="text" class="form-control" style="" value="<?php echo $ans2; ?>" name="choice2" required="">
					</p>
					<p>
						<label>Choice #3</label>
						<input type="text"class="form-control" style="" value="<?php echo $ans3; ?>" name="choice3" required="">
					</p>
					<p>
						<label>Choice #4</label>
						<input type="text"class="form-control" style="" value="<?php echo $ans4; ?>" name="choice4" required="">
					</p>
					<p>
						<label for="sel1">Correct answer</label>
						<select name="answer" class="form-control" id="sel1">
                        <option value="a">Choice #1 </option>
                        <option value="b">Choice #2</option>
                        <option value="c">Choice #3</option>
                        <option value="d">Choice #4</option>
                    </select>
					</p>
					<p>
						
						<input type="submit" class="btn btn-primary" style="" name="submit" value="Submit">
					</p>
				
				</form></div>
			</div>
		</main>

		

	</body>
</html>

<?php } 
else {
	header("location: admin.php");
}
?>