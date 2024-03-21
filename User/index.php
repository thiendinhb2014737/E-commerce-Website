<?php
session_start();
ob_start();
if (!isset($_SESSION['giohang']))
    $_SESSION['giohang'] = [];
include "../Admin/model/connectdb.php";
include "../Admin/model/danhmuc.php";
include "../Admin/model/sanpham.php";
include "../Admin/model/donhang.php";
include "../Admin/model/contact.php";
include "../Admin/model/user.php";

$dsdm = getall_dm();
$user = getuserinfo($_SESSION['id_user']);
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
                //echo '<script>alert("Thông tin khách hàng được đổi thành công!");</script>';
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
            // lấy dữ liệu từ form để lưu vào giỏ hàng
            if (isset($_SESSION['id_user'])) {
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $id_user=$_POST['id_user'];
                $tensp = $_POST['tensp'];
                $img = $_POST['img'];
                $gia = $_POST['gia'];
                //TH nếu trang chi tiết, user nhập nhiều sl
                if (isset($_POST['sl']) && ($_POST['sl']) > 0) {
                    $sl = $_POST['sl'];
                } else {
                    $sl = 1;
                }
                $fg = 0;
                //Kiểm tra sp có tồn tại trong giỏ hàng không
                // Nếu có chỉ cập nhật sl
                $i = 0;
                foreach ($_SESSION['giohang'] as $item) {
                    if ($item[0] == $id) {
                        $slnew = $sl + $item[4];
                        $_SESSION['giohang'][$i][4] = $slnew;
                        $fg = 1;
                        break;
                    }
                    $i++;
                }

                // Ngược lại add mới
                //khởi tạo 1 mảng con trước khi đưa vào giỏ hàng
                if ($fg == 0) {
                    $item = array($id, $tensp, $img, $gia, $sl, $_SESSION['id_user']);
                    $_SESSION['giohang'][] = $item;
                }
                header('location: index.php?act=cart');

            }
        }
            //
            // hiển thị giỏi hàng
            //include "view/cart.php";
            break;

        case 'news':
            include "view/news.php";
            break;

        case 'cart':
            if (isset($_SESSION['id_user'])) {
            include "view/cart.php";
            }
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
                $_SESSION['email'] = $email;
                $sđt = $_POST['sđt'];
                $pttt = $_POST['pttt'];
                $date = date('Y-m-d H:i:s');
                $madh = "DINGVOG" . rand(0, 999999);
                $id_user = $_POST['id_user'];
                //tạo đơn hàng
                //và trả về 1 id đơn hàng
                $iddh = taodonhang($madh, $tongdonhang, $pttt, $hoten, $address, $email, $sđt, $date, $id_user);
                $_SESSION['iddh'] = $iddh;
                if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                    foreach ($_SESSION['giohang'] as $item) {
                        addtocart($iddh, $item[0], $item[1], $item[2], $item[3], $item[4], $id_user);
                    }
                    
                }
            }

            include "view/donhang.php";
            break;
        case 'thoat':
            if (isset($_SESSION['role'])) {
                unset($_SESSION['role']);
                unset($_SESSION['user']);
                unset($_SESSION['id_user']);
            }
            header('location: ../login.php');

        case 'chat':
            include "view/chat.php";
            break;
        case 'order':
            include "view/order.php";
            break;

        case 'updateaccount':
            // LẤY 1 record đúng vs id truyền vào
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $kqone = getuserinfo($id);
                include "view/updateaccount.php";
            }
            if (isset($_POST['capnhat'])) {
                $id = $user[0]['id'];
                $name = $_POST['name'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $pass_new = $_POST['pass_new'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                if ($_FILES["avt"]["name"] != "") {
                    $target_dir = "../Upload/";
                    $target_file = $target_dir . basename($_FILES["avt"]["name"]);
                    $avt = $target_file;
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    // Allow certain file formats
                    if (
                        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif"
                    ) {
                        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }
                    move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);

                } else {
                    $img = "";
                }
                $a = getpass($id);
                if ($pass == $a[0]['pass']) {
                    updateaccountpass($id, $name, $user, $pass_new, $email, $address, $avt);
                    echo '<script>alert("Thông tin khách hàng được đổi thành công!");</script>';
                } else if (($pass == "")) {
                    updateaccount($id, $name, $user, $email, $address, $avt);
                    echo '<script>alert("Thông tin được đổi thành công!");</script>';
                } else {
                    echo '<script>alert("Mật khẩu không đúng. Vui lòng nhập lại!");</script>';
                }


                // Danh sách dm  
                include "view/account.php";
            }

            break;

        case 'account':
            include "view/account.php";
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