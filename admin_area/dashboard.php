<?php

if (!isset($_SESSION['ADMIN_NAME'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <div class="row"><!-- row no: 1 begin -->
        <div class="col-lg-12"><!-- col-lg-12 begin -->
            <ol class="breadcrumb"><!-- breadcrumb begin -->
                <li class="active"><!-- active begin -->

                    <i class="fa fa-dashboard"></i> Dashboard

                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->

        </div><!-- col-lg-12 finish -->
    </div><!-- row no: 1 finish -->

    <div class="row"><!-- row no: 2 begin -->

        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
            <div class="panel" style="color: #4D80E4; border: 1px solid #4D80E4;"><!-- panel panel-primary begin -->

                <div class="panel-heading"><!-- panel-heading begin -->
                    <div class="row"><!-- panel-heading row begin -->
                        <div class="col-xs-3"><!-- col-xs-3 begin -->

                            <i class="fa fa-tasks fa-3x"></i>

                        </div><!-- col-xs-3 finish -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                            <div class="huge"> <?php echo $count_products; ?> </div>

                            <div> Products </div>

                        </div><!-- col-xs-9 text-right finish -->

                    </div><!-- panel-heading row finish -->
                </div><!-- panel-heading finish -->

                <a href="index.php?view_products"><!-- a href begin -->
                    <div class="panel-footer" style="color: #4D80E4;"><!-- panel-footer begin -->

                        <span class="pull-left"><!-- pull-left begin -->
                            View Details
                        </span><!-- pull-left finish -->

                        <span class="pull-right"><!-- pull-right begin -->
                            <i class="fa fa-arrow-circle-right"></i>
                        </span><!-- pull-right finish -->

                        <div class="clearfix"></div>

                    </div><!-- panel-footer finish -->
                </a><!-- a href finish -->

            </div><!-- panel panel-primary finish -->
        </div><!-- col-lg-3 col-md-6 finish -->

        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
            <div class="panel" style="color: #75CAC3; border: 1px solid #75CAC3;"><!-- panel panel-green begin -->

                <div class="panel-heading"><!-- panel-heading begin -->
                    <div class="row"><!-- panel-heading row begin -->
                        <div class="col-xs-3"><!-- col-xs-3 begin -->

                            <i class="fa fa-users fa-3x"></i>

                        </div><!-- col-xs-3 finish -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                            <div class="huge"> <?php echo $count_customers; ?> </div>

                            <div> Customers </div>

                        </div><!-- col-xs-9 text-right finish -->

                    </div><!-- panel-heading row finish -->
                </div><!-- panel-heading finish -->

                <a href="index.php?view_customers"><!-- a href begin -->
                    <div class="panel-footer" style="color: #75CAC3;"><!-- panel-footer begin -->

                        <span class="pull-left"><!-- pull-left begin -->
                            View Details
                        </span><!-- pull-left finish -->

                        <span class="pull-right"><!-- pull-right begin -->
                            <i class="fa fa-arrow-circle-right"></i>
                        </span><!-- pull-right finish -->

                        <div class="clearfix"></div>

                    </div><!-- panel-footer finish -->
                </a><!-- a href finish -->

            </div><!-- panel panel-green finish -->
        </div><!-- col-lg-3 col-md-6 finish -->

        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
            <div class="panel" style="color: #FF895D; border: 1px solid #FF895D;"><!-- panel panel-yellow begin -->

                <div class="panel-heading"><!-- panel-heading begin -->
                    <div class="row"><!-- panel-heading row begin -->
                        <div class="col-xs-3"><!-- col-xs-3 begin -->

                            <i class="fa fa-tags fa-3x"></i>

                        </div><!-- col-xs-3 finish -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                            <div class="huge"> <?php echo $count_p_categories; ?> </div>

                            <div> Product Categories </div>

                        </div><!-- col-xs-9 text-right finish -->

                    </div><!-- panel-heading row finish -->
                </div><!-- panel-heading finish -->

                <a href="index.php?view_p_cats"><!-- a href begin -->
                    <div class="panel-footer" style="color: #FF895D;"><!-- panel-footer begin -->

                        <span class="pull-left"><!-- pull-left begin -->
                            View Details
                        </span><!-- pull-left finish -->

                        <span class="pull-right"><!-- pull-right begin -->
                            <i class="fa fa-arrow-circle-right"></i>
                        </span><!-- pull-right finish -->

                        <div class="clearfix"></div>

                    </div><!-- panel-footer finish -->
                </a><!-- a href finish -->

            </div><!-- panel panel-yellow finish -->
        </div><!-- col-lg-3 col-md-6 finish -->

        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
            <div class="panel" style="color: #D988B9; border: 1px solid #D988B9;"><!-- panel panel-red begin -->

                <div class="panel-heading"><!-- panel-heading begin -->
                    <div class="row"><!-- panel-heading row begin -->
                        <div class="col-xs-3"><!-- col-xs-3 begin -->

                            <i class="fa fa-shopping-cart fa-3x"></i>

                        </div><!-- col-xs-3 finish -->

                        <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                            <div class="huge"> <?php echo $count_orders; ?> </div>

                            <div> Orders </div>

                        </div><!-- col-xs-9 text-right finish -->

                    </div><!-- panel-heading row finish -->
                </div><!-- panel-heading finish -->

                <a href="index.php?view_orders"><!-- a href begin -->
                    <div class="panel-footer" style="color: #D988B9;"><!-- panel-footer begin -->

                        <span class="pull-left"><!-- pull-left begin -->
                            View Details
                        </span><!-- pull-left finish -->

                        <span class="pull-right"><!-- pull-right begin -->
                            <i class="fa fa-arrow-circle-right"></i>
                        </span><!-- pull-right finish -->

                        <div class="clearfix"></div>

                    </div><!-- panel-footer finish -->
                </a><!-- a href finish -->

            </div><!-- panel panel-red finish -->
        </div><!-- col-lg-3 col-md-6 finish -->

    </div><!-- row no: 2 finish -->

    <div class="row"><!-- row no: 3 begin -->

        <div class="col-lg-8"><!-- col-lg-8 begin -->

            <div class="panel panel-primary">
                <div id="chartItemQuantitySold" style="height: 370px; width: 100%;"></div>
            </div>

            <div class="panel panel-primary">
                <div id="chartRevenueforLast3months" style="height: 370px; width: 100%;"></div>
            </div>

            <div class="panel panel-primary"><!-- panel panel-primary begin -->
                <div class="panel-heading"><!-- panel-heading begin -->
                    <h3 class="panel-title"><!-- panel-title begin -->

                        <i class="fa fa-money fa-fw"></i> New Orders

                    </h3><!-- panel-title finish -->
                </div><!-- panel-heading finish -->

                <div class="panel-body"><!-- panel-body begin -->
                    <div class="table-responsive"><!-- table-responsive begin -->
                        <table class="table table-hover table-striped table-bordered"><!-- table table-hover table-striped table-bordered begin -->

                            <thead><!-- thead begin -->

                                <tr><!-- th begin -->

                                    <th> Order ID: </th>
                                    <th> Customer Email: </th>
                                    <th> Total: </th>
                                    <th> Status: </th>

                                </tr><!-- th finish -->

                            </thead><!-- thead finish -->

                            <tbody><!-- tbody begin -->

                                <?php

                                $i = 0;

                                $get_order = "select * from orders where STATUS like '%xử%' or STATUS like '%toán%' or STATUS like '%Xác%'";

                                $run_order = mysqli_query($con, $get_order);

                                while ($row_order = mysqli_fetch_array($run_order)) {

                                    $order_id = $row_order['ORDER_ID'];

                                    $c_id = $row_order['CUSTOMER_ID'];
                                    $order_total = $row_order['total'];

                                    $order_status = $row_order['STATUS'];

                                    $i++;

                                ?>

                                    <tr><!-- tr begin -->

                                        <td>
                                            <a href="index.php?view_order_details=<?php echo $order_id; ?>">
                                                <?php echo $order_id; ?></a>
                                        </td>
                                        <td>

                                            <?php

                                            $get_customer = "select * from customers where CUSTOMER_ID='$c_id'";

                                            $run_customer = mysqli_query($con, $get_customer);

                                            $row_customer = mysqli_fetch_array($run_customer);

                                            $customer_email = $row_customer['EMAIL'];

                                            echo $customer_email;

                                            ?>

                                        </td>

                                        <td> <?php echo $order_total; ?> </td>
                                        <td> <?php echo $order_status; ?> </td>


                                    </tr><!-- tr finish -->

                                <?php } ?>

                            </tbody><!-- tbody finish -->

                        </table><!-- table table-hover table-striped table-bordered finish -->
                    </div><!-- table-responsive finish -->

                    <div class="text-right"><!-- text-right begin -->

                        <a href="index.php?view_orders"><!-- a href begin -->

                            View All Orders <i class="fa fa-arrow-circle-right"></i>

                        </a><!-- a href finish -->

                    </div><!-- text-right finish -->

                </div><!-- panel-body finish -->

            </div><!-- panel panel-primary finish -->
            <a href="print_report.php" class="btn btn-primary" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> Print Report</a>


        </div><!-- col-lg-8 finish -->

        <div class="col-md-4"><!-- col-md-4 begin -->
            <div class="panel"><!-- panel begin -->
                <div class="panel-body"><!-- panel-body begin -->
                    <div class="mb-md thumb-info"><!-- mb-md thumb-info begin -->

                        <img src="admin_images/<?php echo $admin_image; ?>" alt="<?php echo $admin_image; ?>" class="rounded img-responsive">

                        <div class="thumb-info-title"><!-- thumb-info-title begin -->

                            <span class="thumb-info-inner"> <?php echo $admin_name; ?> </span>
                            <span class="thumb-info-type"> <?php echo $admin_job; ?> </span>

                        </div><!-- thumb-info-title finish -->

                    </div><!-- mb-md thumb-info finish -->

                    <div class="mb-md"><!-- mb-md begin -->
                        <div class="widget-content-expanded"><!-- widget-content-expanded begin -->
                            <i class="fa fa-user"></i> <span> Email: </span> <?php echo $admin_email; ?> <br />
                            <i class="fa fa-flag"></i> <span> Country: </span> <?php echo $admin_country; ?> <br />
                            <i class="fa fa-envelope"></i> <span> Contact: </span> <?php echo $admin_contact; ?> <br />
                        </div><!-- widget-content-expanded finish -->

                        <hr class="dotted short">

                        <h5 class="text-muted"> About Me </h5>

                        <p><!-- p begin -->

                            <?php echo $admin_about; ?>

                        </p><!-- p finish -->

                    </div><!-- mb-md finish -->

                </div><!-- panel-body finish -->

            </div><!-- panel finish -->
            <a href="backupDB.php" class="btn btn-primary" style="margin-bottom:20px;">Backup Database <i class="fa fa-download" aria-hidden="true"></i></a>
        </div><!-- col-md-4 finish -->

    </div><!-- row no: 3 finish -->


<?php } ?>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<?php

$select_num_prod_sale = 'select c.CATEGORY, sum(odt.QUANTITY) from clothes_products p JOIN clothes_categories c ON p.CLOTHES_CATEGORY_ID=c.CLOTHES_CATEGORY_ID JOIN order_details odt on p.PRODUCT_ID=odt.PRODUCT_ID JOIN orders o on odt.ORDER_ID=o.ORDER_ID where CREATED_ON > now() - INTERVAL 3 month GROUP BY c.CLOTHES_CATEGORY_ID;';
$run_num_prod_sale = mysqli_query($con, $select_num_prod_sale);
$dataPoints_1 = [];
$i = 0;
while ($row_num_prod_sale = mysqli_fetch_array($run_num_prod_sale)) {

    $data_1 = array("y" => $row_num_prod_sale['sum(odt.QUANTITY)'], "label" => $row_num_prod_sale['CATEGORY']);
    $dataPoints_1[$i] = $data_1;
    $i++;
}


$date = getdate();

$select_revenue_3m = 'select month(CREATED_ON),sum(total) from orders where CREATED_ON > now() - INTERVAL 3 month group by month(CREATED_ON) order by month(CREATED_ON);';
$run_revenue_3m = mysqli_query($con, $select_revenue_3m);
$dataPoints_2 = [];
$i = 0;

while ($row_revenue_3m = mysqli_fetch_array($run_revenue_3m)) {
    $y = '';
    $y = $row_revenue_3m['month(CREATED_ON)'] . "/" . $date['year'];
    $data_2 = array("y" => $row_revenue_3m['sum(total)'], "label" => $y);
    $dataPoints_2[$i] = $data_2;
    $i++;
}


?>
<script>
    window.onload = function() {

        var chart_1 = new CanvasJS.Chart("chartItemQuantitySold", {
            animationEnabled: true,
            theme: "light1",
            title: {
                text: "Item Quantity Sold"
            },
            axisY: {
                title: "Quantity"
            },
            data: [{
                type: "column",
                yValueFormatString: "#,##0.## products",
                dataPoints: <?php echo json_encode($dataPoints_1, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart_1.render();


        var chart_2 = new CanvasJS.Chart("chartRevenueforLast3months", {

            title: {
                text: "Revenue for Last 3 months"
            },
            axisY: {
                title: "Total Amount"
            },
            data: [{
                type: "line",
                dataPoints: <?php echo json_encode($dataPoints_2, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart_2.render();

    }
</script>