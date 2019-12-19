<?php
 session_start();
 $userid=$_SESSION['valid_user'];
 $type=$_SESSION['valid_type'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Tuition Fee Payement</title>
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
<script  type="text/javascript">
function kiki()
{
var a=document.forms["fee"]["totalamount"].value;
var b=document.forms["fee"]["feeamount"].value;
var c=a-b;
document.forms["fee"]["rest"].value=c;
}
function printfunction()
{
	window.print(this);
}
</script>
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
						<script  type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
						<script  type="text/javascript" src="js/jquery-ui-1.7.custom.min.js"></script>
						<script  type="text/javascript" src="js/jquery-search.js"></script>
						<script src="js/jquery-1.7.1.min.js"></script>
						<script src="js/script.js"></script>
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
						<li id="menu_active"><a href="schedule.php"><span><span>About Fees</span></span></a></li>
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
<h2 class="pad_bot1">Student's Tuition Fees Information</h2>
<h3>
<form action="schedule.php" method="post" id="ContactForm">
<table width="200" border="1">
  <tr>
    <td>Student.ID:</td>
    <td>Academic.Year:</td>
  </tr>
  <tr>
    <td><div class="bg"><input type="text" name="stdid" /></div></td>
    <td><div class="bg"><input type="text" name="academicyear"></div></td>
  </tr>
  <tr>
    <td><input type="submit" name="ok" value="OK" class="button"></td>
    <td></td>
  </tr>
</table>
</form>
</h3>
<?php
if(isset($_POST['ok']))
{
	$id=$_POST['stdid'];
	$y=$_POST['academicyear'];
	include"connect.php";
	$query=mysql_query("SELECT stdid, stdname,departid FROM student WHERE stdid='$id' LIMIT 1",$con)or die("<h2>A Problem Occur </h2>".mysql_query());
	$sql=mysql_query("SELECT `student`.`stdid`, `student`.`stdname`,`student`.`departid`, `feepayement`.`stdid`, `feepayement`.`paymentdate`,`feepayement`.`feetype`, `feepayement`.`feedescription`, `feepayement`.`semester`, `feepayement`.`academicyear`, `feepayement`.`feesamount`, `feepayement`.`bankname`, `feepayement`.`bankaccount`, `feepayement`.`slipnumber` FROM student, feepayement WHERE `feepayement`.`stdid`='$id' AND `feepayement`.`stdid`=`student`.`stdid` AND `feepayement`.`academicyear`='$y'",$con)or die("<h2>Problem with the Query :</h2>".mysql_error());
while($row=mysql_fetch_array($query))
{
	$code=$row['stdid'];
	$name=$row['stdname'];
	$departid=$row['departid'];
}
?>
<div class="dialog-pad">
<div id="dialog2" title="Student Tuition Fee Information">
<h2>Student Tuition Fee Information.</h2>
<table width="358" border="0">
  <tr>
    <td width="167">Student ID :</td>
    <td width="181"><h4><?php echo $code;?></h4></td>
  </tr>
  <tr>
    <td>Student Names :</td>
    <td><h4><?php echo $name;?></h4></td>
  </tr>
  <tr>
    <td>Departement :</td>
    <td><h4><?php echo $departid;?></h4></td>
  </tr>
  <tr>
    <td>Academic Year :</td>
    <td><h4><?php echo $y;?></h4></td>
  </tr>
</table>
<hr />
<table width="522" border="1">
  <tr>
    <th width="50"><strong>Date</strong></th>
    <th width="150"><strong>Fee Description</strong></th>
    <th width="90"><strong>Semester</strong></th>
    <th width="90"><strong>Fee Amount</strong></th>
    <th width="160"><strong>Bank Infos</strong></th>
  </tr>
<?php
$total=0;
while($line=mysql_fetch_array($sql))
{
	$a1=$line['paymentdate'];
	$a2=$line['feedescription'];
	$a3=$line['semester'];
	$a4=$line['feesamount'];
	$total=$total+$a4;
	$a5=$line['bankname'];
	$a6=$line['bankaccount'];
	$a7=$line['slipnumber'];
	echo"<tr align='center'>
    <td>$a1</td>
    <td>$a2</td>
    <td>$a3</td>
    <td>$a4</td>
    <td>$a5 - $a6 - $a7</td>
  </tr>";
}
?>
</table>
<hr />
<h2>Total Amount Payed is : <?php echo $total;?></h2> - <a href="print1.php?id=<?php echo $id;?>&y=<?php echo $y;?>" class="btn style_2" target="_blank">Print</a>
<hr />
</div>
<button id="opener2" class="btn style_2">View Results</button>
</div>
<?php
}
?>
</section>
<section>
<h2>Tuition Payement Information</h2>
<?php
if(isset($_POST['feesubmit']))
{
include"connect.php";
$query=mysql_query("INSERT INTO `tuition`.`feepayement` (`feeid`, `stdid`, `paymentdate`, `feetype`, `feedescription`, `semester`, `academicyear`, `feesamount`, `totalamount`, `rest`, `bankname`, `bankaccount`,`slipnumber` ,`expirationdate`, `userid`, `paymentmodeid`) VALUES (NULL, '$_POST[stdid]', NOW(), '$_POST[feetype]', '$_POST[feedescription]', '$_POST[semester]', '$_POST[academicyear]', '$_POST[feeamount]', '$_POST[totalamount]', '$_POST[rest]', '$_POST[bankname]', '$_POST[bankaccount]','$_POST[slipnumber]' ,'$_POST[expirationdate]', '$_POST[userid]', '$_POST[payementid]')",$con)or die("<h3>Problem with this operaiton:</h3>".mysql_error());

$kiki=mysql_query("SELECT stdname, departid FROM student WHERE stdid ='$_POST[stdid]'",$con)or die("<h3>Error:</h3>".mysql_error());
while($ko=mysql_fetch_array($kiki))
{
	$koko=$ko['stdname'];	
	$kaka=$ko['departid'];	
}
$sql=mysql_query("INSERT INTO payementdoc(billid,stdid,received_from,departid,amount_payed,amount_in_word,payment_description,date_of_payment,slipnumber,userid) VALUES (NULL,'$_POST[stdid]','$koko','$kaka','$_POST[feeamount]','$_POST[feeamount]','$_POST[feedescription]',NOW(),'$_POST[slipnumber]','$_POST[userid]')")or die("<h3>BILLING INSERTION ERROR :</h3>".mysql_error());
if(!empty($query))
	{
		echo"<h3>Payment Operation Done Successfully.</h3>";
	}
	else
	{
		echo"<h3>Payment Operation Fail.</h3>";
	}	
	
mysql_close($con);
}
if(isset($_POST['feedetailsubmit']))
{
include"connect.php";
$query=mysql_query("INSERT INTO `tuition`.`paymentdetail` (`detailid`, `feeid`, `totalamount`, `admissionfee`, `insurancefee`, `tuitionfee`, `finalprojectfee`, `internershipfee`, `uniformfee`, `validationexamfee` ,`otherdescription`) VALUES (NULL, '$_POST[feeid]', '$_POST[totalamount]', '$_POST[admissionfee]', '$_POST[insurancefee]', '$_POST[tuitionfee]','$_POST[finalprojectfee]', '$_POST[internershipfee]', '$_POST[uniformfee]','$_POST[validationexamfee]', '$_POST[otherdescription]')",$con)or die("<h3>Problem with this operaiton:</h3>".mysql_error());
if(!empty($query))
	{
		echo"<h3>Payment Detail Saved Successfully.</h3>";
	}
	else
	{
		echo"<h3>Payment Dtail Not Saved.</h3>";
	}		
mysql_close($con);
}
?>
<table>
<tr valign="top">
<td valign="top">
<h3>
<form action="schedule.php" method="post" id="ContactForm" name="fee">
<table width="200" border="0">
  <tr>
    <td>Student.ID:</td>
    <td><div class="bg">
	<select name="stdid">
	<option>select</option>
	<?php
	include"connect.php";
	$sql=mysql_query("SELECT * FROM student",$con);
	while($row=mysql_fetch_array($sql))
	{
		$a=$row['stdid'];
		$b=$row['stdname'];
		$c=$row['departid'];
		echo"<option value=$a>$a - $b - $c</option>";
	}
	echo"</select>";
	mysql_close($con);
	?>
	</div>
	</td></tr><tr>
	<td>Fee.Type:</td>
    <td><div class="bg">	
<select name="feetype">
	<option>select</option>
	<option>Annual Fee</option>	
	<option>Semester Fee</option>
	<option>Monthly Fee</option>
</select></div></td>
  </tr>
  <tr>
    <td>Fee.Description:</td>
    <td><div class="bg"><input type="text" name="feedescription"  class="input"/></div></td>
  </tr>
  <tr>
    <td>Semester:</td>
	  <td><div class="bg"><select name="semester"><option>select</option><option>First Semester</option><option>Last Semester</option></select></div></td>
  </tr>
  <tr>
    <td>Academic.Year:</td>
	  <td><div class="bg"><input type="text" name="academicyear" /></div></td>
  </tr>
  <tr>
    <td>Fee.Amount:  </td>
    <td><div class="bg"><input type="text" name="feeamount" /></div></td>
  </tr>
  <tr>
    <td>Total.Amount:</td>
    <td><div class="bg">
<input type="text" name="totalamount" />
</div></td>
  </tr>
  <tr>
    <td>Rest:</td>
    <td><div class="bg">
<input type="text" name="rest" onClick="return kiki()"/>
</div></td>
  </tr>
  <tr>
    <td>Bank.Name:  </td>
    <td><div class="bg">
	<input type="text" class="input" name="bankname" />
	</div></td>
 </tr>	 
 <tr>
    <td>Bank.Account:  </td>
    <td><div class="bg">
	<input type="text" name="bankaccount" />
	</div></td>
 </tr>	
 <tr>
    <td>Slip.Number:  </td>
    <td><div class="bg">
	<input type="text" name="slipnumber" />
	</div></td>
 </tr>
<tr>
    <td>Expiration.Date:  </td>
    <td><div class="bg">
	<input type="text" name="expirationdate" id="datepicker"/>
	</div></td>
</tr>
<tr>
    <td>Payement.Type:  </td>
    <td><span class="bg">
	<select name="payementid">
	<option>select</option>
	<?php
	include"connect.php";
	$sql=mysql_query("SELECT * FROM paymentmode",$con);
	while($row=mysql_fetch_array($sql))
	{
		$a=$row['payementmodeid'];
		echo"<option>$a</option>";
	}
	mysql_close($con);
	?>
	</select>
	</span></td>
</tr>
<tr>
    <td>User.ID:  </td>
    <td><span class="bg">
	<input type="text" name="userid" value="<?php echo $userid;?>"/>
	</span></td>
</tr>	
 <tr>
    <td></td>
    <td><input type="submit" name="feesubmit" value="Save Payement" class="button">
	<input type="reset" name="" value="Cancel" class="button"></td>
  </tr>
</table>
</form>
</h3>
</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>
<h2>Enter Payement Detail</h2>
<h3>
<form action="schedule.php" method="post" id="ContactForm" name="feedetail">
<table width="200" border="0">
  <tr>
    <td>Fee.ID:</td>	
    <td>
	<?php
		include"connect.php";
		$sql=mysql_query("SELECT feeid,feesamount FROM feepayement ORDER BY feeid DESC LIMIT 1",$con);
		while($row=mysql_fetch_array($sql))
		{
			$k=$row['feeid'];
			$kk=$row['feesamount'];
		}
		mysql_close($con);
	?>
	<div class="bg"><input type="text" value="<?php echo $k;?>" name="feeid"/></div></td>
  </tr>
  <tr>
    <td>Total.Amount:</td>
	  <td><div class="bg"><input type="text" name="totalamount" value="<?php echo $kk;?>"/></div></td>
  </tr>
  <tr>
    <td>Admission.Fee:  </td>
    <td><div class="bg"><input type="text" name="admissionfee" /></div></td>
  </tr>
  <tr>
    <td>Insurance.Fee:</td>
    <td><div class="bg"><input type="text" name="insurancefee" /></div></td>
  </tr>
  <tr>
    <td>Tuition.Fee:</td>
    <td><div class="bg"><input type="text" name="tuitionfee" /></div></td>
  </tr>
   <tr>
    <td>FinalProject.Fee:</td>
    <td><div class="bg"><input type="text" name="finalprojectfee" /></div></td>
  </tr>
  <tr>
    <td>Internership.Fee:</td>
    <td><div class="bg"><input type="text" name="internershipfee" /></div></td>
  </tr>
  <tr>
    <td>Uniform.Fee:</td>
    <td><div class="bg"><input type="text" name="uniformfee" /></div></td>
  </tr>
  <tr>
    <td>ValidationExam.Fee:</td>
    <td><div class="bg"><input type="text" name="validationexamfee" /></div></td>
  </tr>
  <tr>
    <td>Other.Description:</td>
    <td><div class="bg"><input type="text" name="otherdescription" class="input"></div></td>
  </tr>

 <tr>
    <td></td>
    <td><input type="submit" name="feedetailsubmit" value="Save Detail" class="button">
	<input type="reset" name="" value="Cancel" class="button"></td>
  </tr>
</table>
</form>
</h3>
</td>
</tr>
</table>
</section>

</article>
</div>
</div>
<div class="main">
	<footer>&copy; 2012 - ISPG Tuition Fees Management System</footer>
</div>
<script type="text/javascript"> Cufon.now();</script>
</body>
</html>