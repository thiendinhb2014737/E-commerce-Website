<div id="bg_img">
    <h2>THÔNG TIN ĐƠN HÀNG<h2>
    <div style="clear:both;"></div>
            <style type="text/css">
                ul.list_trang {
                    padding: 10px;
                    margin: 0;
                    list-style: none;
                }

                ul.list_trang li a {
                    color: #000;
                    font-size: 15px;
                    text-align: center;
                    text-decoration: none;
                    
                }
            </style>
     <div class="table-responsive-sm">        
    <table class="table table-active table-hover">
        <tr id="tensp"  >
            <th>STT</th>
            <th>Mã đơn hàng</th>
            <th>Tên người nhận</th>
            <th>Số điện thoại người nhận</th>
            <th>Địa chỉ người nhận</th>
            <th>Tổng đơn hàng (VNĐ)</th>
            <th>Ngày đặt hàng</th>
            <th>Trạng thái đơn hàng</th>
            <th>Hủy bỏ đơn hàng</th>
            <th>Xác nhận đơn hàng</th>
        </tr>
        
    
    <?php
        if(isset($orderinfo) && (count($orderinfo)>0)){
            $i=1;
            $tong=0;
            foreach ($orderinfo as $item) {
                $tong=$tong + $item['tongdonhang'];
                $dongia = $item['tongdonhang'];
                echo ' <tr>
                        <td>'.$i.'</td>
                        <td class="text-danger">'.$item['madh'].'</td>
                        <td>'.$item['hoten'].'</td>
                        <td>'.$item['sđt'].'</td>
                        <td>'.$item['address'].'</td>
                        <td>'.number_format($dongia).'</td>
                        <td>'.$item['date'].'</td>
                        <td class="text-success">'.$item['xacnhan'].'</td>
                        <td><a class="btn btn-secondary" href="index.php?act=delorder&id='.$item['id'].'">Hủy bỏ</a></td>
                        <td><a class="btn btn-secondary" href="index.php?act=updateorder&id='.$item['id'].'">Xác nhận</a></td>
                    </tr>';
                    $i++;
            }
            echo '<tr><td colspan="5">Tổng đơn hàng được đặt:</td><td colspan="1">'.number_format($tong).'&nbspVNĐ</td><td colspan="4"></td></tr>';
        }
    ?>
               
    </table>
    <div>
    <ul class="list_trang pagination justify-content-center">
            <?php
                $conn=connectdb();
                $sql="SELECT * FROM tbl_order WHERE 1";
                // Phân trang
                $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:24;
                $current_page = !empty($_GET['page'])?$_GET['page']:1;
                $offset = ($current_page - 1) * $item_per_page;
                
                $sql.=" order by id ASC LIMIT ".$item_per_page." OFFSET ".$offset."";
                $totalRecords = "SELECT * FROM tbl_order";
                $result = $conn->query($totalRecords);
                $totalRecords=$result->rowCount();
                $totalPages = ceil($totalRecords/$item_per_page);

            for ($num=1; $num<= $totalPages ; $num++) { 
                echo '<li class="page-item"><a class="page-link" href="?act=donhang&per_page=10&page='.$num.'">'.$num.'</a></li>';
            }
            ?>
            </ul>
</div>