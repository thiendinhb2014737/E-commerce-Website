<?php

function insert_contact($name,$sđt,$email,$noidung,$created_at, $update_at){
    $conn=connectdb();
     $sql = "INSERT INTO tbl_contact(name, sđt, email, noidung, created_at, update_at) VALUES ('$name', '$sđt', '$email', '$noidung', '$created_at', '$update_at')";
     // use exec() because no results are returned
    $conn->exec($sql);
 }
 function getall_contact(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_contact");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function delcontact($id){
    $conn=connectdb();
    $sql = "DELETE FROM tbl_contact WHERE id=".$id;
    $conn->exec($sql);

}
?>