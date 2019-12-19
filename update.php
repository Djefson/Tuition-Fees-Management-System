<?php
 session_start();
 $userid=$_SESSION['valid_user'];
 $type=$_SESSION['valid_type'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Student Identification</title>
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
						<li id="menu_active"><a href="students.php"><span><span>Students</span></span></a></li>
						<li><a href="schedule.php"><span><span>About Fees</span></span></a></li>
						<li class="nav3"><a href="documents.php"><span><span>Billing</span></span></a></li>
						<li class="nav4"><a href="reports.php"><span><span>Reports</span></span></a></li>
						<li class="nav5"><a href="administration.php"><span><span>Settings</span></span></a></li>
					</ul>
				</nav>
			</div>
		</header><div class="ic"></div>
<!-- content -->
<article id="content">

			<section>
				<h2 class="pad_bot1">Student's Information</h2>
				<div id="container">

    <div id="dataTable">
        <div class="ui-grid ui-widget ui-widget-content ui-corner-all">

            <div class="ui-grid-header ui-widget-header ui-corner-top clearfix">

                <div class="header-left">
                    <!-- Left side of table header -->
                </div>

                <div class="header-right">
                    Search:<input style="width:150px;" id="searchData" type="text"><br /></div>
                </div>

            <table class="ui-grid-content ui-widget-content cStoreDataTable" id="cStoreDataTable">
                <thead>
                    <tr>
                        <th class="ui-state-default">ID</th>
                        <th class="ui-state-default">Names</th>
						<th class="ui-state-default">Gender</th>
						<th class="ui-state-default">Sponsorship</th>
						<th class="ui-state-default">Phone</th>
						<th class="ui-state-default">Dep. ID</th>
                    </tr>
                </thead>
                <tbody id="results"></tbody>
            </table>
            <div class="ui-grid-footer ui-widget-header ui-corner-bottom">
                <div class="grid-results">Results </div>
            </div>
        </div>
    </div>

</div>
       		</section>
<section>
<h2>Edit Student's Information</h2>
<h3>
<?php
include"connect.php";
if(isset($_POST['stdsubmit']))
{
	$a=$_POST['stdid'];
	$b=$_POST['stdname'];
	$c=$_POST['stdaddress'];
	$e=$_POST['stdstatus'];
	$f=$_POST['stdsponsor'];
	$g=$_POST['stddob'];
	$h=$_POST['stdgender'];
	$i=$_POST['departement'];
	$d=$_POST['stdphone'];
	$query=mysql_query("UPDATE student SET stdname='$b',stdaddress='$c',stdphone='$d',stdmaritalstatus='$e',stdsponsorship='$f',stdDOB='$g',stdgender='$h',departid='$i' WHERE stdid='$a' LIMIT 1;",$con)or die("<h3>Problem with Edition of Data:</h3>:".mysql_error());	
	if(!empty($query))
	{
		echo"<h3><a href='students.php' class='button'>Continue</a></h3>";
		echo"<h3>Record Edited successfully !!!</h3>";
	}
	else
	{
		echo"<h3><a href='students.php' class='button'>Continue</a></h3>";
		echo"<h3>Record Not Edited successfully</h3>";
	}		

}
if(isset($_GET['id']))
{
	$var=$_GET['id'];
$sql=mysql_query("SELECT * FROM student WHERE stdid='$var'")or die("<h3>Problem with selection of Data:</h3>".mysql_error());
while($row=mysql_fetch_array($sql))
{
	$a=$row['stdid'];
	$b=$row['stdname'];
	$c=$row['stdaddress'];
	$d=$row['stdphone'];
	$e=$row['stdmaritalstatus'];
	$f=$row['stdsponsorship'];
	$g=$row['stdDOB'];
	$h=$row['stdgender'];
	$i=$row['departid'];
?>
<form action="update.php" method="post" id="ContactForm">
<table width="200" border="0">
  <tr>
    <td>Std.ID:</td>
    <td><div class="bg"><input type="text" class="input" name="stdid" value="<?php echo $a;?>"/></div></td>
  </tr>
  <tr>
    <td>Names:</td>
	
    <td><div class="bg"><input type="text" class="input" name="stdname" value="<?php echo $b;?>"/></div></td>
  </tr>
  <tr>
    <td>Address:</td>
    <td><div class="bg"><input type="text" class="input" name="stdaddress" value="<?php echo $c;?>"/></div></td>
  </tr>
  <tr>
    <td>Marital St:</td>
    <td><div class="bg"><input type="text" class="input" name="stdstatus" value="<?php echo $e;?>"/></div></td>
  </tr>
  <tr>
    <td>Sponsorship:</td>
	  <td><div class="bg"><input type="text" class="input" name="stdsponsor" value="<?php echo $f;?>"/></div></td>
  </tr>
  <tr>
    <td>Phone:</td>
	  <td><div class="bg"><input type="text" class="input" name="stdphone" value="<?php echo $d;?>"/></div></td>
  </tr>
  <tr>
    <td>BirthDate:  </td>
    <td><div class="bg"><input type="text" class="input" name="stddob" value="<?php echo $g;?>"/></div></td>
  </tr>
  <tr>
    <td>Gender:</td>
    <td><span class="bg">
<select name="stdgender">
	<option><?php echo $h;?></option>
	<option>Male</option>
	<option>Female</option>
</select></span></td>
  </tr>
  <tr>
    <td>Department ID:  </td>
    <td><span class="bg">
<select name="departement">
	<option><?php echo $i;?></option>
	<option>CS.MGT BAC 1</option>
	<option>CS.MGT BAC 2</option>
	<option>CS.MGT BAC 3</option>
	<option>CS.MGT BAC 4</option>
	<option>MED BAC 1</option>
	<option>MED BAC 2 </option>
	<option>MED BAC 3</option>
	<option>MED BAC 4 </option>
	<option>MED C BAC1</option>
	<option>MED C BAC2</option>
	<option>MED C BAC3</option>
	<option>MED C BAC4</option>
	<option>BMC BAC 1</option>
	<option>BMC BAC 2 </option>
	<option>BMC BAC 3</option>
	<option>BMC BAC 4</option>
	<option>NUR.SC BAC 1</option>
	<option>NUR.SC BAC2 </option>
	<option>NUR.SC BAC 3</option>
	<option>CS .ENG BAC 1 </option>
	<option>CS .ENG BAC 2</option>
	<option>CS .ENG BAC 3</option>
	<option>CS .ENG BAC 4</option>	
</select></span></td>
 </tr>	
  <tr>
    <td></td>
    <td><input type="submit" name="stdsubmit" value="Update" class="button">
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