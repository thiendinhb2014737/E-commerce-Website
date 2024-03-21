<?php
session_start();
ob_start();
include "model/connectdb.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/donhang.php";
include "model/user.php";
include "model/contact.php";
include "model/binhluan.php";

if (isset($_SESSION['role']) && ($_SESSION['role'] == 1)) {
    $dsdm = getall_dm();
    //connectdb();
    include "view/header.php";
    $sphome1 = getall_sanpham(0, "");
    $user = getuserinfo($_SESSION['id']);
    $orderinfo = getallorder();
    //Nhận và chuyển đến yêu cầu
    if (isset($_GET['act'])) {
        switch ($_GET['act']) {

            case 'danhmuc':
                // nhận yêu cầu và xử lý
                //lấy danh sách danh mục từ db và show ra trang danh mục
                $kq = getall_dm();
                include "view/danhmuc.php";
                break;

            case 'adddm':
                // nhận yêu cầu và xử lý
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $tendm = $_POST['tendm'];
                    themdm($tendm);
                    echo '<script>alert("Danh mục ' . $tendm . ' đã được thêm mới!");</script>';
                }
                //lấy danh sách danh mục từ db và show ra trang danh mục
                $kq = getall_dm();
                include "view/danhmuc.php";
                break;

            case 'deldm':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    deldm($id);
                    echo '<script>alert("Danh mục id=' . $id . ' đã được xóa!");</script>';
                }
                $kq = getall_dm();
                include "view/danhmuc.php";
                break;

            case 'updatedmform':
                // LẤY 1 record đúng vs id truyền vào
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $kqone = getonedm($id);
                    // Danh sách dm
                    $kq = getall_dm();

                    include "view/updatedmform.php";
                }
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $tendm = $_POST['tendm'];
                    updatedm($id, $tendm);
                    echo '<script>alert("Danh mục ' . $tendm . ' đã được cập nhật!");</script>';
                    // Danh sách dm
                    $kq = getall_dm();
                    include "view/danhmuc.php";
                }

                break;

            case 'sanpham':
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
                $kq = getall_sanpham($iddm, $kyw);
                //load ds danh mục
                $dsdm = getall_dm();
                // load ds sản phẩm
                //$kq = getall_sanpham();
                include "view/sanpham.php";
                break;
            case 'findsanpham':
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
                $kq = getall_sanpham($iddm, $kyw);
                //load ds danh mục
                $dsdm = getall_dm();
                // load ds sản phẩm
                //$kq = getall_sanpham();
                include "view/findsanpham.php";
                break;

            case 'delsp':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    delsp($id);
                    echo '<script>alert("Sản phẩm id=' . $id . ' đã được xóa!");</script>';
                }
                $kq = getall_sanpham();
                include "view/sanpham.php";
                break;

            case 'updatespform':
                //load ds danh mục
                $dsdm = getall_dm();
                // sp chi tiết theo get id
                if (isset($_GET['id']) && ($_GET['id']) > 0) {
                    $spct = getonesp($_GET['id']);
                }
                // load ds sản phẩm
                $kq = getall_sanpham();
                include "view/updatespform.php";
                break;

            case 'sanpham_update':
                //load ds danh mục
                $dsdm = getall_dm();
                // cập nhật sp
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giacu = $_POST['giacu'];
                    $gia = $_POST['gia'];
                    $id = $_POST['id'];
                    if ($_FILES["hinh"]["name"] != "") {
                        $target_dir = "../Upload/";
                        $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                        $img = $target_file;
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
                        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);

                    } else {
                        $img = "";
                    }
                    updatesp($id, $tensp, $img, $giacu, $gia, $iddm);
                    echo '<script>alert("Sản phẩm ' . $tensp . ' đã được cập nhật!");</script>';
                }
                // load ds sản phẩm
                $kq = getall_sanpham();
                include "view/sanpham.php";
                break;

            case 'sanpham_add':
                if ((isset($_POST['themmoi'])) && ($_POST['themmoi'])) {

                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];

                    $gia = $_POST['gia'];

                    $target_dir = "../Upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    $img = $target_file;
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

                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                    // if($_FILES['hinh']['name']!="") $img = $_FILES['hinh']['name']; else $img = "";

                    insert_sanpham($iddm, $tensp, $gia, $img);
                    echo '<script>alert("Sản phẩm ' . $tensp . ' đã được thêm mới!");</script>';
                }
                //load ds danh mục
                $dsdm = getall_dm();
                // load ds sản phẩm
                $kq = getall_sanpham();
                include "view/sanpham.php";
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
                    if (($pass == $a[0]['pass'])) {
                        updatemk($id, $name, $user, $pass_new, $email, $address, $avt);
                        echo '<script>alert("Mật khẩu được đổi thành công!");</script>';
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

            case 'taikhoan':
                include "view/taikhoan.php";
                break;

            case 'thoat':
                if (isset($_SESSION['role']))
                    unset($_SESSION['role']);
                header('location: ../login.php');

            case 'donhang':
                $orderinfo = getallorder();
                include "view/donhang.php";
                break;

            case 'delorder':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    delorder($id);
                    echo '<script>alert("Đơn hàng id=' . $id . ' đã được hủy bỏ!");</script>';
                }
                $orderinfo = getallorder();
                include "view/donhang.php";
                break;
            case 'updateorder':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $xacnhan = "Đã xác nhận";
                    updateorder($id, $xacnhan);
                    echo '<script>alert("Đơn hàng id=' . $id . ' đã được xác nhận!");</script>';
                }
                $orderinfo = getallorder();
                include "view/donhang.php";
                break;
            case 'delcomment':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    delcomment($id);
                    echo '<script>alert("Bình luận id=' . $id . ' đã được ẩn!");</script>';
                }
                $kq = getall_binhluan();
                include "view/comment.php";
                break;
            case 'delcontact':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    delcontact($id);
                    echo '<script>alert("Liên hệ id=' . $id . ' đã được xóa!");</script>';
                }
                $kq = getall_contact();
                include "view/contact.php";
                break;
            case 'account':
                include "view/account.php";
                break;

            case 'lienhe':
                $kq = getall_contact();
                include "view/contact.php";
                break;
            case 'binhluan':
                $kq = getall_binhluan();
                include "view/comment.php";
                break;
            case 'thongke':
                $cartinfo = showcart();
                include "view/thongke.php";
                break;

            default:
                include "view/home.php";
                break;
        }
    } else {
        include "view/home.php";
    }
    include "view/footer.php";
} else {
    header('location: ../login.php');
}
?>