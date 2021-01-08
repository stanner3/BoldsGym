<?php error_reporting(E_ALL); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Bold's Gym</title>
  <link type="text/css" rel="stylesheet" href="bolds.css" />
</head>
<body>
<div id="wrapper">
<?php include('includes/navbar.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<?php require_once('includes/utils.php'); ?>

<div id="main">
	<form action="registration-handle.php" method="post" id="registration-form">
	<!--<img src="img/trainer2.jpg" alt="buddy1" width=175 align="left" />-->
	<h2>Thank you for choosing to register for personal trainning online.</h2>
	Please fill in the required information below and then click Register. <br/>
	NOTE: Training sessions are limited to 1 hour.<br/><br/>
	First, choose the trainer*:<br/>
	<select name="trainer" id="trainer">
		<?php echo getTrainerOptions(); ?>
	</select> <br/><br/>
	Next, decide what day you would like to reserve*:<br/>
	<select name="dayofweek" id="dayofweek">
		<?php echo getDateOptions(); ?>
	</select> <br/><br/>
	What what time would like to reserve*:<br/>
	<select name="time" id="time">
		<?php echo getTimeOptions(); ?>
	</select> <br/><br/>
	Finally, is there something in particular that you would like to work on during your training session?<br />
	<input type="text" name="comments" id="comments" /><br /><br/>
	<input type="submit" name="submit" value="Register" />
</form>
</div>

<script src="registration.js"></script>
<?php include('includes/footer.php'); ?>
</div>
</body>
</html>