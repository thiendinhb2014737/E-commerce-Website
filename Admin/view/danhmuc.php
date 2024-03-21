<div id="bg_img">
    <h2>DANH MỤC<h2>
    <form action="index.php?act=adddm" method="post">
        <input type="text" name="tendm" id="">
        <input type="submit" name="themmoi" value="Thêm mới">
    </form>
    <br>
    <table class="table table-active table-hover">
        <tr id="tendm">
            <th class="stt">STT</th>
            <th class="tendn">Tên danh mục</th>
            <!--<th class="ut">Ưu tiên</th>-->
            <th class="ht">Hiển thị</th>
            <th class="hd">Hành động</th>
        </tr>
        <?php
            //var_dump($kq);
        ?>
    <?php
        if(isset($kq) && (count($kq)>0)){
            $i=1;
            $messagetext = "Ban có muốn xóa!";
            foreach ($kq as $dm) {
                echo ' <tr>
                        <td>'.$i.'</td>
                        <td class="btn btn-secondary"><b>'.$dm['tendm'].'</b></td>
                        <td>'.$dm['hienthi'].'</td>
                        <td><a class="btn btn-secondary"  href="index.php?act=updatedmform&id='.$dm['id'].'">Sửa</a> | <a class="btn btn-secondary"  href="index.php?act=deldm&id='.$dm['id'].'"  onclick="return confirm("'. $messagetext.'");">Xóa</a></td>
                    </tr>';
                    $i++;
            }
        }
    ?>   
       
    </table>
</div>