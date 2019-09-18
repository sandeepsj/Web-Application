<?php
	$conn=new mysqli("localhost","root","","revathi-studentdb");
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$sqlq="SELECT * FROM `feestructure`";
    $result=mysqli_query($conn,$sqlq);
	if($result->num_rows>0){
		while ($row=$result->fetch_assoc()) 
		{
			$FEE=$_POST[$row["SUBJECT"]];
			$SUBJECT=$row["SUBJECT"];
			$sql="UPDATE `feestructure` SET `FEE`=$FEE WHERE  `SUBJECT`='$SUBJECT';";
			mysqli_query($conn,$sql);
		}
	}
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Refresh" content="0; url=http://localhost/Revathi/pages/editfee.php" />
	<title></title>
</head>
<body>

</body>
</html>