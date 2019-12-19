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
	<link rel="stylesheet" href="../../../../themes/base/jquery.ui.all.css">
	<script src="../../../../jquery-1.7.2.js"></script>
	<script src="../../../../ui/jquery.ui.core.js"></script>
	<script src="../../../../ui/jquery.ui.widget.js"></script>
	<script src="../../../../ui/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="../../../demos.css">
	<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	</script>
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
<h2>Add New Student's Information</h2>
<h3>
<?php
if(isset($_POST['stdsubmit']))
{
	$a=$_POST['stdid'];
	$b=$_POST['stdname'];
	$c=$_POST['stdaddress'];
	$d=$_POST['stdstatus'];
	$e=$_POST['stdsponsor'];
	$f=$_POST['stddob'];
	$g=$_POST['stdgender'];
	$h=$_POST['departement'];
	$k=$_POST['stdphone'];
	$i=$_POST['userid'];
	include"connect.php";
	$query=mysql_query("INSERT INTO student(stdid,stdname,stdaddress,stdphone,stdmaritalstatus,stdsponsorship,stdDOB,stdgender,departid,userid) VALUES('$a','$b','$c',
	'$k','$d','$e','$f','$g','$h','$i')",$con)or die("<h3>Problem with Insertion of Data:</h3>:".mysql_error());	
	if(!empty($query))
	{
		echo"<h3>Record inserted successfully  !!!! </h3>";
	}
	else
	{
		echo"<h3>Record not inserted successfully</h3>";
	}		
mysql_close($con);
}
?>
<form action="students.php" method="post" id="ContactForm">
<table width="200" border="0">
  <tr>
    <td>Last.Student.ID:</td>
    <td><h2><?php
	include"connect.php";
	$sql=mysql_query("SELECT * FROM student ORDER BY stdid DESC LIMIT 1",$con);
	while($row=mysql_fetch_array($sql))
	{
		$a=$row['stdid'];
		echo"$a</h2>";
	}
	mysql_close($con);
	?></td>
  </tr>
  <tr>
    <td>Std.ID:</td>
    <td><div class="bg"><input type="text" class="input" name="stdid" /></div></td>
  </tr>
  <tr>
    <td>Names:</td>
	
    <td><div class="bg"><input type="text" class="input" name="stdname" /></div></td>
  </tr>
  <tr>
    <td>Address:</td>
    <td><div class="bg"><input type="text" class="input" name="stdaddress" /></div></td>
  </tr>
  <tr>
    <td>Marital St:</td>
    <td><div class="bg"><input type="text" class="input" name="stdstatus" /></div></td>
  </tr>
  <tr>
    <td>Sponsorship:</td>
	  <td><div class="bg"><input type="text" class="input" name="stdsponsor" /></div></td>
  </tr>
  <tr>
    <td>phone:</td>
	  <td><div class="bg"><input type="text" class="input" name="stdphone" /></div></td>
  </tr>
  <tr>
    <td>BirthDate:  </td>
    <td><div class="bg"><input type="text" class="input" name="stddob" id="datepicker"/></div></td>
  </tr>
  <tr>
    <td>Gender:</td>
    <td><span class="bg">
<select name="stdgender">
	<option>select </option>
	<option>Male</option>
	<option>Female</option>
</select></span></td>
  </tr>
  <tr>
    <td>Depart ID:</td>
    <td><span class="bg">
	<select name="departement">
	<option>select </option>
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
</select></span></td>
 </tr>	
  <tr>
    <td></td>
    <td>
	<input type="hidden"  name="userid" value="<?php echo $userid;?>"/>
	<input type="submit" name="stdsubmit" value="Save" class="button">
	<input type="reset" name="" value="Cancel" class="button"></td>
  </tr>
</table>
</form>
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