<?php
    ob_start();
    include "../model/connectdb.php";
    include "../model/sanpham.php";

    if((isset($_POST['themmoi']))&&($_POST['themmoi'])){

        $iddm = $_POST['iddm'];
        $tensp = $_POST['tensp'];
       
        $gia = $_POST['gia'];

        if($_FILES['hinh']['name']!="") $img = $_FILES['hinh']['name']; else $img = "";

        insert_sanpham($iddm,$tensp,$gia,$img);
    }
    header('location: index.php?act=sanpham')
?>