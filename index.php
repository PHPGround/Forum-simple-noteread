<?php
	require('inc/common.php');
	$page = 'inc/feed.php';
	if(isset($_GET['p'])&&!empty($_GET['p'])){
		switch($_GET['p']){
		case 'register':
			$page = 'inc/register.php';
			break;
		case 'login':
			$page = 'inc/login.php';
			break;
		case 'logout':
			$page = 'inc/logout.php';
			break;
		}
	}elseif(isset($_GET['f'])&&!empty($_GET['f'])){
		switch($_GET['f']){
		case 'vid':
			$page = 'inc/feeds/vid.php';
			break;
		case 'tech':
			$page = 'inc/feeds/tech.php';
			break;
		case 'art':
			$page = 'inc/feeds/art.php';
			break;
		case 'rand':
			$page = 'inc/feeds/rand.php';
			break;
		}
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Noteread</title>
		<link rel="stylesheet" href="./css/main.css" />
	</head>
	<body>
		<div id="wrapper">
			<div id="topnav">
				<a href="./">Home</a>
				<form method="get">
					<input type="text" placeholder="Search." name="search" />
				</form>
				<?php if($loggedin){ ?>
				You're logged in  as: <?php echo($user); ?>
				<div class="rightAlign">
					
					<a href="./">Feed</a>
					<a href="./?p=account">Account</a>
					<a href="./?p=logout">Logout</a>
				</div>
				<?php } ?>
			</div>
			<div id="leftnav">
				<?php if(!$loggedin){ ?>
				<a href="./?p=login">Login</a>
				<a href="./?p=register">Register</a>
				<?php } ?>
				<h3>Feeds:</h3>
				<a href="./">General</a>
				<p>Interests:</p>
				<a href="./?f=vid">Video Games</a>
				<a href="./?f=tech">Technology</a>
				<p>Creative:</p>
				<a href="./?f=art">Art/Critique</a>
				<p>Misc:</p>
				<a href="./?f=rand">Random</a>
			</div>
			<div id="feed">
				<?php
					include($page);
				?>
			</div>
			<div id="sidebar">
				<p>adspace maybe?</p>
			</div>
			<div id="footer">
				<p>&copy; Morkion 2014.</p>
			</div>
		</div>
	</body>
</html>