<?php
 session_start();
 $userid=$_SESSION['valid_user'];
 $type=$_SESSION['valid_type'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Settings</title>
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
			<section class="col1">
				<h2>Setting's Detail</h2>
				here
       		</section>
			<section class="col2">
				<h2 class="pad_bot1">Users</h2>
				<?php
				include"connect.php";
				if(isset($_REQUEST['adduser']))
				{
				?>
				<form action="administration.php" method="post" id="ContactForm">
<table width="200" border="0">
  <tr>
    <td>UserID:</td>
    <td><div class="bg"><input type="text" class="input" name="userid" value=""/></div></td>
  </tr>
  <tr>
    <td>Username:</td>
	
    <td><div class="bg"><input type="text" class="input" name="username" value=""/></div></td>
  </tr>
  <tr>
    <td>Password:</td>
    <td><div class="bg"><input type="password" class="input" name="password" placeholder="**********"/></div></td>
  </tr>
  <tr>
    <td>WorkDepartement:</td>
    <td><div class="bg"><input type="text" class="input" name="workdepartment" value=""/></div></td>
  </tr>
  <tr>
    <td>ServiceTitle:</td>
	  <td><div class="bg"><input type="text" class="input" name="servicetitle" value=""/></div></td>
  </tr>
  <tr>
    <td>StudiesLevel:</td>
	  <td><div class="bg"><input type="text" class="input" name="studieslevel" value=""/></div></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" name="submituser" value="Save" class="button">
	<input type="reset" name="" value="Cancel" class="button"></td>
  </tr>
</table>
</form>
				<?php
				}
				if(isset($_POST['submituser']))
				{
						$a=$_POST['userid'];
						$b=$_POST['username'];
						$c=$_POST['password'];
						$d=$_POST['workdepartment'];
						$e=$_POST['servicetitle'];
						$f=$_POST['studieslevel'];
						$query=mysql_query("INSERT INTO users (userid, username, password, workdepartment, servicetitle, studieslevel) VALUES('$a','$b','$c','$d','$e','$f')",$con)or die("<h3>Problem with Insertion of Data:</h3>:".mysql_error());	
						if(!empty($query))
						{
							echo"<h3>User inserted successfully  !!!! </h3>";
						}
						else
						{
							echo"<h3>User not inserted successfully</h3>";
						}		
				}
				mysql_close($con);
				?>
				<form action="administration.php" method="post" id="ContactForm">
					<input type="submit" name="adduser" value="Add User" class="button">
				</form>

<table width="200" border="1">
  <tr>
    <th>UserID</th>
    <th>Username</th>
    <th>Password</th>
    <th>Departement</th>
    <th>Title</th>
    <th>Level</th>
    <th>Edit</th>
	<th>Delete</th>
  </tr>
  <?php 
  	include"connect.php";
	$sql=mysql_query("SELECT * FROM users",$con);
	while($row=mysql_fetch_array($sql))
	{
		$a=$row['userid'];
		$b=$row['username'];
		$c=$row['password'];
		$d=$row['workdepartment'];
		$e=$row['servicetitle'];
		$f=$row['studieslevel'];
	echo"<tr>
    <td>$a</td>
    <td>$b</td>
    <td>**********</td>
    <td>$d</td>
    <td>$e</td>
    <td>$f</td>
    <td><a href=edituser.php?id=$a><img src='images/b_edit.png'></a></td>
	<td><a href=deluser.php?id=$a><img src='images/b_drop.png'></a></td>
  	</tr>";
	}
	mysql_close($con);
?>
</table>





<h2 class="pad_bot1">Payement Mode</h2>
				<?php
				include"connect.php";
				if(isset($_REQUEST['addpayementmode']))
				{
				?>
				<form action="administration.php" method="post" id="ContactForm">
<table width="200" border="0">
  <tr>
    <td>Payement Mode Information:</td>
    <td><div class="bg"><input type="text" class="input" name="payementmode" value=""/></div></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" name="savepayementmode" value="Save" class="button">
	<input type="reset" name="" value="Cancel" class="button"></td>
  </tr>
</table>
</form>
				<?php
				}
				if(isset($_POST['savepayementmode']))
				{
						$a=$_POST['payementmode'];
							
				}
				mysql_close($con);
				?>
				<form action="administration.php" method="post" id="ContactForm">
					<input type="submit" name="addpayementmode" value="Add User" class="button">
				</form>

<table width="200" border="1">
  <tr>
    <th>Payement Mode</th>
    <th>Payement Installment</th>
    <th>Description</th>
    <th>Edit</th>
	<th>Delete</th>
  </tr>
  <?php 
  	include"connect.php";
	$sql=mysql_query("SELECT * FROM paymentmode",$con);
	while($row=mysql_fetch_array($sql))
	{
		$a=$row['payementmodeid'];
		$b=$row['payementinstallment'];
		$c=$row['description'];
	echo"<tr>
    <td>$a</td>
    <td>$b</td>
    <td>$c</td>
    <td><a href='#'><img src='images/b_edit.png'></a></td>
	<td><a href='#'><img src='images/b_drop.png'></a></td>
  	</tr>";
	}
	mysql_close($con);
?>
</table>






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