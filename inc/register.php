<?php
	if(isset($_POST['username'])&&!empty($_POST['username'])){
		$user = mysqli_real_escape_string($sqli, $_POST['username']);
		$pass = mysqli_real_escape_string($sqli, $_POST['password']);
		$email = mysqli_real_escape_string($sqli, $_POST['email']);
		$checkUsername = mysqli_query($sqli, "SELECT id FROM users WHERE username='".$user."'");
		if(mysqli_num_rows($checkUsername)>0){
			printf('User exists');
		}else{
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				printf('Invalid email');
			}else{
				$checkEmail = mysqli_query($sqli, "SELECT id FROM users WHERE email='".$email."'");
				if(mysqli_num_rows($checkEmail)>0){
					printf('Email already registered.');
				}else{
					if(strlen($pass)<8){
						printf('Password needs to be at least 8 characters long.');
					}else{
						$salt = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 16);
						$hashedpass = hash('sha512', $pass.$salt);
						if(mysqli_query($sqli, "INSERT INTO users (username, email, password, salt) VALUES ('".$user."','".$email."','".$hashedpass."','".$salt."')")){
							printf('Account created.');
							header('Location: ./');
						}else{
							printf('Account creation failure.');
							printf(mysqli_error($sqli));
						}
					}
				}
			}
		}
	}
?>
<form method="post">
	<input type="text" name="username" placeholder="Username" />
	<input type="text" name="email" placeholder="Email" />
	<input type="password" name="password" placeholder="Password" />
	<input type="submit" value="Register">
</form>