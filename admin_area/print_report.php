<?php

$report_num = mt_rand();

require_once('TCPDF/tcpdf.php');

// extend TCPF with custom functions
class MYPDF extends TCPDF
{
    // Load table data from file
    public function LoadData($select)
    {
        include("includes/db.php");
        $query = mysqli_query($con, $select);
        return $query;
    }
    // Colored table
    public function ColoredTable_prod_sale($header, $data)
    {
        // Colors, line width and bold font
        $this->SetFillColor(76, 141, 248);
        $this->SetTextColor(27, 53, 95);
        $this->SetDrawColor(48, 76, 120);
        $this->SetLineWidth(0.3);
        $this->SetFont('times', 'B', '13');
        // Header
        $w = array(10, 85, 85);
        $num_headers = count($header);
        for ($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 10, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('times', '', 13);
        // Data
        $fill = 0;
        $j = 1;
        foreach ($data as $row) {
            $this->Cell($w[0], 8, $j, 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 8, $row['CATEGORY'], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 8, $row['sum(odt.QUANTITY)'], 'LR', 0, 'R', $fill);
            $this->Ln();
            $j++;
            $fill = !$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
    public function ColoredTable_revenue_3m($header, $data)
    {
        // Colors, line width and bold font
        $this->SetFillColor(76, 141, 248);
        $this->SetTextColor(27, 53, 95);
        $this->SetDrawColor(48, 76, 120);
        $this->SetLineWidth(0.3);
        $this->SetFont('times', 'B', '13');
        // Header
        $w = array(90, 90);
        $num_headers = count($header);
        for ($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 10, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('times', '', 13);
        // Data
        $fill = 0;
        $date = getdate();
        $revenue = 0;
        foreach ($data as $row) {
            $this->Cell($w[0], 8, $row['month(CREATED_ON)'] . "/" . $date['year'], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 8, $row['sum(total)'], 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill = !$fill;
            $revenue += $row['sum(total)'];
        }
        $this->Cell(70, 8, '', 'T', 0, 0);
        $this->SetTextColor(27, 53, 95);
        $this->SetFont('times', 'BI', 13);
        $this->Cell(20, 8, 'Tổng doanh thu', 'TR', 0, 'R');
        $this->SetTextColor(76, 141, 248);
        $this->SetFont('times', 'B', 13);
        $this->Cell(90, 8, $revenue, 'TLRB', 1, 'R');
    }
}



// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Jemcloset Store');
$pdf->SetTitle('REPORT');
$pdf->SetSubject('Jemcloset');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'JEMCLOSET STORE', "Report: " . "$report_num");

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
$pdf->Cell(40, 10, 'BÁO CÁO DOANH THU THEO QUÝ', 0, 0, 'C');
$pdf->Cell(59, 15, '', 0, 1);

$pdf->SetFont('times', 'BI', 13);
$pdf->Cell(40, 10, 'Thống kê sản phẩm', 0, 1, 'L');
// column titles
$header_prod_sale = array('STT', 'Loại sản phẩm', 'Số lượng sản phẩm bán được');

// data loading
$select_num_prod_sale = 'select c.CATEGORY, sum(odt.QUANTITY) from clothes_products p JOIN clothes_categories c ON p.CLOTHES_CATEGORY_ID=c.CLOTHES_CATEGORY_ID JOIN order_details odt on p.PRODUCT_ID=odt.PRODUCT_ID JOIN orders o on odt.ORDER_ID=o.ORDER_ID where CREATED_ON > now() - INTERVAL 3 month GROUP BY c.CLOTHES_CATEGORY_ID ORDER BY sum(odt.QUANTITY) DESC;';
$data_prod_sale = $pdf->LoadData($select_num_prod_sale);

// print colored table

$pdf->ColoredTable_prod_sale($header_prod_sale, $data_prod_sale);
$pdf->Cell(40, 10, '', 0, 1, 'L');

$pdf->SetFont('times', 'BI', 13);
$pdf->Cell(40, 10, 'Thống kê doanh thu bán hàng', 0, 1, 'L');

$header_revenue_3m = array('Tháng', 'Doanh thu');
$select_revenue_3m = 'select month(CREATED_ON),sum(total) from orders where CREATED_ON > now() - INTERVAL 3 month group by month(CREATED_ON) ORDER BY month(CREATED_ON);';
$data_revenue_3m = $pdf->LoadData($select_revenue_3m);

// print colored table

$pdf->ColoredTable_revenue_3m($header_revenue_3m, $data_revenue_3m);
$pdf->Cell(40, 10, '', 0, 1, 'L');

date_default_timezone_set("Asia/Ho_Chi_Minh");
$created_on = date('Y-m-d H:i:s');
$pdf->SetTextColor(172, 173, 175);
$pdf->SetFont('times', 'I', 13);
$pdf->Cell(40, 10, "Ngày tạo báo cáo: " . "$created_on", 0, 1, 'L');

$pdf->SetTextColor(0);
$pdf->SetFont('times', '', 13);
$pdf->Cell(280, 10, ".........., ngày... tháng ..., năm .....", 0, 1, 'C');
$pdf->SetFont('times', 'BI', 13);
$pdf->Cell(280, 10, "Người làm báo cáo", 0, 1, 'C');
$pdf->SetFont('times', 'I', 13);
$pdf->Cell(280, 10, "(Ký và ghi rõ họ tên)", 0, 1, 'C');












// ---------------------------------------------------------

// close and output PDF document
$pdf->Output("report" . "$report_num" . ".pdf", 'I');

//============================================================+
// END OF FILE
//============================================================+
