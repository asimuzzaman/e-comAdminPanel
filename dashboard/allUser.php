<!DOCTYPE html>
<html lang="en">

<head>
<?php
    require_once("../includes/database.php");
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Customers</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

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

        <?php require_once("../includes/navbar.php"); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Customers</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of all customers
                        </div>
                        <!-- /.panel-heading -->
<?php
    if (isset($_GET['d'])) {
        $id = $_GET['d'];
        $q = "delete from customer where customer_id = $id";
        query($q);
?>
        <div class="alert alert-success">
            Customer has been deleted successfully.
        </div>
<?php
    } elseif (isset($_GET['b'])) {
        $block = $_GET['b'];
        $id = $_GET['u'];

        $q = "update customer set is_blocked = $block where customer_id = $id";
        query($q);
    }
?>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>                                                                                
                                        <th>Name</th>
                                        <!-- <th>Last Name</th> -->
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Joining date</th>
                                        <th>Address</th>
                                        <th>Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
    $q = "select * from customer";
    $res = query($q);
    while ($row = mysqli_fetch_array($res)) {
?>
        <tr>  
            <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
            <!-- <td><?php// echo $row['last_name']; ?></td> -->
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo date('d-M-Y, h:i', $row['join_date']); ?></td>
            <td><?php echo $row['delivery_address']; ?></td>
            <td>
<?php
    if ($row['is_blocked'] == 1) {
        echo "<a href=\"/dashboard/allUser.php?b=0&u=$row[0]\" class=\"btn btn-success btn-xs\">Unblock</a>";
    } else
        echo "<a href=\"/dashboard/allUser.php?b=1&u=$row[0]\" class=\"btn btn-warning btn-xs\">Block</a>";
?>
                <a href="/dashboard/allUser.php?d=<?php echo $row[0]; ?>" class="btn btn-danger btn-xs">Delete</a>
                <a href="#" class="btn btn-primary btn-xs">Edit</a>
            </td>
        </tr>
<?php
    }
?>
                                    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>User panel usage guideline</h4>
                                <p>This is the panel for admins to list all users from company's database. Admins can also delete, block or unblock, edit users' information from this panel. Once a user's information gets deleted it can't be rollbacked. Use this panel with caution. <strong>Blocking</strong> a user means he/she won't be able to puchase any product from their account.</p>
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="#">View Admin Panel Documentation</a>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
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

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
<?php CloseDb(); ?>
</body>

</html>
