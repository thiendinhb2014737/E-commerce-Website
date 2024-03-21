<div id="bg_img">
    <h2>THÔNG TIN LIÊN HỆ<h2>
            
    <table class="table table-active table-hover">
        <tr id="tensp">
            <th>STT</th>
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Email khách hàng</th>
            <th>Nội dung</th>
            <th>Ngày</th>
            <th>Hành động</th>
        </tr>
    <?php
        if(isset($kq) && (count($kq)>0)){
            $i=1;
            foreach ($kq as $item) {
                echo ' <tr>
                        <td>'.$i.'</td>
                        <td>'.$item['name'].'</td>
                        <td><b>'.$item['sđt'].'</b></td>
                        <td>'.$item['email'].'</td>
                        <td class="text-primary">'.$item['noidung'].'</td>
                        <td>'.$item['created_at'].'</td>
                        <td><a class="btn btn-secondary" href="index.php?act=delcontact&id='.$item['id'].'">Xóa</a></td>
                    </tr>';
                    $i++;
            }
        }
    ?>
               
    </table>
</div>