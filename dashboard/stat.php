<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("../includes/database.php"); ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sales Statistics</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

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
<?php require_once("../includes/navbar.php"); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sales Statistics</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<?php
    $panel_type = array("primary","success","info","warning","danger","green","yellow","red");
    $i = 0;

    $q1 = "select * from receipt order by date desc";
    $res1 = query($q1);

    while ($row1 = mysqli_fetch_array($res1)) {
         $panel = rand(0,7);
        
        if ($i%3 == 0)
            echo "<div class=\"row\">";
?>
                <div class="col-lg-4">
                    <div class="panel <?php echo "panel-". $panel_type[$panel];  ?>">
                        <div class="panel-heading">
                        <?php
                            echo date("d-M-Y, H:i a",$row1['date']);
                            echo "<strong> | ";
                            if ($row1["status"] == 0)
                                echo "Delivered";
                            else if($row1["status"] == 1)
                                echo "Shipping";
                            else
                                echo "Ordered";
                            echo " |</strong>";
                        ?>
                        </div>
                        <div class="panel-body">
                            Product - Qty - Price - Subtotal
                            <hr>
                        <?php
                            $total = 0;
                            $q2 = "select p.name, p.price, p.vat, r.quantity from product p join ";
                            $q2 .= "purchase r on p.pro_id = r.pro_id where receipt_id = ".$row1['receipt_id'];
                            $res2 = query($q2);
                            while ($row2 = mysqli_fetch_array($res2)) {
                                $stotal = $row2[3]*($row2[1] + $row2[1] * ($row2[2]/100));
                                $total += $stotal;

                                echo "<p>$row2[0] - $row2[3] - $row2[1] - <strong>$stotal </strong>BDT</p>";
                            }
                        ?>
                        </div>
                        <div class="panel-footer">
                            <?php
                                echo "Total price: <strong>$total</strong> BDT, User: ";
                                $q3 = "select first_name, last_name from customer where customer_id =" .$row1['customer_id'];
                                $res3 = query($q3);
                                $row3 = mysqli_fetch_array($res3);
                                echo $row3[0]." ".$row3[1];
                            ?>
                        </div>
                    </div>
                </div>
<?php
        if (($i-2)%3 == 0)
            echo "</div>";

        $i++;
    }
?>
            <!-- /.row -->
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
<?php CloseDb(); ?>
</body>

</html>
