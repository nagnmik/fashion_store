<?php

if (!isset($_SESSION['ADMIN_NAME'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <div class="row"><!-- row 1 begin -->
        <div class="col-lg-12"><!-- col-lg-12 begin -->
            <ol class="breadcrumb"><!-- breadcrumb begin -->
                <li class="active"><!-- active begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / View Products

                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 1 finish -->

    <div class="row"><!-- row 2 begin -->
        <div class="col-lg-12"><!-- col-lg-12 begin -->
            <div class="panel panel-default"><!-- panel panel-default begin -->
                <div class="panel-heading"><!-- panel-heading begin -->
                    <h3 class="panel-title"><!-- panel-title begin -->

                        <i class="fa fa-tags"></i> View Products

                    </h3><!-- panel-title finish -->
                </div><!-- panel-heading finish -->

                <div class="panel-body"><!-- panel-body begin -->
                    <div class="table-responsive"><!-- table-responsive begin -->
                        <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->

                            <thead><!-- thead begin -->
                                <tr><!-- tr begin -->
                                    <th> Product ID: </th>
                                    <th> Product Title: </th>
                                    <th> Product Image: </th>
                                    <th> Product Price: </th>
                                    <th> Product Sold: </th>
                                    <th> Product Keywords: </th>
                                    <th> Product Date: </th>
                                    <th> Product Delete: </th>
                                    <th> Product Edit: </th>
                                </tr><!-- tr finish -->
                            </thead><!-- thead finish -->

                            <tbody><!-- tbody begin -->

                                <?php

                                $i = 0;

                                $get_pro = "select * from clothes_products";

                                $run_pro = mysqli_query($con, $get_pro);

                                while ($row_pro = mysqli_fetch_array($run_pro)) {

                                    $pro_id = $row_pro['PRODUCT_ID'];

                                    $pro_title = $row_pro['NAME'];

                                    $pro_img1 = $row_pro['IMAGE_1'];

                                    $pro_price = $row_pro['price'];

                                    $pro_keywords = $row_pro['KEYWORDS'];

                                    $pro_date = $row_pro['DATE_CREATED'];

                                    $i++;

                                ?>

                                    <tr><!-- tr begin -->
                                        <td> <?php echo $i; ?> </td>
                                        <td> <?php echo $pro_title; ?> </td>
                                        <td> <img src="product_images/<?php echo $pro_img1; ?>" width="60" height="60"></td>
                                        <td> <?php echo $pro_price; ?> VNĐ </td>
                                        <td> <?php

                                                $get_sold = "select * from order_details where PRODUCT_ID='$pro_id'";

                                                $run_sold = mysqli_query($con, $get_sold);

                                                $count = mysqli_num_rows($run_sold);

                                                echo $count;

                                                ?>
                                        </td>
                                        <td> <?php echo $pro_keywords; ?> </td>
                                        <td> <?php echo $pro_date ?> </td>
                                        <td>

                                            <a href="index.php?delete_product=<?php echo $pro_id; ?>">

                                                <i class="fa fa-trash-o"></i> Delete

                                            </a>

                                        </td>
                                        <td>

                                            <a href="index.php?edit_product=<?php echo $pro_id; ?>">

                                                <i class="fa fa-pencil"></i> Edit

                                            </a>

                                        </td>
                                    </tr><!-- tr finish -->

                                <?php } ?>

                            </tbody><!-- tbody finish -->

                        </table><!-- table table-striped table-bordered table-hover finish -->
                    </div><!-- table-responsive finish -->
                </div><!-- panel-body finish -->

            </div><!-- panel panel-default finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 2 finish -->

<?php } ?>