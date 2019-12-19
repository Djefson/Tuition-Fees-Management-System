<?php
session_start();
?>
<?php
if(isset($_POST['submit']))
{
	$a=$_POST['us'];
	$b=$_POST['pw'];
	include"connect.php";
	$query=mysql_query("SELECT * FROM users WHERE username='$a' AND password='$b'",$con)or die("Problem with Connection:".mysql_error());			
		if(mysql_num_rows($query)=='0')
		{
		echo'<script language="javascript">alert("Incorect Username or password");</script>';
		$a=0;
			if($a==0)
			{
				header("Location: index.php");
			}
		}
		else
		{
		while($row=mysql_fetch_array($query))
		{
			$lolo=$row['username'];
			$kiki=$row['type'];
		}
		$_SESSION['valid_user']=$lolo;
		$_SESSION['valid_type']=$kiki;
		header("Location: students.php");
		}
}
?>
