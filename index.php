<?php
	require('inc/common.php');
	$page = 'inc/feed.php';
	if(isset($_GET['siterules'])){
		$page = 'websiterules.php';
	}
	if(isset($_GET['logs'])){
		$page = 'logs/all.administration.log';
	}elseif(isset($_GET['useradmin'])){
		$page = 'inc/useradmin.php';
	}elseif(isset($_GET['admin'])){
		$page = 'inc/admin.php';
	}elseif(isset($_GET['search'])&&!empty($_GET['search'])){
		$page = 'inc/search.php';
	}elseif(isset($_GET['p'])&&!empty($_GET['p'])){
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
		case 'account':
			$page = 'inc/account.php';
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
		case 'pol':
			$page = 'inc/feeds/pol.php';
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
				You're logged in  as: <?php echo($user); ?>. Your privilege: <?php echo($currentprivileges); ?>. 
				<?php 
					if($currentprivileges=="admin") echo('<a href="./?admin">Thread Administration</a> <a href="./?useradmin">User Administration</a>');
				?>
				<div class="rightAlign">
					
					<a href="./">Feed</a>
					<a href="./?p=account">Account</a>
					<a href="./?p=logout">Logout</a>
				</div>
				<?php } ?>
			</div>
			<div id="leftnav">
				<?php if(!$loggedin){ ?>
				<a href="./?p=login">Login</a><br>
				<a href="./?p=register">Register</a><br>
				<?php } ?>
				<h3>Feeds:</h3>
				<a href="./">General</a><br>
				<p>Interests:</p>
				<a href="./?f=vid">Video Games</a><br>
				<a href="./?f=tech">Technology</a><br>
				<p>Creative:</p>
				<a href="./?f=art">Art/Critique</a><br>
				<p>Misc: (NSFW)</p>
				<a href="./?f=rand">Random</a><br>
				<a href="./?f=pol">Politically Incorrect</a><br>
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