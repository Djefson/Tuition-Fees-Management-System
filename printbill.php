<?php
session_start();
$userid=$_SESSION['valid_user'];
$type=$_SESSION['valid_type'];
$id=$_GET['billid'];
$d=date("D M d,Y");
require("fpdf.php");
$pdf=new FPDF('P','cm','A4');
$pdf->aliasNbpages();
$pdf->SetFont('Arial','B',25);
$pdf->SetFillColor(96,96,96);
$pdf->SetTextColor(44,52,143);
$header=array('StudentID','Student Names','DepartmentID','Amount','Description','Date','Slip Number');
$pdf->SetFont('Arial','',16);
$pdf->AddPage();
$pdf->SetFillColor(96,96,96);
$pdf->SetTextColor(44,52,255);
require"connect.php";
$pdf->SetXY(2,1);
$query1="SELECT * FROM payementdoc WHERE billid=$id;";
$resultat1=mysql_query($query1);
while($row1=mysql_fetch_array($resultat1))
  	{
		$kiki=$row1['stdid'];
 	}
for($j=1;$j==1;$j++)
$pdf->Cell(1);
$pdf->Cell(1,2,"Institut Superieur Pedagogique de Gitwe",0,1,'c');
$pdf->Cell(1);
$pdf->Image("logo.jpg",15,1.1,4,4 ,"jpg" ,'c') ;
$pdf->SetFont('Arial','',12);

$pdf->cell(5.2,0,'      P.O Box 01 Nyanza',0,1,'C');
$pdf->Cell(1);
$pdf->cell(7.5,1.5,'     Cell : 0788768692/0788524039',0,1,'C');
$pdf->Cell(1);
$pdf->cell(12,0,'     E-mail: ispg_gitwe@yahoo.fr, website : www.ispg.ac.rw',0,1,'C');
$pdf->Cell(1);
$pdf->Image("images/bg_header2.jpg",3,5, 16, 0.1 ,"jpg" ,'c') ;
$pdf->SetFont('Arial','',14);
$pdf->SetFillColor(96,96,96);
$pdf->SetTextColor(44,52,100);
$pdf->Cell(2);
$pdf->Cell(10,3.5,"RECEIPT Number: $id                                                          $d",0,1,'c');

$query="SELECT * FROM payementdoc WHERE billid=$id;";
$resultat=mysql_query($query);

$pdf->SetFillColor(230,230,230);
$pdf->SetTextColor(96,96,96);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(4.15);
$pdf->SetXY(2,7);
for($i=0;$i<sizeof($header);$i++)
{
if(($i==1)or($i==5))
{
$pdf->cell(3.5,1,$header[$i],1,0,'C',1);
}elseif(($i==0)or($i==3)){
$pdf->cell(2,1,$header[$i],1,0,'C',1);
}elseif(($i==2)){
$pdf->cell(2.5,1,$header[$i],1,0,'C',1);
}
else
{
$pdf->cell(2.5,1,$header[$i],1,0,'C',1);
}
}
$pdf->SetFillColor(0xdd,0xdd,0xdd);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(2,$pdf->GetY()+1);
$fond=0;
if(mysql_num_rows($resultat)==0)
{
echo '<center><img src=images/logo.png><br /><img src=images/bg_header2.jpg></center>';
echo '<center><h2>No Record returned.</h2></center>';
echo '<center><h2>Click Here <a href=documents.php><img src=images/button_1.png></a> to go back</h2></center>';
}else if(mysql_num_rows($resultat)!=0)
{
while($list=mysql_fetch_object($resultat))
  {
   $pdf->cell(2,0.7,$list->stdid,1,0,'C',$fond);
   $pdf->cell(3.5,0.7,$list->received_from,1,0,'C',$fond);
   $pdf->cell(2.5,0.7,$list->departid,1,0,'C',$fond);
   $pdf->cell(2,0.7,$list->amount_payed,1,0,'C',$fond);
   $pdf->cell(2.5,0.7,$list->payment_description,1,0,'C',$fond);
   $pdf->cell(3.5,0.7,$list->date_of_payment,1,0,'C',$fond);
   $pdf->cell(2.5,0.7,$list->slipnumber,1,0,'C',$fond);   
   $pdf->SetXY(2,$pdf->GetY()+0.7);
   $fond=!$fond;
  }
	$pdf->SetFillColor(96,96,96);
	$pdf->SetTextColor(44,52,100);
	$pdf->SetFont('Arial','B',10);
    $fond=!$fond;
	$pdf->Cell(10,3.5,"Stamp and Signature",0,1,'c');
	$pdf->Cell(2,0.7," ",0,1,'c');
$pdf->output();
}
?>