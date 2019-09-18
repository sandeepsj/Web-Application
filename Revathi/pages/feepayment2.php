<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $conn=new mysqli("localhost","root","","revathi-studentdb");
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
    
    $admn=$_POST["searchid"];
    $sqlq="SELECT * FROM `studentdb` WHERE `ADMN-NO`=$admn OR `PHONE`=$admn;" ;
    $result=mysqli_query($conn,$sqlq);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
     $sqlq2="SELECT * FROM `feestructure` WHERE `SUBJECT`=''" ;
    $result2=mysqli_query($conn,$sqlq2);
    $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
    if (is_null($row)) {
        # code...
        echo "<script>alert('Admission Number is not found in the Database');</script>";
    }
    mysqli_free_result($result);
    ?>
    <script type="text/javascript">
        function checkInp()
        { 
          var x=document.forms["adform"]["searchid"].value;
          var regex=/^[0-9]+$/;
          if (!x.match(regex))
          {
              alert("Admission number has to be number");
              return false;
          }
          else
          {
            var x=getElementById('reciept');
            x.style.display="block";
          }
        }

    	
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Revathi-Student Search</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Revathi Dance and Music School</a>
            </div>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <form role="form" action="name-search.php" method="post">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search By Name..." name="name">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    </span>
                                </div>
                            </form>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="newadmn.html"><i class="fa fa-bar-chart-o fa-fw"></i>New Admission<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="newadmn.html">New Admission</a>
                                </li>
                                <li>
                                    <a href="closadmn.html">Close Admission</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i>Student Details<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="student.html">Get Student info by admission No.</a>
                                </li>
                                
                                <li>
                                    <a href="subfilter.php">Subject filter</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="newadmn.html"><i class="fa fa-money fa-fw"></i>Fees<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="feepayment.php">Fees Payment</a>
                                </li>
                                <li>
                                    <a href="getreciept.php">Get a Reciept</a>
                                </li>
                                <li>
                                    <a href="due.php">Dues</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i>Edit Database<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="addsub.php">Add a Subject</a>
                                </li>
                                <li>
                                    <a href="editfee.php">Edit Fee Structure</a>
                                </li>
                                <li>
                                    <a href="editstud.html">Edit Student Details </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Institution Details<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
                                <li>
                                    <a href="collection.php">Fee Recieved History</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ..
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <form role="form" action="" method="post" name="adform" id="adform" onsubmit="return checkInp()">
                                        <div class="input-group custom-search-form">
                                            <input type="text" class="form-control" placeholder="Admission No Or Phone" name="searchid" id="searchid">
                                            <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                        </div>
                                    </form>
                                </div>
                            
                            </div><br>
                            <div class="col-lg-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                         Make fee Receipt
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="list-group">
                                            
                                            <div class="list-group-item">
                                                Admisssion No
                                                <span class="pull-right text-muted small"><?php echo $row["ADMN-NO"]; ?>
                                                </span>
                                            </div>
                                            <div class="list-group-item">
                                                Name
                                                <span class="pull-right text-muted small"><?php echo $row["NAME"]; ?>
                                                </span>
                                            </div>
                                            <div class="list-group-item">
                                                Subject
                                                <span class="pull-right text-muted small"><?php echo $row["SUBJECT"]; ?>
                                                </span>
                                            </div>
                                            <div class="list-group-item">
                                                Fee Total
                                                <span class="pull-right text-muted small"><?php echo $row["FEES-TOTAL"]; ?>
                                                </span>
                                            </div>
                                            <pre >              Payment Details</pre>
                                            <form role="form" action="reciept.php?admn=<?php echo $row["ADMN-NO"]; ?>" method="post" name="adform">
                                            <div class="list-group-item" >
                                                Select Subject
                                                <select class="pull-right text-muted col-lg-4" name="sub2" style="color: black;" id="sub1" >
                                                    <?php
                                                        $sub=explode(",",$row["SUBJECT"]);
                                                        foreach($sub as $value){
                                                    ?>
                                                        <option style="color: black;"><?php echo $value;?></option>
                                                    <?php }?>
                                                </select>
                                                
                                            </div>
                                            <div class="list-group-item">
                                                Select Month
                                                <input class="pull-right text-muted small col-lg-4" type="month" name="month" style="color: black;" id="my">
                                            </div>
                                            <div class="list-group-item">
                                                Date of payment
                                                <input class="pull-right text-muted small col-lg-4" type="date" name="paydate" value="<?php echo date("Y-m-d");?>" style="color: black;">
                                            </div>
                                            
                                            <br><center>
                                            <button type="submit" class="btn btn-primary">Make Receipt and store data</button></center>
                                            </form>
                                        </div>
                                        <!-- /.list-group -->
                                       
                                    </div>
                                    <!-- /.panel-body -->
                                </div>

                                <!-- /.col-lg-6 (nested) -->
                                   <!-- /.col-lg-6 (nested) -->
                            </div>

                            <!-- /.row (nested) -->
                        </div>

                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                </div>

            </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
