
<?php
	$conn=new mysqli("localhost","root","","revathi-studentdb");
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
    $admno=$_POST["admn"];
    $sqlq2="UPDATE `studentdb` SET `ADMN-STATUS`='open' WHERE `ADMN-NO`=$admno;";
    $result=mysqli_query($conn,$sqlq2);
    mysqli_close($conn);
?>
<meta http-equiv="Refresh" content="0; url=closadmn.html" />