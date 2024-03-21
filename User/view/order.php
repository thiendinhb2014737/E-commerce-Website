<div class="box">
            <img src="../img/next-img.png" alt="">
        </div>
        <style type="text/css">
            #wrapper{
                /*max-width: 2200px;*/
                margin: 0px auto;
                flex-basis: 100%;
            }
            a {
                text-decoration: none;        
            }
            h3 {
                margin: 10px;
                color: navy;
                text-align: center;
            }
                
        </style>
        <!--Main-->
        <div id="main-content">

            <div >

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php?act=index&per_page=28&page=1">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item active"><strong>Đơn hàng</strong></li>
                </ol>

                <section class="ab-info-main py-5">
                    <div class="container py-3">
                        
                        <!--<h3 class="tittle text-center">View cart</h3>-->
                        <div class="row contact-main-info mt-5">
                            <div class="col-md-8 contact-right-content">
                            <?php
                                //echo var_dump($_SESSION['giohang']);
                                $showcartinfo=showcartinfo($_SESSION['id_user']);
                                
                                       // $shcart=shcart($_SESSION['iddh']);
                                        if((isset($showcartinfo))&&(count($showcartinfo)>0)){
                                            echo '<table class="table table-Secondary table-striped">
                                                    <tr>
                                                        
                                                        <th id="tentb">STT</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Hình ảnh</th>
                                                        <th>Đơn giá</th>
                                                        <th>Số lượng</th>
                                                        <th>Thành tiền</th>
                                                        
                                                    </tr>';
                                                    $i=0;
                                                    $tong=0;
                                                    foreach ($showcartinfo as $item) {
                                                        $tt=$item['soluong'] * $item['dongia'];
                                                        $tong=$tong + $tt;
                                                        echo '<tr>
                                                                
                                                                <td>'.($i+1).'</td>
                                                                <td>'.$item['tensp'].'</td>
                                                                <td><img src="'.$item['img'].'" width="80px"></td>
                                                                <td>'.$item['soluong'].'</td>
                                                                <td>'.number_format($item['dongia']).'</td>
                                                                <td>'.number_format($tt).'</td>
                                                            </tr>';
                                                            $i++;
                                                    }
                                                    echo '<tr><td colspan="5"><strong>Tổng đơn hàng:</strong></td><td><strong>'.number_format($tong).'&nbspVNĐ</strong></td></tr>';
                                            echo '</table>';
                                                }else{
                                                    echo 'Giỏ hàng rỗng.<a href="index.php">Tiếp tục đặt hàng</a>';
                                                }
                                    
                            
                               
                            ?>
                            
                            </div>
                            <div class="col-md-4 contact-left-content">
                                <?php
                                $shorderinfo=shorderinfo($_SESSION['id_user']);

                                 
                                    if(isset($_SESSION['id_user'])&&($_SESSION['id_user']>0)){
                                        
                                        if(count($shorderinfo)>0){
                                            $shorder=shorder($_SESSION['id_user']);
                                            foreach ($shorder as $order) {
                                                # code...
                                            
                                 
                                    
                                ?>
                                
                                    <table class="dathang table table-Light table-striped">
                                        <tr class="bg-info">
                                            <td class="table-Secondary">
                                            <p class="text-primary text-center">THÔNG TIN ĐẶT HÀNG</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Mã đơn hàng:</strong> <i><?=$order['madh'];?></i></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tên người nhận:</strong> <?=$order['hoten'];?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Địa chỉ người nhận:</strong> <?=$order['address'];?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email người nhận:</strong> <?=$order['email'];?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Số điện thoại người nhận:</strong> <?=$order['sđt'];?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Trạng thái đơn hàng:</strong> <i class="text-primary"><?=$order['xacnhan'];?></i></td>
                                        </tr>
                                        <tr>
                                            <td class="table-Secondary"><strong>Phương thức thanh toán: </strong><br>
                                                <?php
                                                    switch ($order['pttt']) {
                                                        case '1':
                                                            $txtmess="Thanh toán khi nhận hàng";
                                                            break;
                                                        case '2':
                                                            $txtmess="Thanh toán chuyển khoản";
                                                            break;
                                                        case '3':
                                                            $txtmess="Thanh toán qua ví MoMo";
                                                            break;
                                                        case '4':
                                                            $txtmess="Thanh toán online";
                                                            break;
                                                        default:
                                                            $txtmess="Quý khách chưa chọn phương thức thanh toán!";
                                                            break;
                                                    }
                                                    echo $txtmess;
                                                ?>
                                               
                                            </td>
                                        </tr>
                                       
                                    </table>
                               <?php
                               }
                                        }
                                    }
                                    
                               ?>
                            </div>
                        </div>
                    </div>
                </section>

             </div>

            
        <!--End-Main-->
    </div>





