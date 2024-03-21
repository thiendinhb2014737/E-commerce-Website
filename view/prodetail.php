<div class="box">
    <img src="img/next-img.png" alt="">
</div>

<div>
    <div id="header">
        <nav class="container-product">
            <ul id="product-menu" class="justify-content-center">
                <?php
                foreach ($dsdm as $dm) {
                    echo '<li><a href="index.php?act=products&id=' . $dm['id'] . '">' . $dm['tendm'] . '</a></li>';
                }
                ?>
            </ul>

        </nav>
    </div>
    <!--Main-->
    <div id="main-content">

        <div id="content">
            <!-- Chức năng tìm kiếm-->
            <form action="index.php?act=products" id="search-box" method="post">
                <div class="bg-white">
                    <input type="text" id="search-text" name="kyw" placeholder="Tìm kiếm sản phẩm">
                    <button id="search-btn" type="submit" name="timkiem"><i id="icon-find"
                            class="fa-solid fa-magnifying-glass text-white"></i></button>
                </div>
            </form>

            <div style="clear:both;"></div>
            <style type="text/css">
                ul.list_trang {
                    padding: 0;
                    margin: 0;
                    text-align: center;
                    list-style: none;
                }

                ul.list_trang li a {
                    color: #000;
                    text-align: center;
                    text-decoration: none;

                }
            </style>

            <!--<h2 class="text-center">Phong cách hiện đại</h2>-->

            <div id="img-sale">
                <img src="img/spct-img1.png" alt="">
                
                <img src="img/spct-img2.png" alt="">
                <p class="my-5">Sản phẩn thời trang DingVog mang phong cách thời trang hiện đại. Xu hướng tiếp cận ngành
                    công nghiệp thời trang bền vững có thể phục vụ nhiều nhu cầu trang phục ở nhiều lứa tuổi khác nhau.
                </p>
                <img src="img/spct-img3.png" alt="">
            </div>

        </div>


        <!--Danh sách sản phẩm-->

        <div id="products">
            <div class="headline">
                <h3>Sản phẩm chi tiết</h3>
            </div>
            <ul class="products">
                <?php
                $spct = getonesp($_GET['id']);

                echo '<li>
                                 <div class="product-item">
                                     <!--Sản phẩm-->
                                     <form action="index.php?act=addcart" method="post">
                                     <div class="product-top">
                                         <a href="" class="product-thumb">
                                             <img src="./Upload/' . $spct[0]['img'] . '" alt="">
                                         </a>
                                         <!--Mua ngay-->
                                         <input type="submit" class="buy-now" value="Mua ngay" name="addtocart">
                                             
                                     </div>
                                     <!--Thông tin sản phẩm-->
                                     <div class="product-info">
                                         <a href="" class="product-name">' . $spct[0]['tensp'] . '</a>
                                         <div class="product-price">' . $spct[0]['gia'] . '</div>
                                         <lable class="text-secondary">Số lượng</lable>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="number" class="buy-now" value="1" min="1" max="50" name="sl">
                                         
                                     </div>
                                     <input type="hidden" class="buy-now" value="' . $spct[0]['id'] . '" name="id">
                                     <input type="hidden" class="buy-now" value="' . $spct[0]['img'] . '" name="img">
                                     <input type="hidden" class="buy-now" value="' . $spct[0]['tensp'] . '" name="tensp">
                                     <input type="hidden" class="buy-now" value="' . $spct[0]['gia'] . '" name="gia">
                                     
                                     </form>
                                 </div>
                             </li>
                             <li>
                                <p id="info-message">
                                Xuất xứ: <b>Việt Nam</b><br>
                                Chiều dài tay áo: Dài 3/4<br>
                                Mẫu: In<br>
                                Chất liệu: <b>polyeste</b><br>
                                Tên tổ chức chịu trách nhiệm sản xuất: 1969Unisex<br>
                                Địa chỉ tổ chức chịu trách nhiệm sản xuất: Bình hưng hoà b, bình tân<br>
                                Kho hàng: 49849<br>
                                Gửi từ: <b>TP. Hồ Chí Minh</b><br>
                                </p>
                                <p id="info-message"><b>Thương hiệu Tobeney</b> được thành lập vào năm 2010. Thương hiệu này cung cấp những
                                    trang phục phù hợp với giới văn phòng với kích thước nhỏ gọn với giá trị thẩm mỹ cao. Điều này
                                    khiến nó trở nên phổ biến đối với các quý cô công sở trong nước. Phái nữ tự tin có thể mặc quần
                                    áo khi đi ra ngoài.
                                </p>
            
                            </li>';
                ?>
                
                <li>
                    <img src="../img/cart-now.png" alt="">
                    <a class=" btn btn-secondary mx-5" href="index.php?act=cart">Đi đến giỏ hàng</a>
                                        
                </li>
            </ul>
            <hr>
            <div class="headline">
                <h3>Bình luận</h3>
                <iframe src="binhluan.php" width="100%" height="400px" frameborder="0"></iframe>
            </div>
        </div>

       


    </div>

    <!--End-Main-->