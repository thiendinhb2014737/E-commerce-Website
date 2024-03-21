<div id="bg_img">
    <h2>THÔNG TIN BÌNH LUẬN<h2>
            
    <table class="table table-active table-hover">
        <tr id="tensp">
            <th>STT</th>
            <th>Tên khách hàng</th>
            <th>ID sản phẩm</th>
            <th>Nội dung</th>
            <th>Thời gian</th>
            <th>Hành động</th>
        </tr>
    <?php
        if(isset($kq) && (count($kq)>0)){
            $i=1;
            foreach ($kq as $item) {
                echo ' <tr>
                        <td>'.$i.'</td>
                        <td>'.$item['user'].'</td>
                        <td class="text-danger"><b>'.$item['idsp'].'</b></td>
                        <td class="text-primary">'.$item['noidung'].'</td>
                        <td>'.$item['postdate'].'</td>
                        <td><a class="btn btn-secondary" href="index.php?act=delcomment&id='.$item['id'].'">Ẩn bình luận</a></td>
                    </tr>';
                    $i++;
            }
        }
    ?>
               
    </table>
</div>