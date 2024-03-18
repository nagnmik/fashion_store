<?php

if (!isset($_SESSION['ADMIN_NAME'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

<?php

    if (isset($_GET['delete_product'])) {

        $delete_id = $_GET['delete_product'];

        $delete_pro = "delete from clothes_products where PRODUCT_ID='$delete_id'";

        $run_delete = mysqli_query($con, $delete_pro);

        if ($run_delete) {

            echo "<script>alert('One of your product has been Deleted')</script>";

            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
    }

?>

<?php } ?>