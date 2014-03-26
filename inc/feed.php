<?php 
	$feedurl = "./?";
	$rules = "genRules.php";
	if(!$loggedin&&!isset($_GET['t'])){
		//printf('You have to be logged in to post');
	}else{
		if(isset($_POST['newpost'])&&!empty($_POST['newpost'])){
			$newpost = htmlentities($_POST['newpost']);
			if(strlen($newpost)>0){
				if(mysqli_query($sqli, "INSERT INTO feed (posterid, text, date) VALUES ('".$userid."','".$newpost."','".date("Y-m-d H:i:s")."')")){
					header('Location: '.$feedurl);
				}else{
					printf('<p class="error">Posting failed</p>');
				}
			}
		}
	}
	if(isset($_GET['t'])&&!empty($_GET['t'])){
		$threadid = mysqli_real_escape_string($sqli, $_GET['t']);
		
		if(isset($_POST['newreply'])&&!empty($_POST['newreply'])){
			$newreply = htmlentities($_POST['newreply']);
			if(strlen($newreply)>0){
				if(mysqli_query($sqli, "INSERT INTO comments (posterid, opid, text, date) VALUES ('".$userid."', '".$threadid."','".$newreply."','".date("Y-m-d H:i:s")."')")){
					
				}else{
					printf('<p class="error">Posting failed</p>');
				}
			}
		}
		$thread = mysqli_query($sqli, "SELECT text FROM feed WHERE id='".$threadid."'");
		if(mysqli_num_rows($thread)==1){
			$thread = mysqli_fetch_array($thread)[0];
			$threadopid = mysqli_query($sqli, "SELECT posterid FROM feed WHERE id='".$threadid."'");
			$threadopid = mysqli_fetch_array($threadopid)[0];
			$threadop = mysqli_query($sqli, "SELECT username FROM users WHERE id='".$threadopid."'");
			$threadop = mysqli_fetch_array($threadop)[0];
			$date = mysqli_query($sqli, "SELECT date FROM feed WHERE id='".$threadid."'");
			$date = mysqli_fetch_array($date)[0];
			$privilege = mysqli_fetch_array(mysqli_query($sqli, "SELECT privilege FROM users WHERE id='".$threadopid."'"))[0];
			echo('<a href="'.$feedurl.'">Back</a>');
			echo('<div id="post">');
			echo('#'.$threadid.' ('.$threadop.')['.$privilege.'] @ '.$date.'<br>');
			$thread = nl2br($thread);
			$thread = preg_replace('/('.htmlentities('>').'.*)/', '<div class="quote">\1</div>', $thread);
			echo($thread);
			echo('</div><hr>');
			if(!$loggedin){
				printf('You have to be logged in to post');
			}elseif($currentprivileges==="banned"){
				printf('You were banned from posting.');
			}else{
				echo('<form method="post">');
				echo('<textarea name="newreply" class="fullWidth"></textarea>');
				echo('<input type="submit" value="Reply" class="rightAlign" />');
				echo('</form>');
			}
			$comments = mysqli_query($sqli, "SELECT * FROM comments WHERE opid='".$threadid."' ORDER BY id DESC");
			$rows = mysqli_num_rows($comments);
			for($i = 0; $i < $rows; $i++){
				$row = mysqli_fetch_array($comments);
				$text = $row['text'];
				$id = $row['id'];
				$posterid = $row['posterid'];
				$postername = mysqli_fetch_array(mysqli_query($sqli, "SELECT username FROM users WHERE id='".$posterid."'"))[0];
				$privilege = mysqli_fetch_array(mysqli_query($sqli, "SELECT privilege FROM users WHERE id='".$posterid."'"))[0];
				$date = $row['date'];
				echo('<div id="reply">');
				echo('<a id="'.$id.'" href="'.$feedurl.'&t='.$threadid.'#'.$id.'">##'.$id.'</a> ('.$postername.')['.$privilege.'] @ '.$date.'<br>');
				$text = nl2br($text);
				$text = preg_replace('/('.htmlentities('>').'.*)/', '<div class="quote">\1</div>', $text);
				echo($text);
				echo('</div><hr>');
			}
		}else{
			printf('<p class="error">Post not found.</p>');
			echo('<a href="'.$feedurl.'">Back</a>');
		}
		
	}else{
		if(!$loggedin&&!isset($_GET['t'])){
			printf('You have to be logged in to post');
		}elseif($currentprivileges==="banned"){
			printf('You were banned from posting.');
		}else{
			include('inc/feeds/'.$rules);
?>
<form method='post'>
	<textarea name="newpost" class="fullWidth"></textarea>
	<input type="submit" value="Post" class="rightAlign" />
</form>
<hr>
<?php
		}
		$feed = mysqli_query($sqli, "SELECT * FROM feed ORDER BY id DESC LIMIT 0 , 10");
		$rows = mysqli_num_rows($feed);
		for($i = 0; $i < $rows; $i++){
			$row = mysqli_fetch_array($feed);
			$text = $row['text'];
			$id = $row['id'];
			$posterid = $row['posterid'];
			$postername = mysqli_fetch_array(mysqli_query($sqli, "SELECT username FROM users WHERE id='".$posterid."'"))[0];
			$privilege = mysqli_fetch_array(mysqli_query($sqli, "SELECT privilege FROM users WHERE id='".$posterid."'"))[0];
			$date = $row['date'];
			echo('<div id="post">');
			echo('#'.$id.' ('.$postername.')['.$privilege.'] @ '.$date.'<br>');
			$text = nl2br($text);
			$text = preg_replace('/('.htmlentities('>').'.*)/', '<div class="quote">\1</div>', $text);
			echo($text);
			echo('<a href="'.$feedurl.'&t='.$id.'">>Replies</a>');
			echo('</div><hr>');
		}
	}
?>