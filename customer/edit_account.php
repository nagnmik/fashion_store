<?php

$customer_session = $_SESSION['CUSTOMER_ID'];

$get_customer = "select * from customers where CUSTOMER_ID='$customer_session'";

$run_customer = mysqli_query($con, $get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['CUSTOMER_ID'];

$customer_name = $row_customer['NAME'];

$customer_email = $row_customer['EMAIL'];

$customer_country = $row_customer['COUNTRY'];

$customer_city = $row_customer['CITY'];

$customer_contact = $row_customer['PHONE'];

$customer_address = $row_customer['ADDRESS'];

$customer_image = $row_customer['IMAGE'];

?>

<h1 align="center"> Edit Your Account </h1>

<form action="" method="post" enctype="multipart/form-data"><!-- form Begin -->

    <div class="form-group"><!-- form-group Begin -->

        <label> Costumer Name: </label>

        <input type="text" name="c_name" class="form-control" value="<?php echo $customer_name; ?>" required>

    </div><!-- form-group Finish -->

    <div class="form-group"><!-- form-group Begin -->

        <label> Costumer Email: </label>

        <input type="text" name="c_email" class="form-control" value="<?php echo $customer_email; ?>" required>

    </div><!-- form-group Finish -->

    <div class="form-group"><!-- form-group Begin -->

        <label> Costumer Country: </label>

        <input type="text" name="c_country" class="form-control" value="<?php echo $customer_country; ?>" required>

    </div><!-- form-group Finish -->

    <div class="form-group"><!-- form-group Begin -->

        <label> Costumer City: </label>

        <input type="text" name="c_city" class="form-control" value="<?php echo $customer_city; ?>" required>

    </div><!-- form-group Finish -->

    <div class="form-group"><!-- form-group Begin -->

        <label> Costumer Contact: </label>

        <input type="text" name="c_contact" class="form-control" value="<?php echo $customer_contact; ?>" required>

    </div><!-- form-group Finish -->

    <div class="form-group"><!-- form-group Begin -->

        <label> Costumer Address: </label>

        <input type="text" name="c_address" class="form-control" value="<?php echo $customer_address; ?>" required>

    </div><!-- form-group Finish -->

    <div class="form-group"><!-- form-group Begin -->

        <label> Costumer Image: </label>

        <input type="file" name="c_image" class="form-control form-height-custom">

        <img class="img-responsive" src="customer_images/<?php echo $customer_image; ?>" alt="Costumer Image">

    </div><!-- form-group Finish -->

    <div class="text-center"><!-- text-center Begin -->

        <button name="update" class="btn btn-primary"><!-- btn btn-primary Begin -->

            <i class="fa fa-user-md"></i> Update Now

        </button><!-- btn btn-primary inish -->

    </div><!-- text-center Finish -->

</form><!-- form Finish -->

<?php

if (isset($_POST['update'])) {

    $update_id = $customer_id;

    $c_name = $_POST['c_name'];

    $c_email = $_POST['c_email'];

    $c_country = $_POST['c_country'];

    $c_city = $_POST['c_city'];

    $c_address = $_POST['c_address'];

    $c_contact = $_POST['c_contact'];

    $c_image = $_FILES['c_image']['name'];

    $c_image_tmp = $_FILES['c_image']['tmp_name'];

    move_uploaded_file($c_image_tmp, "customer_images/$c_image");

    $update_customer = "update customers set NAME='$c_name',EMAIL='$c_email',COUNTRY='$c_country',CITY='$c_city',ADDRESS='$c_address',PHONE='$c_contact',IMAGE='$c_image' where CUSTOMER_ID='$update_id' ";

    $run_customer = mysqli_query($con, $update_customer);

    if ($run_customer) {

        echo "<script>alert('Your account has been edited, to complete the process, please Relogin')</script>";

        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    }
}

?>