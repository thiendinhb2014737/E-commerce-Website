<?php
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    
    $conn = new mysqli('localhost', 'root', '', 'ding_vog');

    $sql = "SELECT * FROM tbl_user WHERE user = '$user'";
    $result = $conn->query($sql)->fetch_assoc();

    
    $role=$result['role'];
    $_SESSION['role']=$role;
    $iduser=$result['id'];
    $_SESSION['id_user']=$iduser;

    if($result['pass']==$pass && $role==1){
        header('location: ../Admin/index.php?act=index&per_page=28&page=1');          
    }else
    if($result['pass']==$pass && $role==0){
        header('location: ../User/index.php?act=index&per_page=28&page=1');          
    }else
        
        header('location: login.php');


    $conn->close();
?>