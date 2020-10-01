<?php 

session_start();

if ( isset($_SESSION["pengurus"]) ) {
	header("Location: index.php");
	exit;

}

require 'functions.php';

if ( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
	$data = mysqli_fetch_array($result);

	// cek username
	if ( mysqli_num_rows($result) === 1 ) {

		// cek pw
		if (password_verify($password, $data["password"]) ) {

	// cek user
	if($data['level']=="pengurus"){

		$_SESSION['pengurus'] = $data['level'];
		$_SESSION['level'] = $data['level'];

		header("location: index.php");

	}else{

		header("location: login.php?login-gagal");
	}



		} else {
			header("location: login.php?login-gagal");
		}

	} else {
			header("location: login.php?login-gagal");
		}
}

?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Login - SPK Ketimbang Ngemis Yogyakarta</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="lite/login/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="lite/login/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="lite/login/css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="lite/login/css/style.css" rel="stylesheet" type="text/css">
<link href="lite/login/css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="brand" href="login.php">
				SPK Ketimbang Ngemis Yogyakarta				
			</a>		
		
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container">
	
	<div class="content clearfix">
		
		<form action="" method="post">
		
			<h1><center>Selamat Datang</h1></center>	
			
			<div class="login-fields">
				
				<p><center>(Silahkan ketikkan username dan password)</p></center>
				<hr>	

				<?php 

				if(isset($_GET['login-gagal'])) {?>

				<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					Username atau Password salah!
				</div>

				<?php  }?>
				
				<div class="field">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" value="" placeholder="Username" required="true" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" required="true" class="login password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<!-- <span class="lupa-password">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Keep me signed in</label>
				</span> -->

				<button class="button btn btn-success btn-large" type="submit"
				name="login">Masuk</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<script src="lite/login/js/jquery-1.7.2.min.js"></script>
<script src="lite/login/js/bootstrap.js"></script>

<script src="lite/login/js/signin.js"></script>

</body>

</html>