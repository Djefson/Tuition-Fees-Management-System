<?
//Unset the variables stored in session
	session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
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
<body id="page5">
<div class="body1">
	<div class="main">
<!-- header -->
<header>
  <div class="wrapper">
    <nav>
      <ul id="top_nav">
	  
      </ul>
    </nav>
    <span class="date"><?php $d=date("D M d,Y"); echo $d;?></span> </div>
  <div class="wrapper">
    <h1><a href="index.php" id="logo">Pro Soft</a></h1>
    <nav>
      <ul id="menu">
        <li id="menu_active"><a><span><span>Welcome to ISPG Tuition Fees Management System</span></span></a></li>
      </ul>
    </nav>
  </div>

</header>
<div class="ic"></div>
<!-- content -->
		<article id="content">
			<section class="col2">				
					<figure class="left marg_right1"><img src="images/ISPGlogo.JPG" alt=""></figure>
				<h2 class="pad_bot1">User Identification - Login</h2>
				<p class="pad_top1 pad_bot1">
			  <div>
					<form id="ContactForm" method="post" action="kiki.php">
					<table>
					<tr>
						<td>Enter Username:</td>
						<td><div class="bg">
	<select name="us">
	<option>Select Username</option>
	<?php
	include"connect.php";
	$sql=mysql_query("SELECT * FROM users",$con);
	while($row=mysql_fetch_array($sql))
	{
		$a=$row['username'];
		echo"<option>$a</option>";
	}
	mysql_close($con);
	?>
</select></div></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><div class="bg"><input type="password" class="input" name="pw" /></div></td>
					</tr>
					<tr>
						<td></td>
						<td>.</td>
					</tr>
					<tr>
						<td><input type="submit" value="Login" class="button" name="submit"></td>
						<td><input type="reset" value="Cancel" class="button" name="submit"></td>
					</tr>
					</table>
				</form>
			  </div>
					</p>
       		</section>
	  </article>
  </div>
</div>

<div class="main">
	<footer>&copy; 2012- ISPG Tuition Fees Management System</footer>
</div>
<script type="text/javascript"> Cufon.now();</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#myRoundabout').roundabout({
			 shape: 'square',
        	 minScale: 0.89, // tiny!
        	 maxScale: 1, // tiny!
			 easing:'easeOutExpo',
			 clickToFocus:'true',
			 focusBearing:'0',
			 duration:800,
			 reflect:true
		});
	});
</script>
</body>
</html>