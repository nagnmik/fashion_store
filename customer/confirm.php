<?php

session_start();

if (!isset($_SESSION['CUSTOMER_ID'])) {

    echo "<script>window.open('../checkout.php','_self')</script>";
} else {

    include("includes/db.php");
    include("functions/functions.php");

    if (isset($_GET['order_id'])) {

        $order_id = $_GET['order_id'];
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Jemcloset Store</title>
        <link rel="stylesheet" href="styles/bootstrap-337.min.css">
        <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles/style.css">
    </head>

    <body>

        <div id="top"><!-- Top Begin -->

            <div class="container"><!-- container Begin -->

                <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->

                    <a href="#" class="btn btn-success btn-sm btn-top">

                        <?php

                        if (!isset($_SESSION['CUSTOMER_NAME'])) {

                            echo "Welcome: Guest";
                        } else {

                            echo "Welcome: " . $_SESSION['CUSTOMER_NAME'] . "";
                        }

                        ?>

                    </a>
                    <a href="checkout.php"> <?php items(); ?> Items In Your Cart | Total Price: <?php total_price(); ?> </a>

                </div><!-- col-md-6 offer Finish -->

                <div class="col-md-6"><!-- col-md-6 Begin -->

                    <ul class="menu"><!-- cmenu Begin -->

                        <li>
                            <a href="../customer_register.php">Register</a>
                        </li>
                        <li>
                            <a href="my_account.php">My Account</a>
                        </li>
                        <li>
                            <a href="../cart.php">Go To Cart</a>
                        </li>
                        <li>
                            <a href="../checkout.php">

                                <?php

                                if (!isset($_SESSION['CUSTOMER_ID'])) {

                                    echo "<a href='checkout.php'> Login </a>";
                                } else {

                                    echo " <a href='logout.php'> Log Out </a> ";
                                }

                                ?>

                            </a>
                        </li>

                    </ul><!-- menu Finish -->

                </div><!-- col-md-6 Finish -->

            </div><!-- container Finish -->

        </div><!-- Top Finish -->

        <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->

            <div class="container"><!-- container Begin -->

                <div class="navbar-header"><!-- navbar-header Begin -->

                    <a href="../index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->

                        <img src="images/logo.png" alt="Jemcloset-Store Logo" class="hidden-xs">
                        <img src="images/logo-mobile.png" alt="Jemcloset-Store Logo Mobile" class="visible-xs">

                    </a><!-- navbar-brand home Finish -->

                    <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

                        <span class="sr-only">Toggle Navigation</span>

                        <i class="fa fa-align-justify"></i>

                    </button>

                    <button class="navbar-toggle" data-toggle="collapse" data-target="#search">

                        <span class="sr-only">Toggle Search</span>

                        <i class="fa fa-search"></i>

                    </button>

                </div><!-- navbar-header Finish -->

                <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->

                    <div class="padding-nav"><!-- padding-nav Begin -->

                        <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->

                            <li>
                                <a href="../index.php">Home</a>
                            </li>
                            <li>
                                <a href="../shop.php">Shop</a>
                            </li>
                            <li class="active">
                                <a href="my_account.php">My Account</a>
                            </li>
                            <li>
                                <a href="../cart.php">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="../contact.php">Contact Us</a>
                            </li>

                        </ul><!-- nav navbar-nav left Finish -->

                    </div><!-- padding-nav Finish -->

                    <a href="../cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->

                        <i class="fa fa-shopping-cart"></i>

                        <span><?php items(); ?> Items In Your Cart</span>

                    </a><!-- btn navbar-btn btn-primary Finish -->

                    <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->

                        <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->

                            <span class="sr-only">Toggle Search</span>

                            <i class="fa fa-search"></i>

                        </button><!-- btn btn-primary navbar-btn Finish -->

                    </div><!-- navbar-collapse collapse right Finish -->

                    <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->

                        <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->

                            <div class="input-group"><!-- input-group Begin -->

                                <input type="text" class="form-control" placeholder="Search" name="user_query" required>

                                <span class="input-group-btn"><!-- input-group-btn Begin -->

                                    <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->

                                        <i class="fa fa-search"></i>

                                    </button><!-- btn btn-primary Finish -->

                                </span><!-- input-group-btn Finish -->

                            </div><!-- input-group Finish -->

                        </form><!-- navbar-form Finish -->

                    </div><!-- collapse clearfix Finish -->

                </div><!-- navbar-collapse collapse Finish -->

            </div><!-- container Finish -->

        </div><!-- navbar navbar-default Finish -->

        <div id="content"><!-- #content Begin -->
            <div class="container"><!-- container Begin -->
                <div class="col-md-12"><!-- col-md-12 Begin -->

                    <ul class="breadcrumb"><!-- breadcrumb Begin -->
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            My Account
                        </li>
                    </ul><!-- breadcrumb Finish -->

                </div><!-- col-md-12 Finish -->

                <div class="col-md-3"><!-- col-md-3 Begin -->

                    <?php

                    include("includes/sidebar.php");

                    ?>

                </div><!-- col-md-3 Finish -->

                <div class="col-md-9"><!-- col-md-9 Begin -->

                    <div class="box"><!-- box Begin -->

                        <h1 align="center"> Please confirm your payment</h1>


                        <form action="confirm.php?update_id=<?php echo "$order_id";  ?>" method="post" enctype="multipart/form-data"><!-- form Begin -->

                            <div class="form-group"><!-- form-group Begin -->
                                <?php
                                date_default_timezone_set("Asia/Ho_Chi_Minh");
                                $currentDateTime = date('Y-m-d H:i:s');

                                $select_orders = "select * from orders where ORDER_ID = '$order_id'";
                                $run_orders = mysqli_query($con, $select_orders);
                                $row_orders = mysqli_fetch_array($run_orders);
                                $total = $row_orders['total'];

                                ?>
                                <label> Invoice Num: </label>

                                <input type="text" class="form-control" name="invoice_num" value="<?php echo mt_rand() ?>" required>

                            </div><!-- form-group Finish -->
                            <div class="form-group"><!-- form-group Begin -->

                                <label> Order ID: </label>

                                <input type="text" class="form-control" name="order_id" value="<?php echo $order_id ?>" required>

                            </div><!-- form-group Finish -->

                            <div class="form-group"><!-- form-group Begin -->

                                <label> Amount Sent: </label>

                                <input type="text" class="form-control" name="amount_sent" value="<?php echo $total ?>" required>

                            </div><!-- form-group Finish -->
                            <div class="form-group"><!-- form-group Begin -->

                                <label> Card Num: </label>

                                <input type="text" class="form-control" name="card_num" required>

                            </div><!-- form-group Finish -->
                            <div class="form-group"><!-- form-group Begin -->

                                <label> Exp Date: </label>

                                <input type="text" class="form-control" name="exp_date" value="<?php echo $currentDateTime ?>" required>

                            </div><!-- form-group Finish -->

                            <div class="form-group"><!-- form-group Begin -->

                                <label> Select Payment Method: </label>

                                <select name="payment_method" class="form-control"><!-- form-control Begin -->

                                    <option> Select Payment Method </option>
                                    <option> Credit Cart </option>
                                    <option> Paypall </option>
                                    <option> Bank Transfers </option>

                                </select><!-- form-control Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group"><!-- form-group Begin -->

                                <label> Type: </label>

                                <input type="text" class="form-control" name="type" value="AUTH_ONLY" required>

                            </div><!-- form-group Finish -->

                            <div class="text-center"><!-- text-center Begin -->

                                <button class="btn btn-primary btn-lg" name="confirm_payment"><!-- tn btn-primary btn-lg Begin -->

                                    <i class="fa fa-user-md"></i> Confirm Payment

                                </button><!-- tn btn-primary btn-lg Finish -->

                            </div><!-- text-center Finish -->

                        </form><!-- form Finish -->

                        <?php

                        if (isset($_POST['confirm_payment'])) {

                            $update_id = $_GET['update_id'];
                            $invoice_num = $_POST['invoice_num'];
                            $exp_date = $_POST['exp_date'];
                            $amount = $_POST['amount_sent'];
                            $card_num = $_POST['card_num'];

                            $payment_method = $_POST['payment_method'];
                            $complete = "Đã thanh toán";

                            $type = $_POST['type'];

                            $insert_transactions = "insert into transactions (INVOICE_NUM,ORDER_ID,amount,CARD_NUM,EXP_DATE,METHOD,TYPE, PAYMENT_DATE) values ('$invoice_num','$update_id','$amount','$card_num','$exp_date','$payment_method','$type',NOW())";

                            $run_transactions = mysqli_query($con, $insert_transactions);

                            $update_order = "update orders set STATUS='$complete' where ORDER_ID='$update_id'";

                            $run_order = mysqli_query($con, $update_order);

                            if ($run_order) {

                                echo "<script>alert('Thank You for purchasing, your orders will be completed within 24 hours work')</script>";

                                echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                            }
                        }

                        ?>

                    </div><!-- box Finish -->

                </div><!-- col-md-9 Finish -->

            </div><!-- container Finish -->
        </div><!-- #content Finish -->

        <?php

        include("includes/footer.php");

        ?>

        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>


    </body>

    </html>
<?php } ?>