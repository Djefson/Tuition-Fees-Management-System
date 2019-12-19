<?php
 session_start();
 $userid=$_SESSION['valid_user'];
 $type=$_SESSION['valid_type'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Delete a User</title>
<meta charset="utf-8">
<link rel="shortcut icon" href="favicon.ico">
<link rel="icon" type="image/gif" href="animated_favicon1.gif">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.6.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Didact_Gothic_400.font.js"></script>
<script type="text/javascript" src="js/Shanti_400.font.js"></script>
<script src="js/roundabout.js" type="text/javascript"></script>
<script src="js/roundabout_shapes.js" type="text/javascript"></script>
<script src="js/jquery.easing.1.2.js" type="text/javascript"></script>
<script type="text/javascript" src="js/script.js"></script>
</head>
<body id="page2">
<div class="body1">
	<div class="main">
<!-- header -->
		<header>
			<div class="wrapper">
			<nav>
					<ul id="top_nav">
						<li><a>Welcome : <?php echo $userid;?></a></li>
						<li><a href="index.php">Disconnect</a></li>
					</ul>
				</nav>
				<span class="date"><?php $d=date("D M d,Y"); echo $d;?></span>
			</div>
			<div class="wrapper">
				<h1><a id="logo">Pro Soft</a></h1>
				<nav>
					<ul id="menu">
						<li><a href="students.php"><span><span>Students</span></span></a></li>
						<li><a href="schedule.php"><span><span>About Fees</span></span></a></li>
						<li class="nav3"><a href="documents.php"><span><span>Billing</span></span></a></li>
						<li class="nav4"><a href="reports.php"><span><span>Reports</span></span></a></li>
						<li id="menu_active" class="nav5"><a href="administration.php"><span><span>Settings</span></span></a></li>
					</ul>
				</nav>
			</div>
		</header><div class="ic"></div>
<!-- content -->
		<article id="content">
			<section class="col2">
	<?php
	$a=$_GET['id'];
	include"connect.php";
	$query=mysql_query("DELETE FROM `tuition`.`users` WHERE `users`.`userid` = '$a' LIMIT 1")or die("<h2>Can't delete, an error occur :</h2>".mysql_error());
	if(!empty($query))
	{
		echo"<h3>Record deleted successfully  !!!! </h3>";
		echo"<a href='administration.php' class='button right'>Continue</a>";
	}
	else
	{
		echo"<h3>Record not inserted successfully</h3>";
		echo"<a href='administration.php' class='button right'>Continue</a>";
	}	
	?>       		</section>
		</article>
	</div>
</div>
<div class="main">
	<footer>&copy;2012- ISPG Tuition Fees Management System</footer>
</div>
<script type="text/javascript"> Cufon.now();</script>
</body>
</html>