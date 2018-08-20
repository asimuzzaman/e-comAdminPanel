<!DOCTYPE html>
<html lang="en">

<head>
<?php require_once("../includes/database.php"); ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Feedbacks</title>

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

<?php
    require_once("../includes/navbar.php"); 

    if (isset($_POST['submit'])) {
        $q3 = "update feedback set reply='".$_POST['reply']."', replied_by=".$_SESSION['admin_id']." where fb_id=".$_POST['fb_id'];
        query($q3);
    }
?>
        

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Customer feedbacks</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<?php
    $q = "select * from feedback order by date desc";
    $res = query($q);
    while ($row = mysqli_fetch_array($res)) {

?>
            <div class="row">
        <?php
            if ($row['is_solved'] != 1) { ?>
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <strong>Unsolved</strong>
                        </div>

    <?php    } else { ?>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <i class="fa fa-check"></i>
                            <strong>Solved</strong>                            
                        </div>

    <?php    }
        ?>
                        <div class="panel-body">
                            <p><?php echo $row['body']; ?></p>
    <?php
        $q1 = "select first_name, last_name from customer where customer_id = " .$row["customer_id"];
        $res1 = query($q1);
        $output = mysqli_fetch_array($res1);
    ?>
                            <p>Submitted by - <strong><?php echo $output[0]." ".$output[1]." on ".date("d-M-y h:i",$row['date']); ?></strong></p>
    <?php
        if ($row['is_solved'] != 1) { ?>
            <a href="#" class="btn btn-success btn-xs">Mark as solved</a>
    <?php    
        }
    ?>
                            
                        </div>
                        <div class="panel-footer">
                        <?php
                            if($row['reply'] != NULL) {
                        ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <?php
                                        echo "<strong>Admin's reply:</strong><br>".$row['reply'];
                                        $q2 = "select name from admin where admin_id = ". $row['replied_by'];
                                        $res2 = query($q2);
                                        $row2 = mysqli_fetch_array($res2);                                        
                                        echo " - <strong> $row2[0] </strong>";
                                    ?>
                                </div>
                            </div>
                        <?php } ?>
                            <form role="form" action="/dashboard/feedback.php" method="post">
                                <input type="hidden" name="fb_id" value="<?php echo $row[0]; ?> ">
                                <div class="form-group">                                
                                    <textarea name="reply" placeholder="Reply here" cols="50"></textarea>                            
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Reply</button>
                            </form>
                        </div>
                    </div>
            </div>
<?php } ?>
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

</body>

</html>
