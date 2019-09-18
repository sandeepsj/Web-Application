<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Refresh" content="1; url=editstud.html" />
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
$fee=0;
//foreach ($sub as $value) {
//	$sql="SELECT `FEE` FROM `feestructure` WHERE SUBJECT='$value'";
//	$fee=$fee+mysqli_query($conn,$sql);
//}
$sqlq="SELECT * FROM `studentdb` WHERE `ADMN-NO`=$admnno;";
$result=mysqli_query($conn,$sqlq);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$subprev=explode(",", $row["SUBJECT"]);
if(is_array($subprev))
{
	foreach ($subprev as $value) {
		
		$RES3=mysqli_query($conn,"UPDATE `feestructure` SET `COUNT`=`COUNT`-1 WHERE `SUBJECT`='$value';");
			# code...
	}
}
else
{
	$RES3=mysqli_query($conn,"UPDATE `feestructure` SET `COUNT`=`COUNT`-1 WHERE `SUBJECT`='$subprev';");
}
if(is_array($sub))
{
	$subarray = $GLOBALS['sub'];
	$subman=implode(",", $GLOBALS['sub']);
	$RES=mysqli_query($conn,"UPDATE `studentdb` SET `ADMN-NO`=$admnno, `NAME`='$name', `FATHERS-NAME`='$fname', `F-OCCUPATION`='$focc',`DATE-OF-ADMN`='$doa', `ADDRESS`='$address', `PHONE`=$phno, `DOB`='$dob',  `SUBJECT`='$subman',`FEES-TOTAL`=$fee WHERE `ADMN-NO`=$admnno"); 
	if($RES)
	{
		foreach ($subarray as $each) {
			# code...
			$GLOBALS['RES2']=mysqli_query($conn,"UPDATE `feestructure` SET `COUNT`=`COUNT`+1 WHERE `SUBJECT`='$each';");

		}
		
	}
}
else
{
	$RES=mysqli_query($conn,"UPDATE `studentdb` SET `ADMN-NO`=$admnno, `NAME`='$name', `FATHERS-NAME`='$fname', `F-OCCUPATION`='$focc',`DATE-OF-ADMN`='$doa', `ADDRESS`='$address', `PHONE`=$phno, `DOB`='$dob',  `SUBJECT`='$subman',`FEES-TOTAL`=$fee WHERE `ADMN-NO`=$admnno");
	if($RES)
	{
		$GLOBALS['RES2']=mysqli_query($conn,"UPDATE `feestructure` SET `COUNT`=`COUNT`+1 WHERE `SUBJECT`='$each';");
	}
}

if($RES2)
{
	echo "Editing Successfull";
}
//This success message is to be genuine by checking the return value of sql query
mysqli_close($conn);
?>