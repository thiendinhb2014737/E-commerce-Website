<div id="bg_img">
    <h2>CẬP NHẬT DANH MỤC<h2>
    <?php
        //echo var_dump($kqone);
    ?>
    <form action="index.php?act=updatedmform" method="post">
        <input type="text" name="tendm" id="" value="<?=$kqone[0]['tendm']?>">
        <input type="hidden" name="id" value="<?=$kqone[0]['id']?>">
        <input type="submit" name="capnhat" value="Cập nhật">
    </form>
    <br>
    <table class="table table-active table-hover">
        <tr id="tendm">
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>Ưu tiên</th>
            <th>Hiển thị</th>
            <th>Hành động</th>
        </tr>
        <?php
            //var_dump($kq);
        ?>
    <?php
        if(isset($kq) && (count($kq)>0)){
            $i=1;
            foreach ($kq as $dm) {
                echo ' <tr>
                        <td>'.$i.'</td>
                        <td class="btn btn-secondary"><b>'.$dm['tendm'].'</b></td>
                        <td>'.$dm['uutien'].'</td>
                        <td>'.$dm['hienthi'].'</td>
                        <td><a class="btn btn-secondary" href="index.php?act=updatedmform&id='.$dm['id'].'">Sửa</a> | <a class="btn btn-secondary" href="index.php?act=deldm&id='.$dm['id'].'">Xóa</a></td>
                    </tr>';
                    $i++;
            }
        }
    ?>   
       
    </table>
</div>