<div id="bg_img">
    <h2>SẢN PHẨM<h2>
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

            <form id="forminfo" action="index.php?act=sanpham_add" method="post" enctype="multipart/form-data">
                <select name="iddm" id="">
                    <option value="0">Chọn danh mục</option>
                    <?php
                    if (isset($dsdm)) {
                        foreach ($dsdm as $dm) {
                            echo '<option value="' . $dm['id'] . '">' . $dm['tendm'] . '</option>';
                        }
                    }
                    ?>
                </select>

                <input type="text" name="tensp" id="" placeholder="Nhập tên sản phẩm">
                <input type="file" name="hinh" id="">
                <?php
                if (isset($uploadOk) && ($uploadOk == 0)) {
                    echo 'Yêu cầu nhập đúng file hình ảnh!';
                }
                ?>
                <input type="text" name="gia" id="" placeholder="Nhập giá sản phẩm">
                <input type="submit" name="themmoi" value="Thêm mới">
            </form>
            
            <form action="index.php?act=findsanpham" id="search-box-admin" method="post">
                
                    <input type="text" id="search-text" name="kyw" placeholder="Tìm kiếm sản phẩm">
                    <button id="search-btn" type="submit" name="timkiem"><i id="icon-find"
                            class="fa-solid fa-magnifying-glass text-white"></i></button>
               
            </form>
            <br>
            <table class="table table-active table-hover">
                <tr id="tensp">
                    <th class="col-3 col-sm-1">STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình hảnh</th>
                    <th>Giá sản phẩm</th>
                    <th>Hành động</th>
                </tr>

                <?php
                if (isset($kq) && (count($kq) > 0)) {
                    $i = 1;
                    foreach ($kq as $item) {
                        echo ' <tr>
                        <td class="col-3 col-sm-1">' . $i . '</td>
                        <td class=" btn btn-secondary"><b>' . $item['tensp'] . '</b></td>
                        <td><img src="' . $item['img'] . '" width="80px"></td>
                        <td>' . number_format($item['gia']) . '</td>
                        <td><a class="btn btn-secondary" href="index.php?act=updatespform&id=' . $item['id'] . '">Sửa</a> | <a class="btn btn-secondary" href="index.php?act=delsp&id=' . $item['id'] . '"">Xóa</a></td>
                    </tr>';
                        $i++;
                    }
                }
                ?>

            </table>
            <ul class="list_trang pagination justify-content-center">
                <?php
                $conn = connectdb();
                $sql = "SELECT * FROM tbl_sanpham WHERE 1";
                // Phân trang
                $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 24;
                $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($current_page - 1) * $item_per_page;

                $sql .= " order by id ASC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                $totalRecords = "SELECT * FROM tbl_sanpham";
                $result = $conn->query($totalRecords);
                $totalRecords = $result->rowCount();
                $totalPages = ceil($totalRecords / $item_per_page);

                for ($num = 1; $num <= $totalPages; $num++) {
                    echo '<li class="page-item"><a class="page-link" href="?act=sanpham&per_page=20&page=' . $num . '">' . $num . '</a></li>';
                }
                ?>
            </ul>
</div>