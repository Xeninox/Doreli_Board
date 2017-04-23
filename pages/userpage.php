<?php
/**
**@author Selassie Golloh
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="assets/ico/favicon.ico">

	<title>Doreli Board - User Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Bootstrap core CSS -->
	<link href="../css/bootstrap.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="../css/style.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">


	<!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php 
session_start();
include_once('../controller/userDetailsController.php');
 include_once('../layout/adminheader.php'); 
 $array = getUserDetails();
 ?>

<div class="col-lg-6" style="margin-top: 5%">
<?php 
foreach($array as $item){
$username = $item['username'];
$firstname = $item['firstname'];
$lastname = $item['lastname'];
$email = $item['email'];
$password = $item['password'];
$ppic = $item['profile_picture'];
$encoded_image = base64_encode($ppic);

echo "<p><img class=\"img-responsive img-circle\" style=\"height:350px;\" src=\"data:image;base64, {$encoded_image}\"></p>
<p>Username : $username</p> 
<p>First name: $firstname</p>
<p>Last name : $lastname</p>
<p>Email : $email</p> ";
}

?>
<form method="post" action="">
	<button type="submit" class="btn btn-lg btn-primary btn-block" name="edit">Edit Profile</button><br>

<button type="submit" class="btn btn-lg btn-danger btn-block" name="delete">Delete</button><br>
</div>
</form>

<?php 
if(isset($_POST['edit'])){

echo '
<div class="col-lg-6" style="margin-top: 5%">
	<div class="panel-heading">
		<h3 class="panel-title" style="color: #fff">Update Information</h3>
	</div>
	<div class="panel-body"> 

		<form method="POST" action="">
			<fieldset>

				<div class="form-group">                       
					<input class="form-control" placeholder=" Change username" name="username" type="text" id="name" value= "'.$username.'" required autofocus>
					
				</div>


				<div class="form-group">            
					<input class="form-control" placeholder=" Firstname" name="firstname" type="text" id="fname" value= "'.$firstname.'" required>
					
				</div>


				<div class="form-group">                            
					<input class="form-control" placeholder=" Last name" name="lastname" type="text" id="lname" value= "'.$lastname.'" required>
					
				</div>


				<div class="form-group">                          
					<input class="form-control" placeholder="Email" name="email" type="email" id="mail" value= "'.$email.'" required>
					
				</div>


				<div class="form-group">                      
					<input class="form-control" placeholder="Password" name="password" type="password" id="pswd" value="'.$password.'" required>
					
				</div>

				<div class="form-group">
					<label for="#imageName">Edit profile picture </label>
					<input type="file" name="image" id="imageName">
					
				</div>      

				<button name="Update" type="submit" class="btn btn-lg btn-success btn-block">Update</button><br>


			</fieldset>
		</form>  
';
}
 ?>


		<?php 
getUserDetails();

?>
	</div>
</div>

	
<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/retina-1.1.0.js"></script>
	<script src="../js/jquery.hoverdir.js"></script>
	<script src="../js/jquery.hoverex.min.js"></script>
	<script src="../js/jquery.prettyPhoto.js"></script>
	<script src="../js/jquery.isotope.min.js"></script>
	<script src="../js/custom.js"></script>
	<script src="../js/ajax.js"></script>

</body>
</html>
