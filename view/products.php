        
        
        
        <div class="box">
            <img src="img/next-img.png" alt="">
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
                <form action="index.php?act=products" id="search-box" method="post">
                    <div class="bg-white">
                        <input type="text" class="clear" id="search-text" name="kyw" placeholder="Tìm kiếm sản phẩm">
                        <button id="search-btn" type="submit" name="timkiem"><i id="icon-find" class="fa-solid fa-magnifying-glass text-white"></i></button>
                    </div>
                </form>
                <!--<h2 class="text-center">Phong cách hiện đại</h2>-->
                
                <div id="img-sale">
                    <img src="img/ad1.png" alt="">
                    <p class="my-5">Sản phẩn thời trang DingVog mang phong cách thời trang hiện đại. Xu hướng tiếp cận ngành công nghiệp thời trang bền vững có thể phục vụ nhiều nhu cầu trang phục ở nhiều lứa tuổi khác nhau.</p>
                    <img src="img/ad2.png" alt="">
                    <p class="my-5">DingVog tự hào là ngành thời trang có thể mang đến sản phẩm thời trang phù hợp với mọi phong cách.</p>
                    <img src="img/ad3.png" alt="">
                    <img src="img/ad4.png" alt="">    
                </div>
                
            </div>


            <!--Danh sách sản phẩm-->
            <div id="products">


            <ul class="products">
                <?php 
                    foreach ($dssp as $sp) {
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
                                            <img src="./Upload/'.$sp['img'].'" alt="">
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
                                    
                                    </form>
                                </div>
                            </li>';
                    }
                ?>        
            </ul>
            
        </div>  
        </div>
            
        <div id="sidebar">
                <img src="img/img-sidebar.png" alt="">
        </div>
            
          
        </div>
    
        <!--End-Main-->