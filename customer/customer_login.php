<div class="box"><!-- box Begin -->

    <div class="box-header"><!-- box-header Begin -->

        <center><!-- center Begin -->

            <h1> Login </h1>

            <p class="lead"> Already have our account..? </p>

        </center><!-- center Finish -->

    </div><!-- box-header Finish -->

    <form method="post" action="checkout.php"><!-- form Begin -->

        <div class="form-group"><!-- form-group Begin -->

            <label> Email </label>

            <input name="c_email" type="text" class="form-control" required>

        </div><!-- form-group Finish -->

        <div class="form-group"><!-- form-group Begin -->

            <label> Password </label>

            <input name="c_pass" type="password" class="form-control" required>

        </div><!-- form-group Finish -->

        <div class="text-center"><!-- text-center Begin -->

            <button name="login" value="Login" class="btn btn-primary">

                <i class="fa fa-sign-in"></i> Login

            </button>

        </div><!-- text-center Finish -->

    </form><!-- form Finish -->

    <center><!-- center Begin -->
        <h3> Don't have account..? <a href="customer_register.php">Register here</a> </h3>
    </center><!-- center Finish -->

</div><!-- box Finish -->


<?php

if (isset($_POST['login'])) {

    $customer_email = $_POST['c_email'];

    $customer_pass = $_POST['c_pass'];

    $select_customer = "select * from customers where EMAIL='$customer_email' AND PASS='$customer_pass'";

    $run_customer = mysqli_query($con, $select_customer);

    $row_customers = mysqli_fetch_array($run_customer);

    $customer_id = $row_customers['CUSTOMER_ID'];
    $customer_name = $row_customers['NAME'];

    $check_customer = mysqli_num_rows($run_customer);

    $select_cart = "select * from cart where CUSTOMER_ID='$customer_id'";

    $run_cart = mysqli_query($con, $select_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if ($check_customer == 0) {

        echo "<script>alert('Your email or password is wrong')</script>";

        exit();
    }

    if ($check_customer == 1 and $check_cart == 0) {

        $_SESSION['CUSTOMER_NAME'] = $customer_name;
        $_SESSION['CUSTOMER_ID'] = $customer_id;

        echo "<script>alert('You are Logged in')</script>";

        echo "<script>window.open('shop.php','_self')</script>";
    } else {

        $_SESSION['CUSTOMER_NAME'] = $customer_name;
        $_SESSION['CUSTOMER_ID'] = $customer_id;

        echo "<script>alert('You are Logged in')</script>";

        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
    }
}

?>