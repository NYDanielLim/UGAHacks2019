<?php
	$conn = new PDO ("mysql:localhost;dbname=MDMP", 'root');
	$error = "";
	
	if(isset($_POST["username"]) && $_POST["username"] != NULL && isset($_POST["password"]) && $_POST["password"] != NULL && isset($_POST["email"]) && $_POST["email"] 
		!= NULL && isset($_POST["emailConfirm"]) && $_POST["emailConfirm"] != NULL && $_POST["email"] == $_POST["emailConfirm"]){
	  $nameQuery = $conn->prepare('SELECT username FROM accounts');
	  $nameQuery->execute();
	  $existing = $nameQuery->fetchAll();
	  $taken = false;
	  foreach($existing as $exists){
		if($_POST["username"] == $exists){
		  $taken = true;
		  echo "<p>Username is taken</p>";
		  
		}
	  }
	  if($taken == false){
	  $addUserStmt = $conn->prepare(
      		   "Insert into accounts (username, password, email) values (:name, :password, :email)"); 
      $addUserStmt->bindValue(':name', $_POST["username"]);
      $addUserStmt->bindValue(':password', md5($_POST["password"]));
	  $addUserStmt->bindValue(':email', $_POST["email"]);
      $addUserStmt->execute();
      $addUserStmt->closeCursor();

      header("Location: localhost:33060");

	  }
	}
	
	/*
	if(!isset($_POST["username"])){
	  $error = "<p>Username field is empty.</p> ";
	}
	if(isset($_POST["password"])){
	  $error += "<p>Password field left empty</p>";	
	}
	if(isset($_POST["email"])) {
	  $error += "<p>Email field left empty</p>";	
	}
	if(isset($_POST["email"]) && isset($_POST["emailConfirm"]) && $_POST["email"] != $_POST["emailConfirm"]){
	  $error += "<p>Emails do not match</p>";	
	}
	if($error != ""){
		echo $error;
	}*/
?>

<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sign Up</title>
	</head>

<body>
<center>
<H1>Sign Up</H1>

<form action="" class="form-horizontal" id="signUpForm" method="POST">
	
		<div class="form-group">
			 <label class="col-sm-4 control-label">Username: </label>
			<div class="col-sm-8"><input type="text" class="form-control" name="username"/>
		</div>
			</div>
		<div class="form-group">
			<label class="col-sm-4 control-label">Password:</label>
			<div class="col-sm-8">
			<input class="form-control" type="password" name="password"/>
		</div></div>
		<div class="form-group">
			<label class="col-sm-4 control-label">Email:</label>
			<div class="col-sm-8">
			<input type="text" class="form-control" name="email"/> 
		</div></div>
		<div class="form-group">
			<label class="col-sm-4 control-label">Confirm email:</label> 
			<div class="col-sm-8">
			<input type="text" class="form-control" name="emailConfirm"/> 
		</div></div>

		
		<div class="form-group"><div>
	<input type="submit" id="sub" class="btn btn-primary" value="submit">
	
	 </div></div>
	 
</form>	
</center>

</body>

</html>

<style type="text/css">
	body{ background-color: white; }
	td{
		padding: 5px;
	}
	#sub{
		margin-left: 110px;
	}
	#signUpForm{
		width:20%;
		margin-right: 110px;
	}
	."btn btn-primary"{
		margin-left: 50px;
	}
</style>