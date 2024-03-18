<center><!--  center Begin  -->

    <h1> My Orders </h1>

    <p class="lead"> Your orders on one place</p>

    <p class="text-muted">

        If you have any questions, feel free to <a href="../contact.php">Contact Us</a>. Our Customer Service work <strong>24/7</strong>

    </p>

</center><!--  center Finish  -->


<hr>


<div class="table-responsive"><!--  table-responsive Begin  -->

    <table class="table table-bordered table-hover"><!--  table table-bordered table-hover Begin  -->

        <thead><!--  thead Begin  -->

            <tr><!--  tr Begin  -->

                <th> ON: </th>
                <th> Order id: </th>
                <th> Due Amount: </th>
                <th> Order Date:</th>
                <th> Paid / Unpaid: </th>

            </tr><!--  tr Finish  -->

        </thead><!--  thead Finish  -->

        <tbody><!--  tbody Begin  -->

            <?php


            $customer_id = '';

            if (isset($_SESSION['CUSTOMER_ID'])) {
                $customer_id = $_SESSION['CUSTOMER_ID'];
            }

            $get_orders = "select * from orders where CUSTOMER_ID='$customer_id'";

            $run_orders = mysqli_query($con, $get_orders);

            $i = 0;

            while ($row_orders = mysqli_fetch_array($run_orders)) {

                $order_id = $row_orders['ORDER_ID'];

                $due_amount = $row_orders['total'];

                $payment_method = $row_orders['PAYMENT_METHOD'];

                $order_date = substr($row_orders['CREATED_ON'], 0, 11);

                $order_status = $row_orders['STATUS'];

                $i++;

            ?>

                <tr><!--  tr Begin  -->

                    <th> <?php echo $i; ?> </th>
                    <th><a href="my_account.php?view_order_details=<?php echo $order_id; ?>">
                            <?php echo $order_id; ?></a> </th>
                    <td> $<?php echo $due_amount; ?> </td>
                    <td> <?php echo $order_date; ?> </td>
                    <td> <?php echo $order_status; ?> </td>

                    <td>

                        <?php
                        if (strcmp($payment_method, 'Thanh toán khi nhận hàng') == 0) {
                            echo "
                            <a href='confirm.php?order_id=$order_id' target='_blank' class='btn btn-primary btn-sm' disabled> Thanh toán </a>
                            ";
                        } else {
                            echo "
                            <a href='confirm.php?order_id=$order_id' target='_blank' class='btn btn-primary btn-sm'> Thanh toán </a>
                            ";
                        }
                        ?>

                    </td>

                </tr><!--  tr Finish  -->

            <?php } ?>

        </tbody><!--  tbody Finish  -->

    </table><!--  table table-bordered table-hover Finish  -->

</div><!--  table-responsive Finish  -->