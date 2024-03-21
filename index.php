<?php
session_start();
ob_start();
if (!isset($_SESSION['giohang']))
    $_SESSION['giohang'] = [];
include "Admin/model/connectdb.php";
include "Admin/model/danhmuc.php";
include "Admin/model/sanpham.php";
include "Admin/model/donhang.php";
include "Admin/model/contact.php";

$dsdm = getall_dm();
//connectdb();
include "view/header.php";
$sphome1 = getall_sanpham(0, "");

//Nhận và chuyển đến yêu cầu
if (isset($_GET['act'])) {
    switch ($_GET['act']) {

        case 'about':
            include "view/about.php";
            break;

        case 'products':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $iddm = $_GET['id'];
            } else {
                $iddm = 0;
            }
            $dssp = getall_sanpham($iddm, $kyw);
            include "view/products.php";
            break;

        case 'chitietsp':
            include "view/prodetail.php";
            break;

        case 'addcart':
                header('location: login.php');
            //
            // hiển thị giỏi hàng
            //include "view/cart.php";
            break;

        case 'news':
            include "view/news.php";
            break;

        case 'cart':
            include "view/cart.php";
            break;

        case 'delcart':
            if (isset($_GET['i']) && ($_GET['i'] > 0)) {
                if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0))
                    array_splice($_SESSION['giohang'], $_GET['i'], 1);
            } else {
                if (isset($_SESSION['giohang']))
                    unset($_SESSION['giohang']);
            }

            if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                header('location: index.php?act=cart');
            } else {
                header('location: index.php');
            }
            break;

        case 'contact':

            include "view/contact.php";
            break;

        case 'thanhtoan':
            if ((isset($_POST['thanhtoan'])) && ($_POST['thanhtoan'])) {
                //Lấy dữ liệu
                $tongdonhang = $_POST['tongdonhang'];
                $hoten = $_POST['hoten'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $sđt = $_POST['sđt'];
                $pttt = $_POST['pttt'];
                $date = date('Y-m-d H:i:s');
                $madh = "DINGVOG" . rand(0, 999999);
                //tạo đơn hàng
                //và trả về 1 id đơn hàng
                $iddh = taodonhang($madh, $tongdonhang, $pttt, $hoten, $address, $email, $sđt, $date);
                $_SESSION['iddh'] = $iddh;
                if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                    foreach ($_SESSION['giohang'] as $item) {
                        addtocart($iddh, $item[0], $item[1], $item[2], $item[3], $item[4]);
                    }
                    unset($_SESSION['giohang']);
                }

            }
            include "view/donhang.php";
            break;

        case 'chat':
            include "view/chat.php";
            break;

        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";

?>