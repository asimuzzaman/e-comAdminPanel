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

    <title>Add new admin</title>

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
                    <h1 class="page-header">Add new admin</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Fill up the form to add admin
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
<?php
    if (isset($_POST['submit'])) {
        if ($_POST['pass'] != $_POST['confirm']) {
?>
    <div class="alert alert-danger">
        Password doesn't match with confirm password</a>.
    </div>
<?php
        } else {
            $name = $_POST['first'] . " " . $_POST['last'];
            $username = $_POST['username'];
            $pass = crypt($_POST['pass'],'st');
            $email = $_POST['email'];
            $priority = $_POST['priority'];
            $time = time();

            $q = "insert into admin values (NULL,'$username','$name','$pass',$priority,$time,'$email')";
            query($q);
?>
    <div class="alert alert-success">
        New admin has been successfully added!
    </div>
<?php
        }
    }
?>
                                    <form role="form" action="/admin/new.php" method="post">                                        
                                        <div class="form-group">
                                            <label>First name</label>
                                            <input name="first" class="form-control" placeholder="John">
                                        </div>
                                        <div class="form-group">
                                            <label>Last name</label>
                                            <input name="last" class="form-control" placeholder="Smith">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input name="username" type="text" class="form-control" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" class="form-control" placeholder="john.smith@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input name="pass" type="password" class="form-control" placeholder="Enter text">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm password</label>
                                            <input name="confirm" type="password" class="form-control" placeholder="Enter text">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Privilege</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="priority" id="optionsRadios1" value="1" checked>Highest
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="priority" id="optionsRadios2" value="2">Medium
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="priority" id="optionsRadios3" value="3">Lowest
                                                </label>
                                            </div>
                                        </div>                                    
                                        
                                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
<?php CloseDb(); ?>
</body>

</html>
