<?php
 session_start();
 $userid=$_SESSION['valid_user'];
 $type=$_SESSION['valid_type'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Billing</title>
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
						<li id="menu_active" class="nav3"><a href="documents.php"><span><span>Billing</span></span></a></li>
						<li class="nav4"><a href="reports.php"><span><span>Reports</span></span></a></li>
						<li class="nav5"><a href="administration.php"><span><span>Settings</span></span></a></li>
					</ul>
				</nav>
			</div>
		</header><div class="ic"></div>
<!-- content -->
		<article id="content">
			<section class="col1">
			<h2>Billing</h2>

			<?php
			include "connect.php";
			$total=mysql_query("SELECT COUNT(received_from) AS total FROM payementdoc ORDER BY received_from ASC",$con);
			$page_id=$_GET['page_id'];
			$n=0;
			$query=mysql_query("SELECT * FROM payementdoc ORDER BY received_from ASC");
			echo"<h3><table>";
			echo"";
			while($row=mysql_fetch_array($query))
			{
				$n=$n+1;
				$m=13*$page_id;
				$w=$m-2;
				if($n>=$w && $n<=$m)
				{
					$id=$row['billid'];
					echo"<tr><td>$row[billid]</td><td>$row[received_from]</td><td>$row[departid]</td><td>$row[amount_payed]</td><td>$row[payment_description]</td><td>$row[date_of_payement]</td><td>$row[slip_number]</td><td><a href=printbill.php?billid=$row[billid] class='button'>Print</a></td></tr>";
				}
			}
			echo"</table></h3>";
			echo"<hr>";
			$a=$total%13;
			$b=$total/13;
			$bb=ceil($total/13);
			if($a>0 && $a<13)
			{
				$c=$bb+1;
			}
			else
			{
				$c=$bb;
			}
			$i=1;
			echo"<center><h5>Pages : ";
			while($i<=$c)
			{
				if($i==1)
				{
					echo"<a href=next.php?page_id=".$i.">"."first"."-</a>";
				}
				else
				{
					if($i==$c)
					{
						echo"<a href=next.php?page_id=".$i.">"." last"."</a>";
					}
					else
					{
						echo"<a href=next.php?page_id=".$i.">".$i."-</a>";
					}
				}
				$i=$i+1;
			}
			echo"</h5></center>";
			?>
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