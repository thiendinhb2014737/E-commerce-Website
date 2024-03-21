<?php
function taodonhang($madh,$tongdonhang,$pttt,$hoten,$address,$email,$sđt,$date,$id_user){
    $conn=connectdb();
    $sql = "INSERT INTO tbl_order (madh, tongdonhang, pttt, hoten, address, email, sđt, date,id_user) 
    VALUES ('$madh', '$tongdonhang', '$pttt', '$hoten', '$address', '$email', '$sđt', '$date', '$id_user')";
    // use exec() because no results are returned
   $conn->exec($sql);
   $last_id = $conn->lastInsertId();
   return $last_id;

}
function addtocart($iddh,$idsp,$tensp,$img,$dongia,$soluong,$id_user){
    $conn=connectdb();
    $sql = "INSERT INTO tbl_cart (iddh,idsp,tensp,img,dongia,soluong,id_user) 
    VALUES ('$iddh', '$idsp', '$tensp', '$img', '$dongia', '$soluong', '$id_user')";
    // use exec() because no results are returned
   $conn->exec($sql);
   

}
function getshowcart($iddh){
    $conn=connectdb();
    
    $sql="SELECT * FROM tbl_cart WHERE iddh=".$iddh;
    
    //$sql.=" order by id DESC";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

function showcartinfo($id_user){
    $conn=connectdb();
    
    $sql="SELECT * FROM tbl_cart WHERE id_user=".$id_user;
    
    $sql.=" order by id DESC";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function showcart(){
    $conn=connectdb();
    
    $sql="SELECT tensp, count(tensp) as countsp FROM tbl_cart GROUP BY tensp ORDER BY countsp desc";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function getorderinfo($iddh){
    $conn=connectdb();
    
    $sql="SELECT * FROM tbl_order WHERE id_user=".$iddh;
    
    //$sql.=" order by id DESC";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function shorderinfo($id_user){
    $conn=connectdb();
    
    $sql="SELECT * FROM tbl_order WHERE id_user=".$id_user;
    
    $sql.=" order by id DESC";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function shorder($id_user){
    $conn=connectdb();
    
    $sql="SELECT * FROM tbl_order WHERE id_user=".$id_user;
    
    $sql.=" order by id DESC";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function getallorder(){
    $conn=connectdb();
    
    $sql="SELECT * FROM tbl_order";
    // Phân trang
    $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:8;
    $current_page = !empty($_GET['page'])?$_GET['page']:1;
    $offset = ($current_page - 1) * $item_per_page;
    
    $sql.=" order by id ASC LIMIT ".$item_per_page." OFFSET ".$offset."";
    $totalRecords = "SELECT * FROM tbl_order";
    $result = $conn->query($totalRecords);
    $totalRecords=$result->rowCount();
    $totalPages = ceil($totalRecords/$item_per_page);
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function shallorder($email){
    $conn=connectdb();
    
    $sql="SELECT * FROM tbl_order WHERE email=".$email; 
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function delorder($id){
    $conn=connectdb();
    $sql = "DELETE FROM tbl_order WHERE id=".$id;
    $conn->exec($sql);

}
function updateorder($id,$xacnhan){
    $conn=connectdb();
    $sql="UPDATE tbl_order SET xacnhan='".$xacnhan."' WHERE id=".$id;
    // use exec() because no results are returned
   $conn->exec($sql);
   

}

?>