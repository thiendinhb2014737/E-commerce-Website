<?php
function thembinhluan($user,$id_user,$idsp,$noidung,$date,$avt){
    $conn=connectdb();
    $sql = "INSERT INTO tbl_comment (user, iduser, idsp,noidung, postdate, avt) VALUES ('".$user."','".$id_user."','".$idsp."','".$noidung."','".$date."','".$avt."')";
    // use exec() because no results are returned
    $conn->exec($sql);
}

function getall_binhluan(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_comment order by id desc");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function delcomment($id){
    $conn=connectdb();
    $sql = "DELETE FROM tbl_comment WHERE id=".$id;
    $conn->exec($sql);

}

?>