<?php

if (!isset($_SESSION['ADMIN_NAME'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <div class="row"><!-- row 1 begin -->
        <div class="col-lg-12"><!-- col-lg-12 begin -->
            <ol class="breadcrumb"><!-- breadcrumb begin -->
                <li class="active"><!-- active begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / View Customers

                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 1 finish -->

    <div class="row"><!-- row 2 begin -->
        <div class="col-lg-12"><!-- col-lg-12 begin -->
            <div class="panel panel-default"><!-- panel panel-default begin -->
                <div class="panel-heading"><!-- panel-heading begin -->
                    <h3 class="panel-title"><!-- panel-title begin -->

                        <i class="fa fa-tags"></i> View Customers

                    </h3><!-- panel-title finish -->
                </div><!-- panel-heading finish -->

                <div class="panel-body"><!-- panel-body begin -->
                    <div class="table-responsive"><!-- table-responsive begin -->
                        <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->

                            <thead><!-- thead begin -->
                                <tr><!-- tr begin -->
                                    <th> No: </th>
                                    <th> Name: </th>
                                    <th> Image: </th>
                                    <th> E-Mail: </th>
                                    <th> Country: </th>
                                    <th> City: </th>
                                    <th> Address: </th>
                                    <th> Contact: </th>
                                    <th> Delete: </th>
                                </tr><!-- tr finish -->
                            </thead><!-- thead finish -->

                            <tbody><!-- tbody begin -->

                                <?php

                                $i = 0;

                                $get_c = "select * from customers";

                                $run_c = mysqli_query($con, $get_c);

                                while ($row_c = mysqli_fetch_array($run_c)) {

                                    $c_id = $row_c['CUSTOMER_ID'];

                                    $c_name = $row_c['NAME'];

                                    $c_img = $row_c['IMAGE'];

                                    $c_email = $row_c['EMAIL'];

                                    $c_country = $row_c['COUNTRY'];

                                    $c_city = $row_c['CITY'];

                                    $c_address = $row_c['ADDRESS'];

                                    $c_contact = $row_c['PHONE'];

                                    $i++;

                                ?>

                                    <tr><!-- tr begin -->
                                        <td> <?php echo $i; ?> </td>
                                        <td> <?php echo $c_name; ?> </td>
                                        <td> <img src="../customer/customer_images/<?php echo $c_img; ?>" width="60" height="60"></td>
                                        <td> <?php echo $c_email; ?> </td>
                                        <td> <?php echo $c_country; ?></td>
                                        <td> <?php echo $c_city; ?> </td>
                                        <td> <?php echo $c_address ?> </td>
                                        <td> <?php echo $c_contact ?> </td>
                                        <td>

                                            <a href="index.php?delete_customer=<?php echo $c_id; ?>">

                                                <i class="fa fa-trash-o"></i> Delete

                                            </a>

                                        </td>
                                    </tr><!-- tr finish -->

                                <?php } ?>

                            </tbody><!-- tbody finish -->

                        </table><!-- table table-striped table-bordered table-hover finish -->
                    </div><!-- table-responsive finish -->
                </div><!-- panel-body finish -->

            </div><!-- panel panel-default finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 2 finish -->

<?php } ?>