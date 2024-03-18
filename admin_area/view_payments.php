<?php

if (!isset($_SESSION['ADMIN_NAME'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <div class="row"><!-- row 1 begin -->
        <div class="col-lg-12"><!-- col-lg-12 begin -->
            <ol class="breadcrumb"><!-- breadcrumb begin -->
                <li class="active"><!-- active begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / View Payments

                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 1 finish -->

    <div class="row"><!-- row 2 begin -->
        <div class="col-lg-12"><!-- col-lg-12 begin -->
            <div class="panel panel-default"><!-- panel panel-default begin -->
                <div class="panel-heading"><!-- panel-heading begin -->
                    <h3 class="panel-title"><!-- panel-title begin -->

                        <i class="fa fa-tags"></i> View Payments

                    </h3><!-- panel-title finish -->
                </div><!-- panel-heading finish -->

                <div class="panel-body"><!-- panel-body begin -->
                    <div class="table-responsive"><!-- table-responsive begin -->
                        <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->

                            <thead><!-- thead begin -->
                                <tr><!-- tr begin -->
                                    <th> No: </th>
                                    <th> Invoice No: </th>
                                    <th> Order ID: </th>
                                    <th> Amount Paid: </th>
                                    <th> Card Num: </th>
                                    <th> Exp Date: </th>
                                    <th> Method: </th>
                                    <th> Type: </th>
                                    <th> Payment Date: </th>
                                    <th> Delete Payment: </th>
                                </tr><!-- tr finish -->
                            </thead><!-- thead finish -->

                            <tbody><!-- tbody begin -->

                                <?php

                                $i = 0;

                                $get_payments = "select * from transactions";

                                $run_payments = mysqli_query($con, $get_payments);

                                while ($row_payments = mysqli_fetch_array($run_payments)) {

                                    $order_id = $row_payments['ORDER_ID'];

                                    $invoice_no = $row_payments['INVOICE_NUM'];

                                    $amount = $row_payments['amount'];

                                    $card_num = $row_payments['CARD_NUM'];

                                    $exp_date = $row_payments['EXP_DATE'];

                                    $method = $row_payments['METHOD'];
                                    $type = $row_payments['TYPE'];

                                    $payment_date = $row_payments['PAYMENT_DATE'];

                                    $i++;

                                ?>

                                    <tr><!-- tr begin -->
                                        <td> <?php echo $i; ?> </td>
                                        <td> <?php echo $invoice_no; ?> </td>
                                        <td> <?php echo $order_id; ?> </td>
                                        <td> <?php echo $amount; ?></td>
                                        <td> <?php echo $card_num; ?> </td>
                                        <td> <?php echo $exp_date; ?> </td>
                                        <td> <?php echo $method; ?></td>
                                        <td> <?php echo $type; ?> </td>
                                        <td> <?php echo $payment_date; ?> </td>
                                        <td>

                                            <a href="index.php?delete_payment=<?php echo $invoice_no; ?>">

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