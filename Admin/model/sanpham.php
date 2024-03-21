<?php

function insert_sanpham($iddm,$tensp,$gia,$img){
   $conn=connectdb();
    $sql = "INSERT INTO tbl_sanpham (iddm, tensp, gia, img) VALUES ('$iddm', '$tensp', '$gia', '$img')";
    // use exec() because no results are returned
   $conn->exec($sql);
}
function insert_sanphamct($id,$tensp,$gia,$img){
    $conn=connectdb();
     $sql = "INSERT INTO tbl_spchitiet (idsp, tensp, gia, img) VALUES ('$id', '$tensp', '$gia', '$img')";
     // use exec() because no results are returned
    $conn->exec($sql);
 }

function load_tendm($iddm){
    $sql = "SELECT * FROM tbl_danhmuc WHERE id=".$iddm;
    $dm=pdo_query_one($sql);
    extract($dm);
    return $name;
}
//function getall_sanpham(){
   // $conn=connectdb();
   // $stmt = $conn->prepare("SELECT * FROM tbl_sanpham");
   // $stmt->execute();
   // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
   // $kq=$stmt->fetchAll();
   // return $kq;
//}
function getall_sanpham($iddm=0,$kyw=""){
    $conn=connectdb();
    
    $sql="SELECT * FROM tbl_sanpham WHERE 1 ";
    if($iddm>0) $sql.=" AND iddm=".$iddm;
    if($kyw!="") $sql.=" AND tensp like '%".$kyw."%'";
    //$sql.=" order by iddm DESC";
    // Phân trang
    $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:24;
    $current_page = !empty($_GET['page'])?$_GET['page']:1;
    $offset = ($current_page - 1) * $item_per_page;
    
    $sql.=" order by id DESC LIMIT ".$item_per_page." OFFSET ".$offset."";
    $totalRecords = "SELECT * FROM tbl_sanpham";
    $result = $conn->query($totalRecords);
    $totalRecords=$result->rowCount();
    $totalPages = ceil($totalRecords/$item_per_page);

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function gettensp($kyw){
    $conn=connectdb();
    
    $sql="SELECT * FROM tbl_sanpham WHERE 1";
    if($kyw!="") $sql.=" AND tensp like '%".$kyw."%'";
    //$sql.=" order by id DESC";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

function showpro($ds){
    foreach ($ds as $sp) {
        if($sp['gia']==0){
            $gia="Đang cập nhật";
        }else{
            if($sp['giacu']>0){
                $gia='<del>$'.$sp['giacu'].'</del>$'.$sp['gia'];
            }else{
                $gia='$'.$sp['gia'];
            }
        }
        echo '<li>
                <div class="product-item">
                    <!--Sản phẩm-->
                    <div class="product-top">
                        <a href="" class="product-thumb">
                            <img src="../Upload/'.$sp['img'].'" alt="">
                        </a>
                        <!--Mua ngay-->
                        <a href="" class="buy-now">Mua ngay</a>
                            
                    </div>
                    <!--Thông tin sản phẩm-->
                    <div class="product-info">
                        <a href="" class="product-name">'.$sp['tensp'].'</a>
                        <div class="product-price">'.$gia.'</div>
                    </div>
                </div>
            </li>';
    }
}


function getonesp($id){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_sanpham WHERE id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function getonespchitiet($id){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_spchitiet WHERE id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function updatesp($id,$tensp,$img,$giacu,$gia,$iddm){
    $conn=connectdb();
    if($img==""){
        $sql="UPDATE tbl_sanpham SET tensp='".$tensp."',giacu='".$giacu."', gia='".$gia."', iddm='".$iddm."' WHERE id=".$id;
    }else{
        $sql="UPDATE tbl_sanpham SET tensp='".$tensp."',giacu='".$giacu."', gia='".$gia."', iddm='".$iddm."', img='".$img."' WHERE id=".$id;
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function delsp($id){
    $conn=connectdb();
    $sql = "DELETE FROM tbl_sanpham WHERE id=".$id;
    $conn->exec($sql);

}
function getUser($id){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

?>