<div id="bg_img">
    <h2>CẬP NHẬT SẢN PHẨM<h2>
    <form action="index.php?act=sanpham_update" method="post" enctype="multipart/form-data">
        <select name="iddm" id="">
            <option value="0">Chọn danh mục</option>
            <?php
                $iddmcur=$spct[0]['iddm'];
                if (isset($dsdm)) {
                    foreach ($dsdm as $dm) {
                        if($dm['id']==$iddmcur)
                            echo '<option value="'.$dm['id'].'" selected>'.$dm['tendm'].'</option>';
                        else
                            echo '<option value="'.$dm['id'].'">'.$dm['tendm'].'</option>';
                    }
                }
            ?>
        </select>
        <input type="text" name="tensp" id="" value="<?=$spct[0]['tensp']?>">
        <input type="file" name="hinh" id="" >
        <img src="<?=$spct[0]['img']?>" width=80 alt="">
        <?php
            if(isset($uploadOk)&&($uploadOk == 0)){
                echo 'Yêu cầu nhập đúng file hình ảnh!';
            }
        ?>
        <label>Giá</label>
        <input type="text" name="giacu" id="" value="<?=$spct[0]['giacu']?>" placeholder="Giá">
        <label>Giá khuyến mãi</label>
        <input type="text" name="gia" id="" value="<?=$spct[0]['gia']?>" placeholder="Giá khuyến mãi">
        <input type="hidden" name="id" value="<?=$spct[0]['id']?>">
        <input type="submit" name="capnhat" value="Cập nhật">
        
    </form>
    <br>
    <table border="1" class="table table-active table-hover">
        <tr id="tensp">
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình</th>
            <th>Giá cũ</th>
            <th>Giá mới</th>
            <th>Hành động</th>
        </tr>
        <?php
            //var_dump($kq);
        ?>
    <?php
        if(isset($kq) && (count($kq)>0)){
            $i=1;
            foreach ($kq as $item) {
                echo ' <tr>
                        <td class="col-3 col-sm-1">'.$i.'</td>
                        <td class=" btn btn-secondary"><b>'.$item['tensp'].'</b></td>
                        <td><img src="'.$item['img'].'" width="80px"></td>
                        <td>'.$item['giacu'].'</td>
                        <td>'.$item['gia'].'</td>
                        <td><a class=" btn btn-secondary" href="index.php?act=updatespform&id='.$item['id'].'">Sửa</a> | <a class=" btn btn-secondary" href="index.php?act=delsp&id='.$item['id'].'"">Xóa</a></td>
                    </tr>';
                    $i++;
            }
        }
    ?>   
    </table>
</div>