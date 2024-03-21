<?php
    if (isset($_SESSION['id_user'])) {
?>
<div class="box">
    <img src="../img/next-img.png" alt="">
</div>
<style type="text/css">
    #wrapper {
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

    <div id="cart">
        <h3>Giỏ hàng</h3>
        <section class="ab-info-main">
            <div class="container ">
                <!--<h3 class="tittle text-center">View cart</h3>-->
                <div class="row contact-main-info mt-5">
                    <div class="col-md-10 contact-right-content">
                        <?php
                        //echo var_dump($_SESSION['giohang']);
                        if ((isset($_SESSION['giohang'])) && (count($_SESSION['giohang']) > 0)) {
                            echo '
                            
                            <table class="table table-Secondary table-striped">
                                            <tr id="tentb">
                                                <th>Hành động</th>
                                                <th>STT</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Hình ảnh</th>
                                                <th>Đơn giá</th>
                                                <th>Số lượng</th>
                                                <th>Thành tiền</th>
                                        
                                            </tr>';
                            $i = 0;
                            $tong = 0;
                            foreach ($_SESSION['giohang'] as $item) {
                                $tt = $item[3] * $item[4];
                                $tong = $tong + $tt;
                                echo '<tr>
                                                        <td><a class=" btn btn-secondary" href="index.php?act=delcart&i=' . $i . '">Xóa</a></td>
                                                        <td>' . ($i + 1) . '</td>
                                                        <td>' . $item[1] . '</td>
                                                        <td><img src="' . $item[2] . '" width="80px"></td>
                                                        <td>' . number_format($item[3]) . '</td>
                                                        <td>' . $item[4] . '</td>
                                                        <td>' . number_format($tt) . '</td>
                                                    </tr>';
                                $i++;
                            }
                            echo '<tr><td></td><td colspan="5">Tổng đơn hàng:</td><td>' . number_format($tong) . '&nbspVNĐ</td></tr>';
                            echo '</table>';
                        }
                        ?>
                        <br>
                        <a class=" btn btn-secondary" href="index.php?act=index&per_page=28&page=1">Tiếp tục mua hàng</a>  | <a class=" btn btn-secondary" href="index.php?act=delcart">Xóa giỏ hàng</a>
                    </div>
                    <div class="dathang col-md-2 contact-left-content">

                        <form action="index.php?act=thanhtoan" method="post">
                            <input type="hidden" name="tongdonhang" value="<?= $tong ?>">
                            <table class="table table-Light table-striped">
                                <tr class="bg-info">
                                    <td class="table-Secondary">
                                        <p>THÔNG TIN ĐẶT HÀNG</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="hoten" placeholder="Họ và tên"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="address" placeholder="Địa chỉ"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="email" placeholder="Email"></td>
                                </tr>
                                <tr>
                                    <td><input type="tel" name="sđt" placeholder="Số điện thoại"></td>
                                </tr>
                                <tr>
                                    <td> Phương thức thanh toán <br>
                                        <input type="radio" name="pttt" value="1"> Thanh toán khi nhận hàng<br>
                                        <input type="radio" name="pttt" value="2"> Thanh toán chuyển khoản<br>
                                        <input type="radio" name="pttt" value="3"> Thanh toán qua ví MoMo<br>
                                        <input type="radio" name="pttt" value="4"> Thanh toán online<br>
                                    </td>
                                </tr>
                                <?php
                                echo '<input type="hidden" class="buy-now" value="'.$_SESSION['id_user'].'" name="id_user">';
                                
                                ?>
                                <tr>
                                    <td class="table-Secondary">
                                        <input class=" btn btn-secondary" type="submit" value="Đặt hàng" name="thanhtoan">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>


    <!--End-Main-->
</div>
<?php
} else {
    header('location: ../login.php');
}
?>