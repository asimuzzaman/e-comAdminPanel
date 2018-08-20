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

    <title>Edit product</title>

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
                    <h1 class="page-header">Edit product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit product data
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
<?php
    if (isset($_POST['submit'])) {
        $update_q = "update product set pro_id = ".$_POST['pro_id'].",price =".$_POST['price'].", vat=".$_POST['vat'];
        $update_q .= ", quantity =".$_POST['qty']." where pro_id=".$_POST['pro_id'];
        
        query($update_q);
?>
    <div class="alert alert-success">
        Product data has been updated!
    </div>
<?php
    }

    if (isset($_GET['id'])) {
        $pro_id = $_GET['id'];
        $q1 = "select * from product where pro_id = $pro_id;";
        $res = query($q1);
        $output = mysqli_fetch_array($res);
?>    
                                    <form role="form" action="/dashboard/editProduct.php?id=<?php echo $output[0]; ?> " method="post">
                                        <input type="hidden" name="pro_id" value="<?php echo $output[0]; ?> ">                                        
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="name" class="form-control" value="<?php echo $output['name']; ?>">
                                        </div>
                                        <div class="form-group input-group">
                                            <label>Price (in BDT)</label>                                            
                                            <input name="price" type="text" class="form-control" value="<?php echo $output['price']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>VAT (%)</label>
                                            <input name="vat" class="form-control" value="<?php echo $output['vat']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="number" name="qty" class="form-control" value="<?php echo $output['quantity']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <img src="/uploads/<?php echo $output['image']; ?>" width="152" height="92">
                                        </div>
                                        

                                        
                                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
<?php } ?>
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
