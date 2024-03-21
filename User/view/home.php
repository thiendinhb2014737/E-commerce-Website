        <div class="box">
            <img src="../img/next-img.png" alt="">
        </div>
        
        <div >
            <div id="header">
            <nav class="container-product">
                <ul id="product-menu" class="justify-content-center">   
                    <?php
                        foreach ($dsdm as $dm) {
                            echo '<li><a href="index.php?act=products&id='.$dm['id'].'">'.$dm['tendm'].'</a></li>';
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
                        <button id="search-btn" type="submit" name="timkiem"><i id="icon-find" class="fa-solid fa-magnifying-glass text-white"></i></button>
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
                    <img src="../img/ad4.png" alt="">
                    <img src="../img/img-ad08.png" alt="">
                    <p class="my-5">Sản phẩn thời trang DingVog mang phong cách thời trang hiện đại. Xu hướng tiếp cận ngành
                        công nghiệp thời trang bền vững có thể phục vụ nhiều nhu cầu trang phục ở nhiều lứa tuổi khác nhau.
                    </p>
                    <img src="../img/img-ad07.png" alt="">
                    <p class="my-5">DingVog tự hào là ngành thời trang có thể mang đến sản phẩm thời trang phù hợp với mọi
                        phong cách.</p>
                    <img src="../img/ad3.png" alt="">
                    <img src="../img/img-ad01.png" alt="">
                    <p class="my-5">Xu hướng thời trang toàn cầu, mặt hàng chất lượng có taih DingVog</p>
                    <img src="../img/ad5.png" alt="">
                </div>
                
            </div>


            <!--Danh sách sản phẩm-->
            <div id="products">

            <ul class="products">
                <?php 
                    foreach ($sphome1 as $sp) {
                        if($sp['gia']==0){
                            $gia="Đang cập nhật";
                        }else{
                            if($sp['giacu']>0){
                                $gia='<del><font color="#726f6f"</font>'.number_format($sp['giacu']).'&nbspVNĐ</del><font color="#4682B4"</font>&nbsp&nbsp&nbsp'.number_format($sp['gia']).'&nbspVNĐ';
                            }else{
                                $gia=number_format($sp['gia']).'&nbspVNĐ';
                            }
                        }
                        echo '<li>
                                <div class="product-item">
                                    <!--Sản phẩm-->
                                    <form action="index.php?act=addcart" method="post">
                                    <div class="product-top">
                                        <a href="" class="product-thumb">
                                            <img src="../Upload/'.$sp['img'].'" alt="">
                                        </a>
                                        <!--Mua ngay-->
                                        <input type="submit" class="buy-now" value="Mua ngay" name="addtocart">
                                            
                                    </div>
                                    <!--Thông tin sản phẩm-->
                                    <div class="product-info">
                                        <a class="btn btn-secondary mx-1" type="submit" href="index.php?act=chitietsp&id='.$sp['id'].'" name="chitietsp">Xem chi tiết</a>
                                        <a href="" class="product-name">'.$sp['tensp'].'</a>
                                        <div class="product-price">'.$gia.'</div>
                                        <lable class="text-secondary">Số lượng</lable>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="number" class="buy-now" value="1" min="1" max="50" name="sl">
                                    </div>
                                    <input type="hidden" class="buy-now" value="'.$sp['id'].'" name="id">
                                    <input type="hidden" class="buy-now" value="'.$sp['img'].'" name="img">
                                    <input type="hidden" class="buy-now" value="'.$sp['tensp'].'" name="tensp">
                                    <input type="hidden" class="buy-now" value="'.$sp['gia'].'" name="gia">
                                    <input type="hidden" class="buy-now" value="'.$_SESSION['id_user'].'" name="id_user">
                                    </form>
                                </div>
                            </li>';
                        
                    }
                ?>
                       
            </ul>
            <ul class="list_trang pagination justify-content-center">
            <?php
                $conn=connectdb();
                $sql="SELECT * FROM tbl_sanpham WHERE 1";
                // Phân trang
                $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:24;
                $current_page = !empty($_GET['page'])?$_GET['page']:1;
                $offset = ($current_page - 1) * $item_per_page;
                
                $sql.=" order by id ASC LIMIT ".$item_per_page." OFFSET ".$offset."";
                $totalRecords = "SELECT * FROM tbl_sanpham";
                $result = $conn->query($totalRecords);
                $totalRecords=$result->rowCount();
                $totalPages = ceil($totalRecords/$item_per_page);

            for ($num=1; $num<= $totalPages ; $num++) { 
                echo '<li class="page-item"><a class="page-link" href="?act=index&per_page=24&page='.$num.'">'.$num.'</a></li>';
            }
            ?>
            </ul>
        </div>
            
        <div id="sidebar">
                <img src="../img/img-sidebar.png" alt="">
        </div>
            
          
        </div>
    
        <!--End-Main-->