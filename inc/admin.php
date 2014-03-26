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
					break;
				case 'vid':
					$thread = $_GET['t'];
					mysqli_query($sqli, "DELETE FROM vid_feed WHERE id='".$thread."'");
					mysqli_query($sqli, "DELETE FROM vid_comments WHERE opid='".$thread."'");
					file_put_contents('logs/'.$user.'.log', date("Y-m-d H:i:s").': '.$user.' removed #'.$thread.' from VIDEO GAMES <br>', FILE_APPEND);
					file_put_contents('logs/all.administration.log', date("Y-m-d H:i:s").': '.$user.' removed #'.$thread.' from VIDEO GAMES <br>', FILE_APPEND);
					break;
				case 'tech':
					$thread = $_GET['t'];
					mysqli_query($sqli, "DELETE FROM tech_feed WHERE id='".$thread."'");
					mysqli_query($sqli, "DELETE FROM tech_comments WHERE opid='".$thread."'");
					file_put_contents('logs/'.$user.'.log', date("Y-m-d H:i:s").': '.$user.' removed #'.$thread.' from TECHNOLOGY <br>', FILE_APPEND);
					file_put_contents('logs/all.administration.log', date("Y-m-d H:i:s").': '.$user.' removed #'.$thread.' from TECHNOLOGY <br>', FILE_APPEND);
					break;
				
				case 'art':
					$thread = $_GET['t'];
					mysqli_query($sqli, "DELETE FROM art_feed WHERE id='".$thread."'");
					mysqli_query($sqli, "DELETE FROM art_comments WHERE opid='".$thread."'");
					file_put_contents('logs/'.$user.'.log', date("Y-m-d H:i:s").': '.$user.' removed #'.$thread.' from ART <br>', FILE_APPEND);
					file_put_contents('logs/all.administration.log', date("Y-m-d H:i:s").': '.$user.' removed #'.$thread.' from ART <br>', FILE_APPEND);
					break;
				case 'rand':
					$thread = $_GET['t'];
					mysqli_query($sqli, "DELETE FROM rand_feed WHERE id='".$thread."'");
					mysqli_query($sqli, "DELETE FROM rand_comments WHERE opid='".$thread."'");
					file_put_contents('logs/'.$user.'.log', date("Y-m-d H:i:s").': '.$user.' removed #'.$thread.' from RANDOM <br>', FILE_APPEND);
					file_put_contents('logs/all.administration.log', date("Y-m-d H:i:s").': '.$user.' removed #'.$thread.' from RANDOM <br>', FILE_APPEND);
					break;
				case 'pol':
					$thread = $_GET['t'];
					mysqli_query($sqli, "DELETE FROM pol_feed WHERE id='".$thread."'");
					mysqli_query($sqli, "DELETE FROM pol_comments WHERE opid='".$thread."'");
					file_put_contents('logs/'.$user.'.log', date("Y-m-d H:i:s").': '.$user.' removed #'.$thread.' from POLITICAL <br>', FILE_APPEND);
					file_put_contents('logs/all.administration.log', date("Y-m-d H:i:s").': '.$user.' removed #'.$thread.' from POLITICAl <br>', FILE_APPEND);
					break;
				}
			}
			
			//COMMENT REMOVAL
			if(isset($_GET['removec'])){
				switch($_GET['f']){
				case 'gen':
					$post = $_GET['c'];
					mysqli_query($sqli, "DELETE FROM comments WHERE id='".$post."'");
					file_put_contents('logs/'.$user.'.log', date("Y-m-d H:i:s").': '.$user.' removed ##'.$post.' from GENERAL <br>', FILE_APPEND);
					file_put_contents('logs/all.administration.log', date("Y-m-d H:i:s").': '.$user.' removed ##'.$post.' from GENERAL <br>', FILE_APPEND);
					break;
				case 'vid':
					$post = $_GET['c'];
					mysqli_query($sqli, "DELETE FROM vid_comments WHERE id='".$post."'");
					file_put_contents('logs/'.$user.'.log', date("Y-m-d H:i:s").': '.$user.' removed ##'.$post.' from VIDEO GAMES <br>', FILE_APPEND);
					file_put_contents('logs/all.administration.log', date("Y-m-d H:i:s").': '.$user.' removed ##'.$post.' from VIDEO GAMES <br>', FILE_APPEND);
					break;
				case 'tech':
					$post = $_GET['c'];
					mysqli_query($sqli, "DELETE FROM tech_comments WHERE id='".$post."'");
					file_put_contents('logs/'.$user.'.log', date("Y-m-d H:i:s").': '.$user.' removed ##'.$post.' from TECHNOLOGY <br>', FILE_APPEND);
					file_put_contents('logs/all.administration.log', date("Y-m-d H:i:s").': '.$user.' removed ##'.$post.' from TECHNOLOGY <br>', FILE_APPEND);
					break;
				case 'art':
					$post = $_GET['c'];
					mysqli_query($sqli, "DELETE FROM art_comments WHERE id='".$post."'");
					file_put_contents('logs/'.$user.'.log', date("Y-m-d H:i:s").': '.$user.' removed ##'.$post.' from ART <br>', FILE_APPEND);
					file_put_contents('logs/all.administration.log', date("Y-m-d H:i:s").': '.$user.' removed ##'.$post.' from ART <br>', FILE_APPEND);
					break;
				case 'rand':
					$post = $_GET['c'];
					mysqli_query($sqli, "DELETE FROM rand_comments WHERE id='".$post."'");
					file_put_contents('logs/'.$user.'.log', date("Y-m-d H:i:s").': '.$user.' removed ##'.$post.' from RAND <br>', FILE_APPEND);
					file_put_contents('logs/all.administration.log', date("Y-m-d H:i:s").': '.$user.' removed ##'.$post.' from RAND <br>', FILE_APPEND);
					break;
				case 'pol':
					$post = $_GET['c'];
					mysqli_query($sqli, "DELETE FROM comments WHERE id='".$post."'");
					file_put_contents('logs/'.$user.'.log', date("Y-m-d H:i:s").': '.$user.' removed ##'.$post.' from POLITICAL <br>', FILE_APPEND);
					file_put_contents('logs/all.administration.log', date("Y-m-d H:i:s").': '.$user.' removed ##'.$post.' from POLITICAL <br>', FILE_APPEND);
					break;
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
			echo('THREADS: <br>');
			//general
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
			
			//vid
			echo('Video Games: <br>');
			$feed = mysqli_query($sqli, "SELECT * FROM vid_feed ORDER BY id DESC");
			$rows = mysqli_num_rows($feed);
			$feedurl = './?f=vid';
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
				echo('</div><a href="./?admin&removet&f=vid&t='.$id.'">Remove Post #'.$id.'</a><br>');
				echo('<a href="./?admin&ban&u='.$posterid.'">Ban '.$posterid.':'.$postername.'</a>');
				echo('<hr><br>');
			}
			
			//Tech
			echo('Technology: <br>');
			$feed = mysqli_query($sqli, "SELECT * FROM tech_feed ORDER BY id DESC");
			$rows = mysqli_num_rows($feed);
			$feedurl = './?f=tech';
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
				echo('</div><a href="./?admin&removet&f=tech&t='.$id.'">Remove Post #'.$id.'</a><br>');
				echo('<a href="./?admin&ban&u='.$posterid.'">Ban '.$posterid.':'.$postername.'</a>');
				echo('<hr><br>');
			}
			
			//art
			echo('Art: <br>');
			$feed = mysqli_query($sqli, "SELECT * FROM art_feed ORDER BY id DESC");
			$rows = mysqli_num_rows($feed);
			$feedurl = './?f=art';
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
				echo('</div><a href="./?admin&removet&f=art&t='.$id.'">Remove Post #'.$id.'</a><br>');
				echo('<a href="./?admin&ban&u='.$posterid.'">Ban '.$posterid.':'.$postername.'</a>');
				echo('<hr><br>');
			}
			
			//rand
			echo('Random: <br>');
			$feed = mysqli_query($sqli, "SELECT * FROM rand_feed ORDER BY id DESC");
			$rows = mysqli_num_rows($feed);
			$feedurl = './?f=rand';
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
				echo('</div><a href="./?admin&removet&f=rand&t='.$id.'">Remove Post #'.$id.'</a><br>');
				echo('<a href="./?admin&ban&u='.$posterid.'">Ban '.$posterid.':'.$postername.'</a>');
				echo('<hr><br>');
			}
			
			//pol
			echo('Political: <br>');
			$feed = mysqli_query($sqli, "SELECT * FROM pol_feed ORDER BY id DESC");
			$rows = mysqli_num_rows($feed);
			$feedurl = './?f=pol';
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
				echo('</div><a href="./?admin&removet&f=pol&t='.$id.'">Remove Post #'.$id.'</a><br>');
				echo('<a href="./?admin&ban&u='.$posterid.'">Ban '.$posterid.':'.$postername.'</a>');
				echo('<hr><br>');
			}
			
			//COMMENTS
			echo('COMMENTS: <br>');
			//general
			echo('General: <br>');
			$feed = mysqli_query($sqli, "SELECT * FROM comments ORDER BY id DESC");
			$rows = mysqli_num_rows($feed);
			$feedurl = './?';
			for($i=0;$i<$rows;$i++){
				$row = mysqli_fetch_array($feed);
				$text = $row['text'];
				$id = $row['id'];
				$opid = $row['opid'];
				$posterid = $row['posterid'];
				$postername = mysqli_fetch_array(mysqli_query($sqli, "SELECT username FROM users WHERE id='".$posterid."'"))[0];
				$date = $row['date'];
				echo('<div id="reply">');
				echo('##'.$id.' ('.$postername.') @ '.$date.'<br>');
				echo($text.'<br>');
				echo('<a href="'.$feedurl.'&t='.$opid.'">>OP</a>');
				echo('</div><a href="./?admin&removec&f=gen&c='.$id.'">Remove Post ##'.$id.'</a><br>');
				echo('<a href="./?admin&ban&u='.$posterid.'">Ban '.$posterid.':'.$postername.'</a>');
				echo('<hr><br>');
			}
			
			//vid
			echo('Video Games: <br>');
			$feed = mysqli_query($sqli, "SELECT * FROM vid_comments ORDER BY id DESC");
			$rows = mysqli_num_rows($feed);
			$feedurl = './?f=vid';
			for($i=0;$i<$rows;$i++){
				$row = mysqli_fetch_array($feed);
				$text = $row['text'];
				$id = $row['id'];
				$opid = $row['opid'];
				$posterid = $row['posterid'];
				$postername = mysqli_fetch_array(mysqli_query($sqli, "SELECT username FROM users WHERE id='".$posterid."'"))[0];
				$date = $row['date'];
				echo('<div id="reply">');
				echo('##'.$id.' ('.$postername.') @ '.$date.'<br>');
				echo($text.'<br>');
				echo('<a href="'.$feedurl.'&t='.$opid.'">>OP</a>');
				echo('</div><a href="./?admin&removec&f=vid&c='.$id.'">Remove Post ##'.$id.'</a><br>');
				echo('<a href="./?admin&ban&u='.$posterid.'">Ban '.$posterid.':'.$postername.'</a>');
				echo('<hr><br>');
			}
			
			//tech
			echo('Technology: <br>');
			$feed = mysqli_query($sqli, "SELECT * FROM tech_comments ORDER BY id DESC");
			$rows = mysqli_num_rows($feed);
			$feedurl = './?f=tech';
			for($i=0;$i<$rows;$i++){
				$row = mysqli_fetch_array($feed);
				$text = $row['text'];
				$id = $row['id'];
				$opid = $row['opid'];
				$posterid = $row['posterid'];
				$postername = mysqli_fetch_array(mysqli_query($sqli, "SELECT username FROM users WHERE id='".$posterid."'"))[0];
				$date = $row['date'];
				echo('<div id="reply">');
				echo('##'.$id.' ('.$postername.') @ '.$date.'<br>');
				echo($text.'<br>');
				echo('<a href="'.$feedurl.'&t='.$opid.'">>OP</a>');
				echo('</div><a href="./?admin&removec&f=tech&c='.$id.'">Remove Post ##'.$id.'</a><br>');
				echo('<a href="./?admin&ban&u='.$posterid.'">Ban '.$posterid.':'.$postername.'</a>');
				echo('<hr><br>');
			}
			
			//art
			echo('Art: <br>');
			$feed = mysqli_query($sqli, "SELECT * FROM art_comments ORDER BY id DESC");
			$rows = mysqli_num_rows($feed);
			$feedurl = './?f=art';
			for($i=0;$i<$rows;$i++){
				$row = mysqli_fetch_array($feed);
				$text = $row['text'];
				$id = $row['id'];
				$opid = $row['opid'];
				$posterid = $row['posterid'];
				$postername = mysqli_fetch_array(mysqli_query($sqli, "SELECT username FROM users WHERE id='".$posterid."'"))[0];
				$date = $row['date'];
				echo('<div id="reply">');
				echo('##'.$id.' ('.$postername.') @ '.$date.'<br>');
				echo($text.'<br>');
				echo('<a href="'.$feedurl.'&t='.$opid.'">>OP</a>');
				echo('</div><a href="./?admin&removec&f=art&c='.$id.'">Remove Post ##'.$id.'</a><br>');
				echo('<a href="./?admin&ban&u='.$posterid.'">Ban '.$posterid.':'.$postername.'</a>');
				echo('<hr><br>');
			}
			
			//rand
			echo('Random: <br>');
			$feed = mysqli_query($sqli, "SELECT * FROM rand_comments ORDER BY id DESC");
			$rows = mysqli_num_rows($feed);
			$feedurl = './?f=rand';
			for($i=0;$i<$rows;$i++){
				$row = mysqli_fetch_array($feed);
				$text = $row['text'];
				$id = $row['id'];
				$opid = $row['opid'];
				$posterid = $row['posterid'];
				$postername = mysqli_fetch_array(mysqli_query($sqli, "SELECT username FROM users WHERE id='".$posterid."'"))[0];
				$date = $row['date'];
				echo('<div id="reply">');
				echo('##'.$id.' ('.$postername.') @ '.$date.'<br>');
				echo($text.'<br>');
				echo('<a href="'.$feedurl.'&t='.$opid.'">>OP</a>');
				echo('</div><a href="./?admin&removec&f=rand&c='.$id.'">Remove Post ##'.$id.'</a><br>');
				echo('<a href="./?admin&ban&u='.$posterid.'">Ban '.$posterid.':'.$postername.'</a>');
				echo('<hr><br>');
			}
			
			//pol
			echo('Politically Incorrect: <br>');
			$feed = mysqli_query($sqli, "SELECT * FROM pol_comments ORDER BY id DESC");
			$rows = mysqli_num_rows($feed);
			$feedurl = './?f=art';
			for($i=0;$i<$rows;$i++){
				$row = mysqli_fetch_array($feed);
				$text = $row['text'];
				$id = $row['id'];
				$opid = $row['opid'];
				$posterid = $row['posterid'];
				$postername = mysqli_fetch_array(mysqli_query($sqli, "SELECT username FROM users WHERE id='".$posterid."'"))[0];
				$date = $row['date'];
				echo('<div id="reply">');
				echo('##'.$id.' ('.$postername.') @ '.$date.'<br>');
				echo($text.'<br>');
				echo('<a href="'.$feedurl.'&t='.$opid.'">>OP</a>');
				echo('</div><a href="./?admin&removec&f=pol&c='.$id.'">Remove Post ##'.$id.'</a><br>');
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