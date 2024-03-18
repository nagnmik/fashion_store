<?php

$active = 'Home';
include("includes/header.php");

?>

<div class="container" id="slider"><!-- container Begin -->

    <div class="col-md-12"><!-- col-md-12 Begin -->

        <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide Begin -->

            <ol class="carousel-indicators"><!-- carousel-indicators Begin -->

                <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>

            </ol><!-- carousel-indicators Finish -->

            <div class="carousel-inner"><!-- carousel-inner Begin -->

                <?php

                $get_slides = "select * from slider LIMIT 0,1";

                $run_slides = mysqli_query($con, $get_slides);
                while ($row_slides = mysqli_fetch_array($run_slides)) {
                    echo "
                       
                       <div class='item active'>
                       
                       <img src='admin_area/slides_images/$row_slides[2]'>
                       
                       </div>
                       
                       ";
                }


                $get_slides = "select * from slider LIMIT 1,3";

                $run_slides = mysqli_query($con, $get_slides);

                while ($row_slides = mysqli_fetch_array($run_slides)) {

                    $slide_image = $row_slides['IMAGE'];

                    echo "
                       
                       <div class='item'>
                       
                       <img src='admin_area/slides_images/$slide_image'>
                       
                       </div>
                       
                       ";
                }

                ?>

            </div><!-- carousel-inner Finish -->

            <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->

                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>

            </a><!-- left carousel-control Finish -->

            <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- left carousel-control Begin -->

                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>

            </a><!-- left carousel-control Finish -->

        </div><!-- carousel slide Finish -->

    </div><!-- col-md-12 Finish -->

</div><!-- container Finish -->

<div id="advantages"><!-- #advantages Begin -->

    <div class="container"><!-- container Begin -->

        <div class="same-height-row"><!-- same-height-row Begin -->

            <div class="col-sm-4"><!-- col-sm-4 Begin -->

                <div class="box same-height box_1"><!-- box same-height Begin -->

                    <h3><a href="#">Miễn phí vận chuyển</a></h3>

                    <p>Đơn hàng tối thiểu 100k</p>

                </div><!-- box same-height Finish -->

            </div><!-- col-sm-4 Finish -->

            <div class="col-sm-4"><!-- col-sm-4 Begin -->

                <div class="box same-height box_2"><!-- box same-height Begin -->

                    <h3><a href="#">Giảm 20% (Giảm tối đa ₫50k)</a></h3>

                    <p>Mã giảm giá: 12MINI31 (Lần đầu mua hàng)</p>

                </div><!-- box same-height Finish -->

            </div><!-- col-sm-4 Finish -->

            <div class="col-sm-4"><!-- col-sm-4 Begin -->

                <div class="box same-height box_3"><!-- box same-height Begin -->

                    <h3><a href="#">Giảm 10% (Giảm tối đa ₫25k)</a></h3>

                    <p>Mã giảm giá: 09MINI22 (Đơn Tối Thiểu ₫99k) </p>

                </div><!-- box same-height Finish -->

            </div><!-- col-sm-4 Finish -->

        </div><!-- same-height-row Finish -->

    </div><!-- container Finish -->

</div><!-- #advantages Finish -->


<div id="hot"><!-- #hot Begin -->

    <div class="container"><!-- container Begin -->
        <div class="row">
            <div class="col-md-12"><!-- col-md-12 Begin -->

                <h2>
                    Our Latest Products
                </h2>

            </div><!-- col-md-12 Finish -->
        </div>

    </div><!-- container Finish -->

</div><!-- #hot Finish -->

<div id="content" class="container mb-60"><!-- container Begin -->

    <div class="row"><!-- row Begin -->

        <?php

        getPro();

        ?>

    </div><!-- row Finish -->

</div><!-- container Finish -->

<!-- Question Begin -->
<div class="question">
    <div class="container">
        <div class="title">
            <i class="fa-solid fa-snowflake"></i>
            <h2 class="heading">CHÍNH SÁCH ĐỔI HÀNG TẠI JEM</h2>
        </div>
        <div class="question-list row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-12">
                <i class="fa-solid fa-snowflake snow-icon"></i>
                <article class="question-item">
                    <!--question title-->
                    <div class="question-item--title">
                        <p>1. Điều kiện áp dụng</p>
                        <button type="button" class="question-item--btn">
                            <span class="plus-icon">
                                <i class="fa fa-plus"></i>
                            </span>
                            <span class="minus-icon">
                                <i class="fa fa-minus"></i>
                            </span>
                        </button>
                    </div>
                    <!--question text-->
                    <div class="question-item--text">
                        <p>
                            - Trong vòng 07 ngày kể từ khi nhận sản phẩm<br>
                            - Hàng hoá vẫn còn mới, chưa qua sử dụng<br>
                            - Hàng hoá bị lỗi hoặc hư hỏng do vận chuyển hoặc do nhà sản xuất<br>
                            - Quý khách vui lòng quay video khi khui hàng
                        </p>
                    </div>
                </article>
                <article class="question-item">
                    <!--question title-->
                    <div class="question-item--title">
                        <p>2. Trường hợp được chấp nhận</p>
                        <button type="button" class="question-item--btn">
                            <span class="plus-icon">
                                <i class="fa fa-plus"></i>
                            </span>
                            <span class="minus-icon">
                                <i class="fa fa-minus"></i>
                            </span>
                        </button>
                    </div>
                    <!--question text-->
                    <div class="question-item--text">
                        <p>
                            - Hàng không đúng size, kiểu dáng như quý khách đặt hàng<br>
                            - Không đủ số lượng, không đủ bộ như trong đơn hàng
                        </p>
                    </div>
                </article>
                <article class="question-item">
                    <!--question title-->
                    <div class="question-item--title">
                        <p>3. Trường hợp không đủ điều kiện áp dụng chính sách</p>
                        <button type="button" class="question-item--btn">
                            <span class="plus-icon">
                                <i class="fa fa-plus"></i>
                            </span>
                            <span class="minus-icon">
                                <i class="fa fa-minus"></i>
                            </span>
                        </button>
                    </div>
                    <!--question text-->
                    <div class="question-item--text">
                        <p>
                            - Quá 07 ngày kể từ khi Quý khách nhận hàng<br>
                            - Gửi lại hàng không đúng mẫu mã, không phải sản phẩm của JEM<br>
                            - Không thích, không hợp, đặt nhầm mã, nhầm màu,...
                        </p>
                    </div>
                </article>
                <article class="question-item">
                    <!--question title-->
                    <div class="question-item--title">
                        <p>4. Phí đổi hàng</p>
                        <button type="button" class="question-item--btn">
                            <span class="plus-icon">
                                <i class="fa fa-plus"></i>
                            </span>
                            <span class="minus-icon">
                                <i class="fa fa-minus"></i>
                            </span>
                        </button>
                    </div>
                    <!--question text-->
                    <div class="question-item--text">
                        <p>
                            - Với sản phẩm lỗi đến từ shop( Nhầm mẫu, nhầm size, kích thước mô tả không đúng ): Shop sẽ thanh toán 2 chiều phí ship.<br>
                            - Với sản phẩm cần đổi đến từ nhu cầu của khách ( Không vừa, không hợp): Khách thanh toán phí ship 2 chiều giúp shop ạ
                        </p>
                    </div>
                </article>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-12">
                <div class="question-img">
                    <img src="./images/store_jem2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Question End -->
<div id="our_story">
    <div class="container">
        <div class="row">
            <div class="col-md-12"><!-- col-md-12 Begin -->
                <h2>
                    Jemcloset's Story
                </h2>
            </div><!-- col-md-12 Finish -->
            <div class="col-md-6">
                <img src="https://jemcloset.com/cdn/shop/files/IMG_4558.jpg?crop=center&height=2048&v=1679912264&width=2048" alt="cửa hàng Jemcloset" class="img-responsive">
            </div>
            <div class="col-md-6">
                <p>
                    Để nói về Jem chúng mình luôn mong đem đến cho mọi người những trải nghiệm THẬT và ĐẸP nhất.
                    Bắt đầu năm 2017 với những bước đi đầu tiên trên con đường chinh phục khát vọng trở thành thương hiệu thời trang hàng đầu. Chúng mình tạo ra Jem bằng tất cả tri thức, sự nhiệt huyết cùng tất cả tình yêu dành cho quần áo. Rồi nhờ sự tin tưởng của mọi người mà mỗi ngày lại có thêm nhiều bạn tìm đến với Jem hơn. Để có được Jem của hiện tại chúng mình thực sự cảm ơn tất cả những tình cảm và sự yêu quý mà mọi người đã dành cho chúng mình qua từng ấy ngày và cả sau này nữa.
                    Với hơn 30% sản phẩm được được nhập khẩu trực tiếp qua sự lựa chọn kỹ càng cùng 70% sản phẩm được thiết kế và gia công cẩn thận tại xưởng Jem, chúng mình tự tin luôn cập nhật những mẫu thời trang đi đầu với chất lượng và giá cả tốt nhất.
                    Tất cả hình ảnh trên page đều là sản phẩm thật của Jem, chúng mình luôn tự chụp ảnh sản phẩm thật nhất cho khách xem, nếu có bất kỳ điều gì cần tư vấn kỹ hơn các bạn cứ direct trực tiếp để được tư vấn chính xác nhất ạ.
                </p>
            </div>

        </div>
    </div>
</div>

<?php

include("includes/footer.php");

?>

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>
<script>
    //using selectors inside the element

    const questions = document.querySelectorAll('.question-item')

    questions.forEach(function(question) {
        const btn = question.querySelector('.question-item--btn')
        btn.addEventListener('click', function() {

            questions.forEach(function(item) {
                if (item !== question) {
                    item.classList.remove('show-text')
                }
            })
            question.classList.toggle('show-text')
        })
    })
</script>

</body>

</html>