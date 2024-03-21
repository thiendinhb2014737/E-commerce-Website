<?php

function checkuser($user,$pass){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user='".$user."' AND pass='".$pass."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    if(count($kq)>0) return $kq[0]['role '];
    else return 0;
}
function getuserinfo($id){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function getpass($id){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function updateaccount($id,$name,$user,$email,$address,$avt){
    $conn=connectdb();
    
    $sql="UPDATE tbl_user SET name='".$name."',user='".$user."', email='".$email."', address='".$address."', avt='".$avt."' WHERE id=".$id;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function updateaccountpass($id,$name,$user,$pass_new,$email,$address,$avt){
    $conn=connectdb();
    
    $sql="UPDATE tbl_user SET name='".$name."',user='".$user."',pass='".$pass_new."', email='".$email."', address='".$address."', avt='".$avt."' WHERE id=".$id;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function updatemk($id,$name,$user,$pass,$email,$address,$avt){
    $conn=connectdb();
    
    $sql="UPDATE tbl_user SET name='".$name."',user='".$user."',pass='".$pass."', email='".$email."', address='".$address."', avt='".$avt."' WHERE id=".$id;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function quenmk($id, $pass){
    $conn=connectdb();
    
    $sql="UPDATE tbl_user SET pass='".$pass."' WHERE id=".$id;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
?>