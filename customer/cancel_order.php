<?php

if (!isset($_SESSION['CUSTOMER_NAME'])) {

    echo "<script>window.open('customer_login.php','_self')</script>";
} else {

?>

<?php

    if (isset($_GET['cancel_order'])) {

        $delete_id = $_GET['cancel_order'];

        $delete_audit = "delete from audit where ORDER_ID='$delete_id'";

        $run_delete_audit = mysqli_query($con, $delete_audit);

        $delete_transactions = "delete from transactions where ORDER_ID='$delete_id'";

        $run_delete_transactions = mysqli_query($con, $delete_transactions);

        $delete_order_details = "delete from order_details where ORDER_ID='$delete_id'";

        $run_delete_order_details = mysqli_query($con, $delete_order_details);

        $delete_order = "delete from orders where ORDER_ID='$delete_id'";

        $run_delete_order = mysqli_query($con, $delete_order);

        if ($run_delete_order) {

            echo "<script>alert('Order has been canceled')</script>";

            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
        }
    }

?>

<?php } ?>