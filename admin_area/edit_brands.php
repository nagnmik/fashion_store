<?php

if (!isset($_SESSION['ADMIN_NAME'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <?php

    if (isset($_GET['edit_brands'])) {

        $edit_brand_id = $_GET['edit_brands'];

        $edit_brand_query = "select * from brands where BRAND_ID='$edit_brand_id'";

        $run_edit = mysqli_query($con, $edit_brand_query);

        $row_edit = mysqli_fetch_array($run_edit);

        $brand_id = $row_edit['BRAND_ID'];

        $brand_name = $row_edit['NAME'];

        $brand_desc = $row_edit['DECRIPTION'];
    }

    ?>

    <div class="row"><!-- row 1 begin -->
        <div class="col-lg-12"><!-- col-lg-12 begin -->
            <ol class="breadcrumb"><!-- breadcrumb begin -->
                <li>

                    <i class="fa fa-dashboard"></i> Dashboard / Edit Brands

                </li>
            </ol><!-- breadcrumb finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 1 finish -->

    <div class="row"><!-- row 2 begin -->
        <div class="col-lg-12"><!-- col-lg-12 begin -->
            <div class="panel panel-default"><!-- panel panel-default begin -->
                <div class="panel-heading"><!-- panel-heading begin -->
                    <h3 class="panel-title"><!-- panel-title begin -->

                        <i class="fa fa-pencil fa-fw"></i> Edit Brands

                    </h3><!-- panel-title finish -->
                </div><!-- panel-heading finish -->

                <div class="panel-body"><!-- panel-body begin -->
                    <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                        <div class="form-group"><!-- form-group begin -->

                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                                Brand Name

                            </label><!-- control-label col-md-3 finish -->

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input value=" <?php echo $brand_name; ?> " name="brand_name" type="text" class="form-control">

                            </div><!-- col-md-6 finish -->

                        </div><!-- form-group finish -->
                        <div class="form-group"><!-- form-group begin -->

                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->

                                Brands Description

                            </label><!-- control-label col-md-3 finish -->

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <textarea type='text' name="brand_desc" class="form-control"><?php echo $brand_desc; ?></textarea>

                            </div><!-- col-md-6 finish -->

                        </div><!-- form-group finish -->
                        <div class="form-group"><!-- form-group begin -->

                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin -->



                            </label><!-- control-label col-md-3 finish -->

                            <div class="col-md-6"><!-- col-md-6 begin -->

                                <input value="Update" name="update" type="submit" class="form-control btn btn-primary">

                            </div><!-- col-md-6 finish -->

                        </div><!-- form-group finish -->
                    </form><!-- form-horizontal finish -->
                </div><!-- panel-body finish -->

            </div><!-- panel panel-default finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 2 finish -->

    <?php

    if (isset($_POST['update'])) {

        $brand_name = $_POST['brand_name'];

        $brand_desc = $_POST['brand_desc'];

        $update_brand = "update brands set NAME='$brand_name',DECRIPTION='$brand_desc' where BRAND_ID='$brand_id'";

        $run_brand = mysqli_query($con, $update_brand);

        if ($run_brand) {

            echo "<script>alert('Your Brand Has Been Updated')</script>";

            echo "<script>window.open('index.php?view_brands','_self')</script>";
        }
    }

    ?>



<?php } ?>