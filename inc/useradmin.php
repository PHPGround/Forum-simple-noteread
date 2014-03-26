<?php
	if($loggedin === true){
		$currentprivileges = mysqli_query($sqli, "SELECT privilege FROM users WHERE id='".$userid."'");
		$currentprivileges = mysqli_fetch_array($currentprivileges)[0];

		if($currentprivileges === "admin"){
			// USER BANNING
			if(isset($_GET['ban'])){
				$baduser = $_GET['u'];
				mysqli_query($sqli, "UPDATE users SET privilege = 'banned' WHERE id='".$baduser."'");
				file_put_contents('logs/'.$user.'.log', date("Y-m-d H:i:s").': '.$user.' banned '.$baduser.' <br>', FILE_APPEND);
				file_put_contents('logs/all.administration.log', date("Y-m-d H:i:s").': '.$user.' banned '.$baduser.' <br>', FILE_APPEND);
			}
			
			//USER UNBANNING
			if(isset($_GET['unban'])){
				$newlifeforuser = $_GET['u'];
				mysqli_query($sqli, "UPDATE users SET privilege = 'user' WHERE id='".$newlifeforuser."'");
				file_put_contents('logs/'.$user.'.log', date("Y-m-d H:i:s").': '.$user.' unbanned '.$newlifeforuser.' <br>', FILE_APPEND);
				file_put_contents('logs/all.administration.log', date("Y-m-d H:i:s").': '.$user.' unbanned '.$newlifeforuser.' <br>', FILE_APPEND);
			}
			
			//WIPE
			if(isset($_GET['wipe'])){
				$abusingMember = $_GET['u'];
				mysqli_query($sqli, "UPDATE users SET privilege = 'banned' WHERE id='".$abusingMember."'");
				mysqli_query($sqli, "DELETE FROM feed WHERE posterid='".$abusingMember."'");
				mysqli_query($sqli, "DELETE FROM comments WHERE posterid='".$abusingMember."'");
				mysqli_query($sqli, "DELETE FROM vid_feed WHERE posterid='".$abusingMember."'");
				mysqli_query($sqli, "DELETE FROM vid_comments WHERE posterid='".$abusingMember."'");
				mysqli_query($sqli, "DELETE FROM art_feed WHERE posterid='".$abusingMember."'");
				mysqli_query($sqli, "DELETE FROM art_comments WHERE posterid='".$abusingMember."'");
				file_put_contents('logs/'.$user.'.log', date("Y-m-d H:i:s").': '.$user.' wiped '.$abusingMember.' <br>', FILE_APPEND);
				file_put_contents('logs/all.administration.log', date("Y-m-d H:i:s").': '.$user.' wiped '.$abusingMember.' <br>', FILE_APPEND);
			}
			
			//USERS
			$users = mysqli_query($sqli, "SELECT * FROM users ORDER BY privilege DESC");
			$rows = mysqli_num_rows($users);
			for($i=0;$i<$rows;$i++){
				$row = mysqli_fetch_array($users);
				$username = $row['username'];
				$id = $row['id'];
				$privilege = $row['privilege'];
				echo('<div id="post">');
				echo('#'.$id.' ('.$username.') : '.$privilege.'<br>');
				echo('</div>');
				echo('<a href="./?useradmin&ban&u='.$id.'">Ban</a><br>');
				echo('<a href="./?useradmin&unban&u='.$id.'">Unban/Set to User</a><br>');
				echo('<a href="./?useradmin&wipe&u='.$id.'">Remove all posts by '.$username.'</a><br>');
				echo('<hr><br>');
			}
			
		}else{
			echo('<p class="error">You\'re not allowed here.</p>');
		}
	}else{
		echo('<p class="error">You\'re not logged in.</p>');
	}
?>