<?php
	$error = '<p class="error">Wrong password.</p>';
	if(isset($_POST['oldpass'])&&!empty($_POST['oldpass'])){
		$pass = mysqli_real_escape_string($sqli, $_POST['oldpass']);
		$salt = mysqli_query($sqli, "SELECT salt FROM users WHERE id='".$userid."'");
		$salt = mysqli_fetch_array($salt)[0];
		$truehashedpass = mysqli_query($sqli, "SELECT password FROM users WHERE id='".$userid."'");
		$truehashedpass = mysqli_fetch_array($truehashedpass)[0];
		$thishashedpass = hash('sha512', $pass.$salt);
		if($thishashedpass==$truehashedpass){
			$newsalt = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 16);
			$hashedpass = hash('sha512', $pass.$newsalt);
			if(mysqli_query($sqli, "UPDATE users SET password='".$hashedpass."' WHERE id='".$userid."'")){
				printf('Password changed.<br>');
				if(mysqli_query($sqli, "UPDATE users SET salt='".$newsalt."' WHERE id='".$userid."'")){
					printf('Password salt changed.');
				}else{
					echo('<p class="error">Fatal mysql error. Password is now most likely corrupt. Sorry for inconvenience.</p>'); //THIS SHOULD NEVER HAPPEN!
					echo('<p>If this happened, do not log out and seek website administration for help. This should never happen though.</p>'); 
					//website owner will need to change password to something hashed with sha512 and make salt empty.
				}
			}else{
				echo('<p class="error">Failed to change password.</p>');
			}
		}else{
			echo($error);
		}
	}
?>
<form method="post">
	<input type="password" name="oldpass" placeholder="Old password">
	<input type="password" name="newpass" placeholder="New password">
	<input type="submit" value="Change Password">
</form>