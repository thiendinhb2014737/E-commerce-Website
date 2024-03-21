<?php

require 'model/connectdb.php';
if(isset($_POST['btn-reg'])){
    

    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];

    if (!empty($user) && !empty($pass) && !empty($email)){
        //echo '<pre>';
       // print_r($_POST);

        $sql = "INSERT INTO `tbl_user` (`user`, `pass`, `email`) VALUE('$user', '$pass', '$email')";

        if($conn->query($sql)===TRUE){
            echo "Lưu dữ liệu thành công!";
        }else{
            echo "Lỗi {$sql}".$conn->error;
        }

    }else{
        echo"Bạn cần nhập đầy đủ thông tin";
    }
    
}
header('location: login.php');

?>