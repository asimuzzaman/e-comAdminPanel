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

    <title>All admins</title>

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
                    <h1 class="page-header">Admins</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of all admins
                        </div>
                        <!-- /.panel-heading -->
<?php
    //Setting admin privileges
    $admin_id = $_SESSION['admin_id'];
    $q1 = "select priority from admin where admin_id = $admin_id";
    $res = query($q1);
    $row = mysqli_fetch_array($res);

    if($row[0] < 2) {

    if (isset($_GET['d'])) {
        $id = $_GET['d'];
        $q = "delete from admin where admin_id = $id";
        query($q);
?>
        <div class="alert alert-success">
            Admin has been deleted successfully.
        </div>
<?php
    }
?>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>                                                                                
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Privilege</th>
                                        <th>Email</th>
                                        <th>Joining date</th>
                                        <th>Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
    $q = "select * from admin";
    $res = query($q);
    while ($row = mysqli_fetch_array($res)) {
?>
        <tr>  
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php
                if ($row['priority'] == 1) {
                    echo "Highest";
                } elseif ($row['priority'] == 2) {
                    echo "Medium";
                } else
                    echo "Lowest";
                ?>              
            </td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo date('d-M-Y, h:i', $row['join_date']); ?></td>
            <td>
<?php
    if ($_SESSION['admin_id'] != $row[0]) {
       
?>
                <a href="/admin/all.php?d=<?php echo $row[0]; ?>" class="btn btn-danger btn-xs">Delete</a>
<?php
    }
?>
                <a href="/admin/edit.php?id=<?php echo $row[0]; ?>" class="btn btn-primary btn-xs">Edit</a>
            </td>
        </tr>
<?php
    }
?>
                                    
                                </tbody>
                            </table>
                        <?php } else
                                    echo "<h2>You don't have privilege to access this</h2>"; //Setting admin privilese ends here ?>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>Admin Panel usage instruction</h4>
                                <p>This is the panel for admins to list all the admins from company's database. Privileged can delete, edit admins' information from this panel. Once an admin's information gets deleted it can't be rollbacked. Use this panel with caution. </p>
                                <a class="btn btn-default btn-lg btn-block" href="#">View Documentation</a>
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
