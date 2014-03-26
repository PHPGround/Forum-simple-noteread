<?php
	if($loggedin === true){
		$currentprivileges = mysqli_query($sqli, "SELECT privilege FROM users WHERE id='".$userid."'");
		$currentprivileges = mysqli_fetch_array($currentprivileges)[0];

		if($currentprivileges === "admin"){
		
			//THREAD REMOVAL
			if(isset($_GET['removet'])){
				switch($_GET['f']){
				case 'gen':
					$thread = $_GET['t'];
					mysqli_query($sqli, "DELETE FROM feed WHERE id='".$thread."'");
					mysqli_query($sqli, "DELETE FROM comments WHERE opid='".$thread."'");
					file_put_contents('logs/'.$user.'.log', date("Y-m-d H:i:s").': '.$user.' removed #'.$thread.' from GENERAL <br>', FILE_APPEND);
					file_put_contents('logs/all.administration.log', date("Y-m-d H:i:s").': '.$user.' removed #'.$thread.' from GENERAL <br>', FILE_APPEND);
				}
			}
			
			//USER BANNING
			if(isset($_GET['ban'])){
				$baduser = $_GET['u'];
				mysqli_query($sqli, "UPDATE users SET privilege = 'banned' WHERE id='".$baduser."'");
				file_put_contents('logs/'.$user.'.log', date("Y-m-d H:i:s").': '.$user.' banned '.$baduser.' <br>', FILE_APPEND);
				file_put_contents('logs/all.administration.log', date("Y-m-d H:i:s").': '.$user.' banned '.$baduser.' <br>', FILE_APPEND);
			}
			
			//THREADS
			echo('General: <br>');
			$feed = mysqli_query($sqli, "SELECT * FROM feed ORDER BY id DESC");
			$rows = mysqli_num_rows($feed);
			$feedurl = './?';
			for($i=0;$i<$rows;$i++){
				$row = mysqli_fetch_array($feed);
				$text = $row['text'];
				$id = $row['id'];
				$posterid = $row['posterid'];
				$postername = mysqli_fetch_array(mysqli_query($sqli, "SELECT username FROM users WHERE id='".$posterid."'"))[0];
				$date = $row['date'];
				echo('<div id="post">');
				echo('#'.$id.' ('.$postername.') @ '.$date.'<br>');
				echo($text.'<br>');
				echo('<a href="'.$feedurl.'&t='.$id.'">>Replies</a>');
				echo('</div><a href="./?admin&removet&f=gen&t='.$id.'">Remove Post #'.$id.'</a><br>');
				echo('<a href="./?admin&ban&u='.$posterid.'">Ban '.$posterid.':'.$postername.'</a>');
				echo('<hr><br>');
			}
		}else{
			echo('<p class="error">You\'re not allowed here.</p>');
		}
	}else{
		echo('<p class="error">You\'re not logged in.</p>');
	}
?>