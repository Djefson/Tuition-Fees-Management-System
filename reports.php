<?php
 session_start();
 $userid=$_SESSION['valid_user'];
 $type=$_SESSION['valid_type'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Fees Reports</title>
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
					  <li id="menu_active" class="nav4"><a href="reports.php"><span><span>Reports</span></span></a></li>
					  <li class="nav5"><a href="administration.php"><span><span>Settings</span></span></a></li>
				  </ul>
			  </nav>
			</div>
		</header><div class="ic"></div>
<!-- content -->
		<article id="content">
			<section class="col1">
				<h2><figure><img src="images/page2_img1.jpg" alt=""><img src="images/page2_img4.jpg" alt=""></figure></h2>
				<h4>Enter Academic Year and Tuition Type</h4>
				<form method="post" action="byt_year1.php" id="ContactForm" target="_blank">

								<div class="bg">
								
								<select name="field">
								<option>Select Tuition Type</option>
								<?php
								include"connect.php";
								if($result = mysql_query("SELECT * FROM paymentdetail",$con)) 
								{
									for($i=4; $i<= mysql_num_fields($result); $i++ ) 
									{
										$field=mysql_field_name($result, $i-1);
										echo"<option>$field</option>";
									}
								}
								?>
								</select>
								<input type="text" name="academicyear" placeholder="Enter Year">
								<input type="submit" name="ok" value="OK" class="button"></div>
				</form>
				<br />
				<h4>Select Departement, Tuition Type and Enter Academic Year</h4>
				<form method="post" action="by_depart_year1.php" id="ContactForm" target="_blank">

								<div class="bg">
								<select name="departement">
								<option>select departement</option>
								<?php
								include"connect.php";
								$sql=mysql_query("SELECT * FROM departement",$con);
								while($row=mysql_fetch_array($sql))
								{
									$a=$row['departid'];
									echo"<option>$a</option>";
								}
								mysql_close($con);
								?>
								</select>
								<select name="field">
								<option>Select Tuition Type</option>
								<?php
								include"connect.php";
								if($result = mysql_query("SELECT * FROM paymentdetail",$con)) 
								{
									for($i=4; $i<= mysql_num_fields($result); $i++ ) 
									{
										$field=mysql_field_name($result, $i-1);
										echo"<option>$field</option>";
									}
								}
								?>
								</select>
								<input type="text" name="academicyear" placeholder="Enter Year"><br />
								<input type="submit" name="ok" value="OK" class="button"></div>
				</form>
				<h4>Select Departement, Semester, Tuition Type and Enter Academic Year</h4>
				<form method="post" action="semester_depart_year1.php" id="ContactForm" target="_blank">
								<div class="bg">
								<select name="departement">
								<option>select departement</option>
								<?php
								include"connect.php";
								$sql=mysql_query("SELECT * FROM departement",$con);
								while($row=mysql_fetch_array($sql))
								{
									$a=$row['departid'];
									echo"<option>$a</option>";
								}
								mysql_close($con);
								?>
								</select>
								<select name="semester">
									<option>select semester</option>
									<option>First Semester</option>
									<option>Last Semester</option>
								</select>
								<select name="field">
								<option>Select Tuition Type</option>
								<?php
								include"connect.php";
								if($result = mysql_query("SELECT * FROM paymentdetail",$con)) 
								{
									for($i=4; $i<= mysql_num_fields($result); $i++ ) 
									{
										$field=mysql_field_name($result, $i-1);
										echo"<option>$field</option>";
									}
								}
								?>
								</select>
								<input type="text" name="academicyear" placeholder="Enter Year"><br />
								<input type="submit" name="ok" value="OK" class="button"></div>
				</form>
       		</section>
			<section class="col2">
			<h2>Reports</h2>
				<h4>Enter Academic Year</h4>
				<form method="post" action="byt_year.php" id="ContactForm" target="_blank">

								<div class="bg">
								<input type="text" name="academicyear" placeholder="Enter Year">
								<input type="submit" name="ok" value="OK" class="button"></div>
				</form>
				<br /><br /><br />
				<h4>Select Departement and Enter Academic Year</h4>
				<form method="post" action="by_depart_year.php" id="ContactForm" target="_blank">

								<div class="bg">
								<select name="departement">
								<option>select departement</option>
								<?php
								include"connect.php";
								$sql=mysql_query("SELECT * FROM departement",$con);
								while($row=mysql_fetch_array($sql))
								{
									$a=$row['departid'];
									echo"<option>$a</option>";
								}
								mysql_close($con);
								?>
								</select>
								<input type="text" name="academicyear" placeholder="Enter Year">
								<input type="submit" name="ok" value="OK" class="button"></div>
				</form>
				<br /><br /><br /><br /><br />
				<h4>Select Departement, Semester and Enter Academic Year</h4>
				<form method="post" action="semester_depart_year.php" id="ContactForm" target="_blank">

								<div class="bg">
								<select name="departement">
								<option>select departement</option>
								<?php
								include"connect.php";
								$sql=mysql_query("SELECT * FROM departement",$con);
								while($row=mysql_fetch_array($sql))
								{
									$a=$row['departid'];
									echo"<option>$a</option>";
								}
								mysql_close($con);
								?>
								</select>
								<select name="semester">
									<option>select semester</option>
									<option>First Semester</option>
									<option>Last Semester</option>
								</select>
								<input type="text" name="academicyear" placeholder="Enter Year">
								<input type="submit" name="ok" value="OK" class="button"></div>
				</form>	
       		</section>
		</article>
	</div>
</div>

<div class="main">
	<footer>&copy;2012- ISPG Tuition Fees Management System</footer>
</div>
<script type="text/javascript"> Cufon.now();</script>
</body>
</html>