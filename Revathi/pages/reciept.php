<!DOCTYPE html>
<html>
<head>
	<//meta http-equiv="Refresh" content="0; url=feepayment.php" />
	<style type="text/css">
		html, body{
			width: 480px;
			height: 400px;
		}
		h2{
			border-bottom: 3px black dotted;
		}
		#div{
			width: 480px;
			padding: 15px;
			border:solid black;
		}
	
		p{
			margin:20px;
		}
		#field{
			float:left;
		}
	</style>
	<title></title>
</head>
<body>
	<?php
	$conn=new mysqli("localhost","root","","revathi-studentdb");
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
	$sub2=$_POST["sub2"];
	$month=$_POST["month"]."-01";
	$paydate=$_POST["paydate"];
	$admn=$_GET["admn"];
	$sqlq3="SELECT `ADMN-NO`,MAX(`RECEIPT_ID`) FROM `feedb`;";
	$sqlq2="SELECT * FROM `studentdb` WHERE `ADMN-NO`=$admn; ";
	$result3=$conn->query("SELECT * FROM `feestructure` WHERE `SUBJECT`='$sub2';");
	$fee=$result3->fetch_assoc();
	$result=$conn->query($sqlq2);
	$std=$result->fetch_assoc();
	$res=mysqli_query($conn,$sqlq3);
	if($res){
		$row=$res->fetch_assoc();
		$rid=$row["MAX(`RECEIPT_ID`)"];
		$rid++;
	}
	else{
		$rid=1;
	}
	$fees=$fee["FEE"];
	$sqlq="INSERT INTO `feedb`(`RECEIPT_ID`, `SUBJECT`, `DATE-OF-PAYMENT`, `MONTH-YEAR`, `ADMN-NO`,`AMOUNT`) VALUES ($rid,'$sub2','$paydate','$month',$admn,$fees)";
	$result=$conn->query($sqlq);
	if($result){
		$sqlq4="SELECT * FROM `feedb` WHERE `RECEIPT_ID`=$rid;";
		$result2=$conn->query($sqlq4);
		$std2=$result2->fetch_assoc();
		?>

		<div id='DivIdToPrint'>
			<div id="div">
				<h2><center>REVATHI DANCE AND MUSIC SCHOOL</center></h2>
				<center><h4><u>Purameri</u></h4></center>
				<p><div id="field" style="width: 60%;padding-left: 20px;">ReceiptID:&nbsp;&nbsp;&nbsp;<?php echo $rid;?> </div><div> Date:&nbsp;&nbsp;&nbsp;<?php echo date("Y-m-d"); ?></div></p>
				<p>Name:&nbsp;&nbsp;&nbsp;<?php echo $std["NAME"]; ?></p>
				<p>Admno:&nbsp;&nbsp;&nbsp;<?php echo $admn?></p>
				<u><i>Payment Details</i></u>
				<p><div id="field" style="width: 50%;padding-left: 20px;">Subject:&nbsp;&nbsp;&nbsp;<?php echo ucfirst($std2["SUBJECT"]);?></div>Month:&nbsp;&nbsp;&nbsp;<?php echo substr(($std2["MONTH-YEAR"]),0,-3);?></p>
				<p><div id="field" style="width: 50%;padding-left: 20px;">Fees Payed:&nbsp;&nbsp;&nbsp;<?php echo $fee["FEE"]; ?></div><div>Date of Payment:&nbsp;&nbsp;&nbsp;<?php echo $std2["DATE-OF-PAYMENT"];?></div></p>
				<script type="text/javascript">
					window.print();
				</script>
			</div>
			
		</div>

		
<?php


	}
	else{
		echo "try again";
	}
?>

</body>
</html>
