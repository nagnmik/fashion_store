
<?php

include("includes/db.php");

?>
<?php

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
}
$get_orders = "select * from orders  where ORDER_ID='$order_id'";
$run_orders = mysqli_query($con, $get_orders);
$row_order = mysqli_fetch_array($run_orders);
$payment_method = $row_order['PAYMENT_METHOD'];
$ship_date = $row_order['SHIPPING_ON'];
$order_status = $row_order['STATUS'];
$total = $row_order['total'];
$customer_pay = $total;
$invoice_num = '';
if (strcmp($order_status, 'Đã thanh toán') == 0) {
    $customer_pay = 0;
}

$order_created_on = $row_order['CREATED_ON'];


$shipping_id = $row_order['SHIPPING_ID'];
$select_ship = "select * from shipping where SHIPPING_ID = '$shipping_id'";
$run_ship = mysqli_query($con, $select_ship);
$row_ship = mysqli_fetch_array($run_ship);
$shipping_cost = $row_ship['shipping_cost'];


$customer_id = $row_order['CUSTOMER_ID'];
$select_customer = "select * from customers where CUSTOMER_ID='$customer_id'";
$run_customer = mysqli_query($con, $select_customer);
$row_customer = mysqli_fetch_array($run_customer);
$name_customer = $row_customer['NAME'];
$phone_customer = $row_customer['PHONE'];
$address_customer = $row_customer['ADDRESS'];
$city_customer = $row_customer['CITY'];
$country_customer = $row_customer['COUNTRY'];


require_once('TCPDF/tcpdf.php');

// extend TCPF with custom functions
class MYPDF extends TCPDF
{
}



// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Jemcloset Store');
$pdf->SetTitle('INVOICE');
$pdf->SetSubject('Jemcloset');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'JEMCLOSET STORE', "Order ID: " . "$order_id");

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
$fontname1 = TCPDF_FONTS::addTTFfont('./TCPDF/fonts/tnr/times.ttf', 'TrueTypeUnicode', '', 32);
$fontname2 = TCPDF_FONTS::addTTFfont('./TCPDF/fonts/tnr/timesbd.ttf', 'TrueTypeUnicode', '', 32);
$fontname3 = TCPDF_FONTS::addTTFfont('./TCPDF/fonts/tnr/timesbi.ttf', 'TrueTypeUnicode', '', 32);
$fontname4 = TCPDF_FONTS::addTTFfont('./TCPDF/fonts/tnr/timesi.ttf', 'TrueTypeUnicode', '', 32);



// add a page
$pdf->AddPage();

// set font
$pdf->SetFont('times', 'B', 20);

$pdf->Cell(71, 10, '', 0, 0);
$pdf->Cell(50, 10, 'HÓA ĐƠN', 0, 0, 'C');
$pdf->Cell(59, 15, '', 0, 1);

$pdf->SetFont('times', 'BI', 13);
$pdf->Cell(15, 10, 'Từ:', 0, 0, 'L');
$pdf->Cell(180, 10, 'Đến:', 0, 1, 'C');

$pdf->SetFont('times', '', 13);
$pdf->Cell(15, 10, 'Jemcloset Store', 0, 0, 'L');
$pdf->Cell(209, 10, "$name_customer", 0, 1, 'C');
$pdf->Cell(15, 10, 'Số 329 Huỳnh Văn Bánh, Phường 11,', 0, 0, 'L');
$pdf->Cell(209, 10, "$address_customer,", 0, 1, 'C');
$pdf->Cell(15, 10, 'Quận Phú Nhuận, TPHCM', 0, 0, 'L');
$pdf->Cell(206, 10, " $city_customer" . ", " . "$country_customer", 0, 1, 'C');
$pdf->Cell(15, 10, 'SĐT: 0961794840', 0, 0, 'L');
$pdf->Cell(202, 10, "SĐT: " . "$phone_customer", 0, 1, 'C');
$pdf->Cell(59, 5, '', 0, 1);
$pdf->Cell(1, 5, '---------------------------------------------------------------------------------------------------------------------', 0, 1);


$i = 0;
$get_order_details = "select * from order_details where ORDER_ID= '$order_id' order by 1 DESC LIMIT 0,5";
$run_order_details = mysqli_query($con, $get_order_details);
$count_order_details = mysqli_num_rows($run_order_details);

$pdf->SetFont('times', 'BI', 13);
$pdf->Cell(15, 10, "Nội dung hàng ( Tổng SL sản phẩm: " . "$count_order_details )", 0, 1, 'L');


$pdf->SetFont('times', '', 13);
$subtotal = 0;
while ($row_order_details = mysqli_fetch_array($run_order_details)) {
    $product_id = $row_order_details['PRODUCT_ID'];
    $qty = $row_order_details['QUANTITY'];
    $size = $row_order_details['SIZE'];
    $price = $row_order_details['price'];
    $subtotal += $qty * $price;
    $i++;

    $get_name_product = "select * from clothes_products where PRODUCT_ID= '$product_id' order by 1 DESC LIMIT 0,5";
    $run_name_product = mysqli_query($con, $get_name_product);
    $row_name_product = mysqli_fetch_array($run_name_product);
    $name_product = $row_name_product['NAME'];

    $pdf->Cell(15, 10, "$i. " . "$name_product", 0, 1, 'L');
    $pdf->Write(5, "Phân loại hàng: " . "$size, ");
    $pdf->Write(5, "SL: " . "$qty");
    $pdf->Cell(15, 10, "", 0, 1, 'L');
}


$pdf->Cell(59, 5, '', 0, 1);
$pdf->Cell(1, 5, '---------------------------------------------------------------------------------------------------------------------', 0, 1);
$pdf->Cell(15, 10, "Ngày đặt hàng: " . "$order_created_on", 0, 1, 'L');
$pdf->Cell(15, 10, "Ngày dự kiến giao: " . "$ship_date", 0, 1, 'L');
$pdf->Cell(59, 5, '', 0, 1);
$pdf->Cell(1, 5, '---------------------------------------------------------------------------------------------------------------------', 0, 1);
$pdf->Cell(15, 10, "Tổng tiền hàng: " . "$subtotal", 0, 1, 'L');
$pdf->Cell(15, 10, "Phí vận chuyển: " . "$shipping_cost", 0, 1, 'L');
$pdf->Cell(15, 10, "Thành tiền: " . "$total", 0, 1, 'L');
$pdf->Cell(15, 10, "Hình thức thanh toán: " . "$payment_method", 0, 1, 'L');

$pdf->SetFont('times', 'B', 14);
$pdf->Cell(15, 10, "Tiền thu người nhận: ", 0, 1, 'L');
$pdf->Cell(15, 5, '', 0, 1, 'L');
$pdf->SetFont('times', 'B', 30);
$pdf->Cell(15, 10, "$customer_pay" . " VNĐ", 0, 1, 'L');










// ---------------------------------------------------------

// close and output PDF document
$pdf->Output("invoice" . "$order_id" . ".pdf", 'I');

//============================================================+
// END OF FILE
//============================================================+
