<!DOCTYPE html>
<html>
<head>
    <//meta http-equiv="Refresh" content="0; url=getreciept.php" />
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
    $sub=strtoupper($_POST["searchidsubject"]);
    $month=$_POST["searchidmonth"]."-01";
    $admn=$_POST["searchidadmn"];
    $sqlq="SELECT * FROM `feedb` WHERE `ADMN-NO`=$admn AND `MONTH-YEAR`='$month' AND `SUBJECT`='$sub'; ";
    $result2=$result=$conn->query("SELECT * FROM `studentdb` WHERE `ADMN-NO`=$admn");
    $std2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
    $result=$conn->query($sqlq);
    if($result){
        $std=mysqli_fetch_array($result,MYSQLI_ASSOC);
        ?>
        <div id='DivIdToPrint'>
            <div id="div">
                <h2><center>REVATHI DANCE AND MUSIC SCHOOL</center></h2>
                <center><h4><u>Purameri</u></h4></center>
                <p><div id="field" style="width: 60%;padding-left: 20px;">Receipt ID:&nbsp;&nbsp;&nbsp;<?php echo $std["RECEIPT_ID"];?> </div><div> Date:&nbsp;&nbsp;&nbsp;<?php echo date("Y-m-d"); ?></div></p>
                <p>Name:&nbsp;&nbsp;&nbsp;<?php echo $std2["NAME"]; ?></p>
                <p>Admno:&nbsp;&nbsp;&nbsp;<?php echo $admn?></p>
                <u><i>Payment Details</i></u>
                <p><div id="field" style="width: 50%;padding-left: 20px;">Subject:&nbsp;&nbsp;&nbsp;<?php echo ucfirst($std["SUBJECT"]);?></div>Month:&nbsp;&nbsp;&nbsp;<?php echo substr(($std["MONTH-YEAR"]),0,-3);?></p>
                <p><div id="field" style="width: 50%;padding-left: 20px;">Fees Payed:&nbsp;&nbsp;&nbsp;<?php echo $fee["FEE"]; ?></div><div>Date of Payment:&nbsp;&nbsp;&nbsp;<?php echo $std2["DATE-OF-PAYMENT"];?></div></p>
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
