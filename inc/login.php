<?php
	$errorMsg = 'Wrong email/password conbination';
	if(isset($_POST['email'])&&!empty($_POST['email'])){
		$pass = mysqli_real_escape_string($sqli, $_POST['password']);
		$email = mysqli_real_escape_string($sqli, $_POST['email']);
		$id = mysqli_query($sqli, "SELECT id FROM users WHERE email='".$email."'");
		if(mysqli_num_rows($id)>0){
			$salt = mysqli_query($sqli, "SELECT salt FROM users WHERE email='".$email."'");
			$salt = mysqli_fetch_array($salt);
			$truehashedpass = mysqli_query($sqli, "SELECT password from users WHERE email='".$email."'");
			$truehashedpass = mysqli_fetch_array($truehashedpass);
			$thishashedpass = hash('sha512', $pass.$salt[0]);
			if($truehashedpass[0]===$thishashedpass){
				$_SESSION['id'] = mysqli_fetch_array($id)[0];
				header('Location: ./');
			}else{
				printf($errorMsg);
			}
		}else{
			printf($errorMsg);
		}
	}
?>
<form method="post">
	<input type="text" name="email" placeholder="Email" />
	<input type="password" name="password" placeholder="Password" />
	<input type="submit" value="Login">
</form>