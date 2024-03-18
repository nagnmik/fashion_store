<?php

if (!isset($_SESSION['ADMIN_NAME'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

<?php

    if (isset($_GET['delete_brands'])) {

        $delete_brand_id = $_GET['delete_brands'];

        $delete_brand = "delete from brands where BRAND_ID='$delete_brand_id'";

        $run_delete = mysqli_query($con, $delete_brand);

        if ($run_delete) {

            echo "<script>alert('One of Your Brand Has Been Deleted')</script>";

            echo "<script>window.open('index.php?view_brands','_self')</script>";
        }
    }

?>




<?php } ?>