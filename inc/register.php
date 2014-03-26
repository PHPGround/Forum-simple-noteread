<?php
	if(isset($_POST['username'])&&!empty($_POST['username'])){
		$user = mysqli_real_escape_string($sqli, $_POST['username']);
		$pass = mysqli_real_escape_string($sqli, $_POST['password']);
		$email = mysqli_real_escape_string($sqli, $_POST['email']);
		$checkUsername = mysqli_query($sqli, "SELECT id FROM users WHERE username='".$user."'");
		if(mysqli_num_rows($checkUsername)>0){
			printf('<p class="error">User exists</p>');
		}else{
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				printf('<p class="error">Invalid email</p>');
			}else{
				$checkEmail = mysqli_query($sqli, "SELECT id FROM users WHERE email='".$email."'");
				if(mysqli_num_rows($checkEmail)>0){
					printf('<p class="error">Email already registered.</p>');
				}else{
					if(strlen($pass)<8){
						printf('<p class="error">Password needs to be at least 8 characters long.</p>');
					}else{
						$salt = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 16);
						$hashedpass = hash('sha512', $pass.$salt);
						if(mysqli_query($sqli, "INSERT INTO users (username, email, privilege, password, salt) VALUES ('".$user."','".$email."', 'user','".$hashedpass."','".$salt."')")){
							printf('Account created.');
							header('Location: ./');
						}else{
							printf('<p class="error">Account creation failure.</p>');
							printf('<p class="error">'.mysqli_error($sqli).'</p>');
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