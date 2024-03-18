<?php

include("includes/db.php");
include("functions/functions.php");

?>
<?php

if (isset($_GET['c_id'])) {

    $customer_id = $_GET['c_id'];
}
$ship_cost = 30000;
$shipping_id = 2;
$select_city = "select * from customers where CUSTOMER_ID='$customer_id'";
$run_city = mysqli_query($con, $select_city);
$row_city = mysqli_fetch_array($run_city);
$customer_city = $row_city['CITY'];

$select_ship = "select * from shipping where shipping_region = 3";
$run_ship = mysqli_query($con, $select_ship);
$row_ship = mysqli_fetch_array($run_ship);

if (strcmp($customer_city, 'Tp HCM') == 0) {
    $ship_cost = $row_ship['shipping_cost'];
    $shipping_id = $row_ship['SHIPPING_ID'];
}


date_default_timezone_set("Asia/Ho_Chi_Minh");
$next_3day = time() + (3 * 24 * 60 * 60);
$shipping_on = date('Y-m-d H:i:s', $next_3day);


$total = 0;
$status = 'Đang chờ xử lý';
$o_id = mt_rand();

$insert_orders = "insert into orders (ORDER_ID,CUSTOMER_ID,SHIPPING_ID,total,PAYMENT_METHOD, SHIPPING_ADDRESS, NOTE, CREATED_ON,SHIPPING_ON,STATUS) values ('$o_id','$customer_id','$shipping_id','0','Thanh toán qua tài khoản ngân hàng','','',NOW(),'$shipping_on', '$status')";

$run_orders = mysqli_query($con, $insert_orders);

$select_cart = "select * from cart where CUSTOMER_ID='$customer_id'";

$run_cart = mysqli_query($con, $select_cart);

while ($row_cart = mysqli_fetch_array($run_cart)) {

    $pro_id = $row_cart['PRODUCT_ID'];

    $pro_qty = $row_cart['QUANTITY'];

    $pro_size = $row_cart['SIZE'];

    $get_products = "select * from clothes_products where PRODUCT_ID='$pro_id'";

    $run_products = mysqli_query($con, $get_products);

    while ($row_products = mysqli_fetch_array($run_products)) {
        $pro_price = $row_products['price'];
        $sub_total = $pro_price * $pro_qty;

        $insert_order_details = "insert into order_details (ORDER_ID,PRODUCT_ID,QUANTITY,price,SIZE) values ('$o_id','$pro_id','$pro_qty','$pro_price','$pro_size')";

        $run_order_details = mysqli_query($con, $insert_order_details);
        $total = $total + $sub_total;
    }
}
$total = $total + $ship_cost;
$insert_orders = "update orders set total='$total' where ORDER_ID= '$o_id'";

$run_orders = mysqli_query($con, $insert_orders);

$delete_cart = "delete from cart where CUSTOMER_ID='$customer_id'";

$run_delete = mysqli_query($con, $delete_cart);
echo "<script>alert('Your orders has been submitted, Thanks')</script>";

echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";


?>