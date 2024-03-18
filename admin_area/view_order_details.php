<?php

if (!isset($_SESSION['ADMIN_NAME'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>
    <?php

    if (isset($_GET['view_order_details'])) {

        $order_id = $_GET['view_order_details'];
    ?>

        <?php
        $get_orders = "select * from orders  where ORDER_ID='$order_id'";

        $run_orders = mysqli_query($con, $get_orders);

        $row_order = mysqli_fetch_array($run_orders);
        $payment_method = $row_order['PAYMENT_METHOD'];
        $ship_date = $row_order['SHIPPING_ON'];
        $order_status = $row_order['STATUS'];
        $total = $row_order['total'];
        $customer_pay = "$total" . " VNĐ";

        $invoice_num = '';
        if (strcmp($order_status, 'Đã thanh toán') == 0) {
            $customer_pay = 0 . " VNĐ";
        }

        $order_created_on = $row_order['CREATED_ON'];


        $shipping_id = $row_order['SHIPPING_ID'];
        $select_ship = "select * from shipping where SHIPPING_ID = '$shipping_id'";
        $run_ship = mysqli_query($con, $select_ship);
        $row_ship = mysqli_fetch_array($run_ship);
        $shipping_cost = $row_ship['shipping_cost'];


        $customer_id = $row_order['CUSTOMER_ID'];
        $select_customer = "select * from customers where CUSTOMER_ID='$customer_id'";
        $run_customer = mysqli_query($con, $select_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $name_customer = $row_customer['NAME'];
        $phone_customer = $row_customer['PHONE'];
        $address_customer = $row_customer['ADDRESS'];
        $city_customer = $row_customer['CITY'];
        $country_customer = $row_customer['COUNTRY'];

        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><!-- panel-heading begin -->
                        <h3 class="panel-title"><!-- panel-title begin -->

                            <i class="fa fa-shopping-bag"></i> Order ID: <?php echo "$order_id" ?>
                        </h3><!-- panel-title finish -->

                    </div><!-- panel-heading finish -->

                    <div class="row">
                        <div class="col-md-6"><!-- panel begin -->
                            <div class="panel-body"><!-- panel-body begin -->
                                <h5 class="text-muted"> From: </h5>
                                <p><?php echo "$name_customer" ?></p>
                                <p><?php echo "$address_customer" . " $city_customer " . "$country_customer" ?></p>
                                <p><?php echo "SĐT: " . "$phone_customer" ?></p>
                            </div><!-- widget-content-expanded finish -->
                        </div>

                        <div class="col-md-6"><!-- panel begin -->
                            <div class="panel-body"><!-- panel-body begin -->
                                <h5 class="text-muted"> Order Status: </h5>

                                <?php
                                $select_audit = "select * from audit where ORDER_ID = '$order_id'";
                                $run_audit = mysqli_query($con, $select_audit);
                                $num_audit = mysqli_num_rows($run_audit);
                                $k = 1;
                                while ($row_audit = mysqli_fetch_array($run_audit)) {
                                    $message = $row_audit['MESSAGE'];
                                    if ($k == $num_audit) {
                                ?>
                                        <strong class="text-primary"><?php echo $message ?></strong>
                                    <?php } else { ?>
                                        <p><?php echo $message ?></p>
                                <?php }
                                    $k++;
                                } ?>

                                <div class="text-left" style="margin-top: 20px;"><!-- text-right begin -->
                                    <a href="index.php?insert_audit=<?php echo $order_id ?>" class="btn btn-primary"><!-- a href begin -->

                                        Update Order Status <i class="fa fa-arrow-circle-right"></i>

                                    </a><!-- a href finish -->

                                </div><!-- text-right finish -->
                            </div><!-- widget-content-expanded finish -->
                        </div>
                    </div>

                    <hr class="dotted short">
                    <div class="panel-body">
                        <h5 class="text-muted"> Jemcloset Store </h5>
                        <hr class="dotted short">
                        <?php
                        $subtotal = 0;
                        $get_order_details = "select * from order_details where ORDER_ID= '$order_id' order by 1 DESC LIMIT 0,5";

                        $run_order_details = mysqli_query($con, $get_order_details);

                        while ($row_order_details = mysqli_fetch_array($run_order_details)) {

                            $product_id = $row_order_details['PRODUCT_ID'];

                            $qty = $row_order_details['QUANTITY'];
                            $size = $row_order_details['SIZE'];

                            $price = $row_order_details['price'];
                            $subtotal += $qty * $price;


                        ?>

                            <div class="row">
                                <?php
                                $get_name_product = "select * from clothes_products where PRODUCT_ID= '$product_id' order by 1 DESC LIMIT 0,5";

                                $run_name_product = mysqli_query($con, $get_name_product);
                                $row_name_product = mysqli_fetch_array($run_name_product);
                                $name_product = $row_name_product['NAME'];
                                $image_product = $row_name_product['IMAGE_1'];
                                ?>
                                <div class="col-md-2">
                                    <img class="img-responsive" src="product_images/<?php echo $image_product; ?>" alt="Product 3a">
                                </div>
                                <div class="col-md-10">
                                    <h3><?php echo "$name_product" ?></h3>
                                    <p><?php echo "Phân loại hàng: " . "$size" ?></p>
                                    <h4><?php echo "x" . "$qty" ?></h4>
                                </div>
                            </div>
                            <br>

                        <?php } ?>
                        <hr class="dotted short">
                        <div class="widget-content-expanded">
                            <p><?php echo "Order_date: " . "$order_created_on" ?></p>
                            <p><?php echo "Shipping_date: " . "$ship_date" ?></p>
                        </div>


                        <hr class="dotted short">

                        <div class="table-responsive"><!-- table-responsive begin -->
                            <table class="table table-hover table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Total cost of goods</td>
                                        <td><?php echo "$subtotal" ?></td>
                                    </tr>
                                    <tr>
                                        <td>Transport fee</td>
                                        <td><?php echo "$shipping_cost" ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td><?php echo "$total" ?></td>
                                    </tr>
                                    <tr>
                                        <td>Payment methods</td>
                                        <td><?php echo "$payment_method" ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tiền thu người nhận</td>
                                        <td><?php echo "$customer_pay" ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php
                        if (strcmp($order_status, 'Xác nhận đơn hàng') == 0) {
                            echo " <form method='post' class='text-left' enctype='multipart/form-data'><!-- form-horizontal Begin -->
                            <div class='form-group' style='width: 20%;'>
                            <input name='submit' value='Order Confirmed' type='submit' class='btn btn-primary form-control' disabled>
                            </div><!-- form-group Finish -->";
                        } else {
                            echo " <form method='post' class='text-left' enctype='multipart/form-data'><!-- form-horizontal Begin -->
                            <div class='form-group' style='width: 20%;'>
                            <input name='submit' value='Order Confirmed' type='submit' class='btn btn-primary form-control'>
                            </div><!-- form-group Finish -->";
                        }

                        if (isset($_POST['submit'])) { {
                                $update_status_order = "update orders set STATUS='Xác nhận đơn hàng' where ORDER_ID='$order_id'";
                                $run = mysqli_query($con, $update_status_order);
                                if ($run) {
                                    echo "<script>alert('Order has been confirmed sucessfully')</script>";
                                    echo "<script>window.open('index.php?view_order_details=<?php echo '$order_id'; ?>','_self')</script>";
                                }
                            }
                        }

                        ?>

                        <a href="print_order.php?order_id=<?php echo "$order_id" ?>" class="btn btn-primary" target="_blank"><!-- a href begin -->

                            <i class="fa fa-print"></i> Print Order

                        </a><!-- a href finish -->
                    </div>

                </div>
            </div>
        </div>
        </div>
    <?php } else {
        echo "<h3> Không có thông tin để hiển thị</h3>";
    }
    ?>

<?php } ?>