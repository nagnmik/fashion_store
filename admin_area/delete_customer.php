<?php

if (!isset($_SESSION['ADMIN_NAME'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

<?php

    if (isset($_GET['delete_customer'])) {

        $delete_id = $_GET['delete_customer'];

        $delete_c = "delete from customers where CUSTOMER_ID='$delete_id'";

        $run_delete = mysqli_query($con, $delete_c);

        if ($run_delete) {

            echo "<script>alert('One of your costumer has been Deleted')</script>";

            echo "<script>window.open('index.php?view_customers','_self')</script>";
        }
    }

?>

<?php } ?>