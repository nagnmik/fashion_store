<?php

if (!isset($_SESSION['ADMIN_NAME'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <?php

    if (isset($_GET['edit_product'])) {

        $edit_id = $_GET['edit_product'];

        $get_p = "select * from clothes_products where PRODUCT_ID='$edit_id'";

        $run_edit = mysqli_query($con, $get_p);

        $row_edit = mysqli_fetch_array($run_edit);

        $p_id = $row_edit['PRODUCT_ID'];

        $p_title = $row_edit['NAME'];

        $p_cat = $row_edit['CLOTHES_CATEGORY_ID'];

        $p_brand = $row_edit['BRAND_ID'];

        $p_image1 = $row_edit['IMAGE_1'];

        $p_image2 = $row_edit['IMAGE_2'];

        $p_image3 = $row_edit['IMAGE_3'];

        $p_price = $row_edit['price'];

        $p_keywords = $row_edit['KEYWORDS'];

        $p_desc = $row_edit['DESCRIPTION'];
    }

    $get_p_cat = "select * from clothes_categories where CLOTHES_CATEGORY_ID='$p_cat'";

    $run_p_cat = mysqli_query($con, $get_p_cat);

    $row_p_cat = mysqli_fetch_array($run_p_cat);

    $p_cat_title = $row_p_cat['CATEGORY'];

    $get_brand = "select * from brands where BRAND_ID='$p_brand'";

    $run_brand = mysqli_query($con, $get_brand);

    $row_brand = mysqli_fetch_array($run_brand);

    $brand_title = $row_brand['NAME'];

    ?>
    <div class="row"><!-- row Begin -->

        <div class="col-lg-12"><!-- col-lg-12 Begin -->

            <ol class="breadcrumb"><!-- breadcrumb Begin -->

                <li class="active"><!-- active Begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / Edit Products

                </li><!-- active Finish -->

            </ol><!-- breadcrumb Finish -->

        </div><!-- col-lg-12 Finish -->

    </div><!-- row Finish -->

    <div class="row"><!-- row Begin -->

        <div class="col-lg-12"><!-- col-lg-12 Begin -->

            <div class="panel panel-default"><!-- panel panel-default Begin -->

                <div class="panel-heading"><!-- panel-heading Begin -->

                    <h3 class="panel-title"><!-- panel-title Begin -->

                        <i class="fa fa-money fa-fw"></i> Edit Products

                    </h3><!-- panel-title Finish -->

                </div> <!-- panel-heading Finish -->

                <div class="panel-body"><!-- panel-body Begin -->

                    <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->

                        <div class="form-group"><!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Product Title </label>

                            <div class="col-md-6"><!-- col-md-6 Begin -->

                                <input name="product_title" type="text" class="form-control" required value="<?php echo $p_title; ?>">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group"><!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Product Category </label>

                            <div class="col-md-6"><!-- col-md-6 Begin -->

                                <select name="product_cat" class="form-control"><!-- form-control Begin -->

                                    <option value="<?php echo $p_cat; ?>"> <?php echo $p_cat_title; ?> </option>

                                    <?php

                                    $get_p_cats = "select * from clothes_categories";
                                    $run_p_cats = mysqli_query($con, $get_p_cats);

                                    while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

                                        $p_cat_id = $row_p_cats['CLOTHES_CATEGORY_ID'];
                                        $p_cat_title = $row_p_cats['CATEGORY'];

                                        echo "
                                  
                                  <option value='$p_cat_id'> $p_cat_title </option>
                                  
                                  ";
                                    }

                                    ?>

                                </select><!-- form-control Finish -->

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group"><!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Brand </label>

                            <div class="col-md-6"><!-- col-md-6 Begin -->

                                <select name="product_brand" class="form-control"><!-- form-control Begin -->

                                    <option value="<?php echo $p_brand; ?>"> <?php echo $brand_title; ?> </option>

                                    <?php

                                    $get_brand = "select * from brands";
                                    $run_brand = mysqli_query($con, $get_brand);

                                    while ($row_brand = mysqli_fetch_array($run_brand)) {

                                        $brand_id = $row_brand['BRAND_ID'];
                                        $brand_title = $row_brand['NAME'];

                                        echo "
                                  
                                  <option value='$brand_id'> $brand_title </option>
                                  
                                  ";
                                    }

                                    ?>

                                </select><!-- form-control Finish -->

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group"><!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Product Image 1 </label>

                            <div class="col-md-6"><!-- col-md-6 Begin -->

                                <input name="product_img1" type="file" class="form-control">

                                <br>

                                <img width="70" height="70" src="product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_image1; ?>">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group"><!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Product Image 2 </label>

                            <div class="col-md-6"><!-- col-md-6 Begin -->

                                <input name="product_img2" type="file" class="form-control">

                                <br>

                                <img width="70" height="70" src="product_images/<?php echo $p_image2; ?>" alt="<?php echo $p_image2; ?>">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group"><!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Product Image 3 </label>

                            <div class="col-md-6"><!-- col-md-6 Begin -->

                                <input name="product_img3" type="file" class="form-control form-height-custom">

                                <br>

                                <img width="70" height="70" src="product_images/<?php echo $p_image3; ?>" alt="<?php echo $p_image3; ?>">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group"><!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Product Price </label>

                            <div class="col-md-6"><!-- col-md-6 Begin -->

                                <input name="product_price" type="text" class="form-control" required value="<?php echo $p_price; ?>">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group"><!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Product Keywords </label>

                            <div class="col-md-6"><!-- col-md-6 Begin -->

                                <input name="product_keywords" type="text" class="form-control" required value="<?php echo $p_keywords; ?>">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group"><!-- form-group Begin -->

                            <label class="col-md-3 control-label"> Product Desc </label>

                            <div class="col-md-6"><!-- col-md-6 Begin -->

                                <textarea name="product_desc" cols="19" rows="6" class="form-control">

                              <?php echo $p_desc; ?>
                              
                          </textarea>

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                        <div class="form-group"><!-- form-group Begin -->

                            <label class="col-md-3 control-label"></label>

                            <div class="col-md-6"><!-- col-md-6 Begin -->

                                <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control">

                            </div><!-- col-md-6 Finish -->

                        </div><!-- form-group Finish -->

                    </form><!-- form-horizontal Finish -->

                </div><!-- panel-body Finish -->

            </div><!-- canel panel-default Finish -->

        </div><!-- col-lg-12 Finish -->

    </div><!-- row Finish -->

    <script src="js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>


    <?php

    if (isset($_POST['update'])) {

        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $product_brand = $_POST['product_brand'];
        $product_price = $_POST['product_price'];
        $product_keywords = $_POST['product_keywords'];
        $product_desc = $_POST['product_desc'];

        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];

        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];

        move_uploaded_file($temp_name1, "product_images/$product_img1");
        move_uploaded_file($temp_name2, "product_images/$product_img2");
        move_uploaded_file($temp_name3, "product_images/$product_img3");

        $update_product = "update clothes_products set CLOTHES_CATEGORY_ID='$product_cat',BRAND_ID='$product_brand',DATE_CREATED=NOW(),NAME='$product_title',IMAGE_1='$product_img1',IMAGE_2='$product_img2',IMAGE_3='$product_img3',KEYWORDS='$product_keywords',DESCRIPTION='$product_desc',price='$product_price' where PRODUCT_ID='$p_id'";

        $run_product = mysqli_query($con, $update_product);

        if ($run_product) {

            echo "<script>alert('Your product has been updated Successfully')</script>";

            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
    }

    ?>


<?php } ?>