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
<div id="main">
<form action='registration.php' method='post'>
<h2>Please login to register for a training session:</h2>
<table>
<tr>
<td>Username:</td>
<td><input type='text' name='username' required='required' /><br /></td>
</tr>
<tr>
<td>Password: </td>
<td><input type='password' name = 'password' required='required' /></td>
</tr>
</table>
<input type='submit' value='Login' />
</form>
</div>
<?php include('includes/mission.php');?>
<?php include('includes/footer.php'); ?>
</div>
</body>