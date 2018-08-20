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

    <title>Add new product</title>

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
                    <h1 class="page-header">New Product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Enter the information of new product
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
<?php
    
    if (isset($_POST['submit'])) {
        //File uploading section
        //$directory = "/uploads/";
        //$directory = "D:\\xampp\\htdocs\\uploads\\";
        $directory = $_SERVER['DOCUMENT_ROOT']. "\\uploads\\";
        $file = $directory . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
        
        $isImage = getimagesize($_FILES["image"]["tmp_name"]);
        if($isImage !== false) {
            //echo "File is an image - " . $isImage["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $file)) {
                //echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        
        $name = $_POST['name'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $vat = $_POST['vat'];
        $image = basename($_FILES["image"]["name"]);
        $admin = $_SESSION['admin_id'];

        $q = "insert into product values (NULL,'$name',$price,$vat,$admin,'$image',1,$qty)";
        query($q);
?>
    <div class="alert alert-success">
        New product has been successfully added!
    </div>
<?php
    }
?>
                                    <form role="form" action="/dashboard/newProduct.php" method="post" enctype="multipart/form-data">                                        
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="name" class="form-control" placeholder="Pencil">
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input name="price" class="form-control" placeholder="1000.00">
                                        </div>                                                                      
                                        <div class="form-group">
                                            <label>VAT</label>
                                            <input name="vat" class="form-control" placeholder="5.00">
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="number" name="qty" class="form-control" placeholder="100">
                                        </div>
                                        <div class="form-group">
                                            <label>Select image to upload</label>
                                            <input type="file" name="image" id="image"> 
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
