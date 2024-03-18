<?php

if (!isset($_SESSION['ADMIN_NAME'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <div class="row"><!-- row 1 begin -->
        <div class="col-lg-12"><!-- col-lg-12 begin -->
            <ol class="breadcrumb"><!-- breadcrumb begin -->
                <li class="active"><!-- active begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / View Orders

                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 1 finish -->

    <div class="row"><!-- row 2 begin -->
        <div class="col-lg-12"><!-- col-lg-12 begin -->
            <div class="panel panel-default"><!-- panel panel-default begin -->
                <div class="panel-heading"><!-- panel-heading begin -->
                    <h3 class="panel-title"><!-- panel-title begin -->

                        <i class="fa fa-tags"></i> View Orders

                    </h3><!-- panel-title finish -->
                </div><!-- panel-heading finish -->

                <div class="panel-body"><!-- panel-body begin -->
                    <div class="table-responsive"><!-- table-responsive begin -->
                        <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->

                            <thead><!-- thead begin -->
                                <tr><!-- tr begin -->
                                    <th> Order ID: </th>
                                    <th> Customer Email: </th>
                                    <th> Product Name: </th>
                                    <th> Product Qty: </th>
                                    <th> Product Size: </th>
                                    <th> Total Amount: </th>
                                    <th> Order Date: </th>
                                    <th> Order Status: </th>
                                    <th> Delete: </th>
                                </tr><!-- tr finish -->
                            </thead><!-- thead finish -->

                            <tbody><!-- tbody begin -->

                                <?php
                                $get_order_details = "select * from order_details";
                                $run_order_details = mysqli_query($con, $get_order_details);
                                while ($row_order_details = mysqli_fetch_array($run_order_details)) {
                                    $order_id = $row_order_details['ORDER_ID'];
                                    $product_id = $row_order_details['PRODUCT_ID'];

                                    $qty = $row_order_details['QUANTITY'];

                                    $size = $row_order_details['SIZE'];

                                    $get_products = "select * from clothes_products where PRODUCT_ID='$product_id'";

                                    $run_products = mysqli_query($con, $get_products);

                                    $row_products = mysqli_fetch_array($run_products);

                                    $product_name = $row_products['NAME'];
                                    $product_price = $row_products['price'];
                                    $total = $product_price * $qty;


                                    $get_orders = "select * from orders  where ORDER_ID='$order_id'";

                                    $run_orders = mysqli_query($con, $get_orders);

                                    while ($row_order = mysqli_fetch_array($run_orders)) {
                                        $order_status = $row_order['STATUS'];
                                        $order_created_on = $row_order['CREATED_ON'];

                                        $c_id = $row_order['CUSTOMER_ID'];

                                        $get_customer = "select * from customers where CUSTOMER_ID='$c_id'";

                                        $run_customer = mysqli_query($con, $get_customer);

                                        $row_customer = mysqli_fetch_array($run_customer);

                                        $customer_email = $row_customer['EMAIL'];
                                    }






                                ?>

                                    <tr><!-- tr begin -->
                                        <td> <?php echo $order_id; ?> </td>
                                        <td> <?php echo $customer_email; ?> </td>
                                        <td> <?php echo $product_name; ?> </td>
                                        <td> <?php echo $qty; ?></td>
                                        <td> <?php echo $size; ?> </td>
                                        <td> <?php echo $total; ?> </td>
                                        <td> <?php echo $order_created_on; ?> </td>
                                        <td> <?php echo $order_status; ?> </td>
                                        <td>

                                            <a href="index.php?delete_order=<?php echo $order_id; ?>">

                                                <i class="fa fa-trash-o"></i> Delete

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