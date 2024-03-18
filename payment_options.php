<div class="box"><!-- box Begin -->

    <?php

    $customer_id = $_SESSION['CUSTOMER_ID'];

    ?>

    <h1 class="text-center">Payment Options For You</h1>

    <p class="lead text-center"><!-- lead text-center Begin -->

        <a href="./customer/pay_offline.php?c_id=<?php echo $customer_id ?>"> Offline Payment </a>

    </p><!-- lead text-center Finish -->

    <center><!-- center Begin -->

        <p class="lead"><!-- lead Begin -->

            <a href="orders.php?c_id=<?php echo $customer_id ?>">

                Credit Payment

                <img class="img-responsive" src="images/payment_method.jpg" alt="img-paypall" style="margin-top: 15px;">

            </a>

        </p> <!-- lead Finish -->

    </center><!-- center Finish -->

</div><!-- box Finish -->