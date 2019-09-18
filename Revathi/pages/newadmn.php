<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Refresh" content="2; url=newadmn.html" />
	<title></title>
</head>
<body>

</body>
</html>
<?php
	$conn=new mysqli("localhost","root","","revathi-studentdb");
	$admnno=$_POST["admn"];
	$name=$_POST["name"];
	$fname=$_POST["fname"];
	$focc=$_POST["foccupation"];
	$doa=$_POST["doa"];
	$address=$_POST["address"];
	$phno=$_POST["phno"];
	$sub=$_POST["sub"];
	$dob=$_POST["dob"];
	$school=$_POST["school"];
	$fee=0;
	foreach ($sub as $value) {
		$sql="SELECT * FROM `feestructure` WHERE SUBJECT='$value'";
		$re=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($re,MYSQLI_ASSOC);
		$fee=$fee+$row["FEE"];
	}
	if(is_array($sub))
	{
		$subarray = $GLOBALS['sub'];
		$subman=implode(",", $GLOBALS['sub']);
		$RES=mysqli_query($conn,"INSERT INTO `studentdb`(`ADMN-NO`, `NAME`, `FATHERS-NAME`, `F-OCCUPATION`,`DATE-OF-ADMN`, `ADDRESS`, `PHONE`, `DOB`,  `SUBJECT`,`FEES-TOTAL`,`SCHOOL`) VALUES ($admnno,'$name','$fname','$focc','$doa','$address',$phno,'$dob','$subman',$fee,'$school');");
		if($RES)
		{
			foreach ($subarray as $each) {
				# code...
				$sub1=strtoupper($each);
				$take=mysqli_query($conn,"INSERT INTO `feedb`(`ADMN-NO`, `SUBJECT`, `MONTH-YEAR`, `DUE`) VALUES ($admnno,'$sub1','$doa',0)");
				$GLOBALS['RES2']=mysqli_query($conn,"UPDATE `feestructure` SET `COUNT`=`COUNT`+1 WHERE `SUBJECT`='$each';");
			}
		}
	}
	/*else
	{
		$RES=mysqli_query($conn,"INSERT INTO `studentdb`(`ADMN-NO`, `NAME`, `FATHERS-NAME`, `F-OCCUPATION`,`DATE-OF-ADMN`, `ADDRESS`, `PHONE`, `DOB`,  `SUBJECT`,`FEES-TOTAL`,`SCHOOL`) VALUES ($admnno,'$name','$fname','$focc','$doa','$address',$phno,'$dob','$sub',$fee,'$school');");
		$take=mysqli_query($conn,"INSERT INTO `feeregister`(`ADMN-NO`, `SUBJECT`, `AMOUNT-PAYED`, `MONTH-YEAR`, `DUE`) VALUES ($admnno,'$sub',0,'$doa',$fee)");
		echo "bar";
			//This success message is to be genuine by checking the return value of sql query
		$sub=$GLOBALS['sub'];
		if($RES)
		{
			$GLOBALS['RES2']=mysqli_query($conn,"UPDATE `feestructure` SET `COUNT`=`COUNT`+1 WHERE `SUBJECT`='$sub';");
		}
	}*/
	if($RES2)
	{
		
		echo "New Admission is uploaded successfully";
	}
	else
	{
		echo "Try Again";
	}
	mysqli_close($conn);
?>