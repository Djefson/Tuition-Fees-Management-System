<?php
 session_start();
 $userid=$_SESSION['valid_user'];
 $type=$_SESSION['valid_type'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Edit User Information</title>
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

<style type="text/css" title="currentStyle">
                @import "css/grid_sytles.css";
                @import "css/themes/smoothness/jquery-ui-1.8.4.custom.css";
</style>

    <script  type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
    <script  type="text/javascript" src="js/jquery-ui-1.7.custom.min.js"></script>
    <script  type="text/javascript" src="js/jquery-search.js"></script>

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
						<li class="nav4"><a href="reports.php"><span><span>Reports</span></span></a></li>
						<li id="menu_active" class="nav5"><a href="administration.php"><span><span>Settings</span></span></a></li>
					</ul>
				</nav>
			</div>
		</header><div class="ic"></div>
<!-- content -->
<article id="content">
<section>
<h2>Edit User's Information</h2>
<h3>
<?php
include"connect.php";
if(isset($_POST['edituser']))
{
	$a=$_POST['userid'];
	$b=$_POST['username'];
	$c=$_POST['password'];
	$d=$_POST['workdepartment'];
	$e=$_POST['servicetitle'];
	$f=$_POST['studieslevel'];
	$query=mysql_query("UPDATE users SET username='$b',password='$c',workdepartment='$d',servicetitle='$e',studieslevel='$f' WHERE userid='$a' LIMIT 1;",$con)or die("<h3>Problem with Edition of Data:</h3>:".mysql_error());	
	if(!empty($query))
	{
		echo"<h3>User Edited successfully !!!</h3>";
		echo"<h3><a href='administration.php' class='button'>Continue</a></h3>";	
	}
	else
	{		
		echo"<h3>User Not Edited successfully</h3>";	
		echo"<h3><a href='administration.php' class='button'>Continue</a></h3>";
	}		

}

if(isset($_GET['id']))
{
$var=$_GET['id'];
$sql=mysql_query("SELECT * FROM users WHERE userid='$var' LIMIT 0,1")or die("<h3>Problem with selection of Data:</h3>".mysql_error());
while($row=mysql_fetch_array($sql))
{
	$a=$row['userid'];
	$b=$row['username'];
	$c=$row['password'];
	$d=$row['workdepartment'];
	$e=$row['servicetitle'];
	$f=$row['studieslevel'];
?>
<form action="edituser.php" method="post" id="ContactForm">
<table width="200" border="0">
  <tr>
    <td>UserID:</td>
    <td><input type="hidden" name="userid" value="<?php echo $a;?>"/><?php echo $a;?></td>
  </tr>
  <tr>
    <td>Username:</td>
	
    <td><div class="bg"><input type="text" class="input" name="username" value="<?php echo $b;?>"/></div></td>
  </tr>
  <tr>
    <td>Password:</td>
    <td><div class="bg"><input type="password" class="input" name="password" placeholder="**********" value="<?php echo $c;?>"/></div></td>
  </tr>
  <tr>
    <td>WorkDepartement:</td>
    <td><div class="bg"><input type="text" class="input" name="workdepartment" value="<?php echo $d;?>"/></div></td>
  </tr>
  <tr>
    <td>ServiceTitle:</td>
	  <td><div class="bg"><input type="text" class="input" name="servicetitle" value="<?php echo $e;?>"/></div></td>
  </tr>
  <tr>
    <td>StudiesLevel:</td>
	  <td><div class="bg"><input type="text" class="input" name="studieslevel" value="<?php echo $f;?>"/></div></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" name="edituser" value="Update" class="button">
	<input type="reset" name="" value="Cancel" class="button"></td>
  </tr>
</table>
</form>
<?php
}
}
?>
</h3>
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