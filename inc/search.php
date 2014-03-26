<?php
	$searchQuery = mysqli_real_escape_string($sqli ,$_GET['search']);
	
	//	GENERAL FEED
	echo('Results from General feed: <br>');
	$feed = mysqli_query($sqli, "SELECT * FROM feed WHERE text LIKE '%".$searchQuery."%' ORDER BY id DESC");
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
		echo('</div><hr>');
	}
	
	//	GENERAL'S COMMENTS
	echo('Results from General feed comments: <br>');
	$feedurl = './?';
	$comments = mysqli_query($sqli, "SELECT * FROM comments WHERE text LIKE '%".$searchQuery."%' ORDER BY id DESC");
	$rows = mysqli_num_rows($comments);
	for($i = 0; $i < $rows; $i++){
		$row = mysqli_fetch_array($comments);
		$text = $row['text'];
		$id = $row['id'];
		$posterid = $row['posterid'];
		$postername = mysqli_fetch_array(mysqli_query($sqli, "SELECT username FROM users WHERE id='".$posterid."'"))[0];
		$date = $row['date'];
		$threadid = $row['opid'];
		echo('<div id="reply">');
		echo('<a id="'.$id.'" href="'.$feedurl.'&t='.$threadid.'#'.$id.'">##'.$id.'</a> ('.$postername.') @ '.$date.'<br>');
		echo($text.'<br>');
		echo('</div><hr>');
	}
	
	//	VIDYA
	echo('Results from Video Games feed: <br>');
	$feed = mysqli_query($sqli, "SELECT * FROM vid_feed WHERE text LIKE '%".$searchQuery."%' ORDER BY id DESC");
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
		echo('</div><hr>');
	}
	
	//	VIDYAS'S COMMENTS
	echo('Results from Video Games feed comments: <br>');
	$feedurl = './?f=vid';
	$comments = mysqli_query($sqli, "SELECT * FROM vid_comments WHERE text LIKE '%".$searchQuery."%' ORDER BY id DESC");
	$rows = mysqli_num_rows($comments);
	for($i = 0; $i < $rows; $i++){
		$row = mysqli_fetch_array($comments);
		$text = $row['text'];
		$id = $row['id'];
		$posterid = $row['posterid'];
		$postername = mysqli_fetch_array(mysqli_query($sqli, "SELECT username FROM users WHERE id='".$posterid."'"))[0];
		$date = $row['date'];
		$threadid = $row['opid'];
		echo('<div id="reply">');
		echo('<a id="'.$id.'" href="'.$feedurl.'&t='.$threadid.'#'.$id.'">##'.$id.'</a> ('.$postername.') @ '.$date.'<br>');
		echo($text.'<br>');
		echo('</div><hr>');
	}
	
	//	tech
	echo('Results from Technology feed: <br>');
	$feed = mysqli_query($sqli, "SELECT * FROM tech_feed WHERE text LIKE '%".$searchQuery."%' ORDER BY id DESC");
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
		echo('</div><hr>');
	}
	
	//	tech'S COMMENTS
	echo('Results from Technology feed comments: <br>');
	$feedurl = './?f=tech';
	$comments = mysqli_query($sqli, "SELECT * FROM tech_comments WHERE text LIKE '%".$searchQuery."%' ORDER BY id DESC");
	$rows = mysqli_num_rows($comments);
	for($i = 0; $i < $rows; $i++){
		$row = mysqli_fetch_array($comments);
		$text = $row['text'];
		$id = $row['id'];
		$posterid = $row['posterid'];
		$postername = mysqli_fetch_array(mysqli_query($sqli, "SELECT username FROM users WHERE id='".$posterid."'"))[0];
		$date = $row['date'];
		$threadid = $row['opid'];
		echo('<div id="reply">');
		echo('<a id="'.$id.'" href="'.$feedurl.'&t='.$threadid.'#'.$id.'">##'.$id.'</a> ('.$postername.') @ '.$date.'<br>');
		echo($text.'<br>');
		echo('</div><hr>');
	}
	
	//	art
	echo('Results from Art/Critique feed: <br>');
	$feed = mysqli_query($sqli, "SELECT * FROM art_feed WHERE text LIKE '%".$searchQuery."%' ORDER BY id DESC");
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
		echo('</div><hr>');
	}
	
	//	art'S COMMENTS
	echo('Results from Art/Critique feed comments: <br>');
	$feedurl = './?f=art';
	$comments = mysqli_query($sqli, "SELECT * FROM art_comments WHERE text LIKE '%".$searchQuery."%' ORDER BY id DESC");
	$rows = mysqli_num_rows($comments);
	for($i = 0; $i < $rows; $i++){
		$row = mysqli_fetch_array($comments);
		$text = $row['text'];
		$id = $row['id'];
		$posterid = $row['posterid'];
		$postername = mysqli_fetch_array(mysqli_query($sqli, "SELECT username FROM users WHERE id='".$posterid."'"))[0];
		$date = $row['date'];
		$threadid = $row['opid'];
		echo('<div id="reply">');
		echo('<a id="'.$id.'" href="'.$feedurl.'&t='.$threadid.'#'.$id.'">##'.$id.'</a> ('.$postername.') @ '.$date.'<br>');
		echo($text.'<br>');
		echo('</div><hr>');
	}
	
	//	rand
	echo('Results from Random feed: <br>');
	$feed = mysqli_query($sqli, "SELECT * FROM rand_feed WHERE text LIKE '%".$searchQuery."%' ORDER BY id DESC");
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
		echo('</div><hr>');
	}
	
	//	rand'S COMMENTS
	echo('Results from Random feed comments: <br>');
	$feedurl = './?f=rand';
	$comments = mysqli_query($sqli, "SELECT * FROM rand_comments WHERE text LIKE '%".$searchQuery."%' ORDER BY id DESC");
	$rows = mysqli_num_rows($comments);
	for($i = 0; $i < $rows; $i++){
		$row = mysqli_fetch_array($comments);
		$text = $row['text'];
		$id = $row['id'];
		$posterid = $row['posterid'];
		$postername = mysqli_fetch_array(mysqli_query($sqli, "SELECT username FROM users WHERE id='".$posterid."'"))[0];
		$date = $row['date'];
		$threadid = $row['opid'];
		echo('<div id="reply">');
		echo('<a id="'.$id.'" href="'.$feedurl.'&t='.$threadid.'#'.$id.'">##'.$id.'</a> ('.$postername.') @ '.$date.'<br>');
		echo($text.'<br>');
		echo('</div><hr>');
	}
	
	//	pol
	echo('Results from Politically Incorrect feed: <br>');
	$feed = mysqli_query($sqli, "SELECT * FROM pol_feed WHERE text LIKE '%".$searchQuery."%' ORDER BY id DESC");
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
		echo('</div><hr>');
	}
	
	//	pol'S COMMENTS
	echo('Results from Politically Incorrect feed comments: <br>');
	$feedurl = './?f=pol';
	$comments = mysqli_query($sqli, "SELECT * FROM pol_comments WHERE text LIKE '%".$searchQuery."%' ORDER BY id DESC");
	$rows = mysqli_num_rows($comments);
	for($i = 0; $i < $rows; $i++){
		$row = mysqli_fetch_array($comments);
		$text = $row['text'];
		$id = $row['id'];
		$posterid = $row['posterid'];
		$postername = mysqli_fetch_array(mysqli_query($sqli, "SELECT username FROM users WHERE id='".$posterid."'"))[0];
		$date = $row['date'];
		$threadid = $row['opid'];
		echo('<div id="reply">');
		echo('<a id="'.$id.'" href="'.$feedurl.'&t='.$threadid.'#'.$id.'">##'.$id.'</a> ('.$postername.') @ '.$date.'<br>');
		echo($text.'<br>');
		echo('</div><hr>');
	}
	
?>