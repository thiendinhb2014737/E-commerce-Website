<div class="box">
    <img src="../img/next-img.png" alt="">
</div>

<!--Main-->
<div id="main-content">
    <div id="content">

        <div id="img-sale">
            <img src="../img/ad1.png" alt="">
            <p class="my-5">Sản phẩn thời trang DingVog mang phong cách thời trang hiện đại. Xu hướng tiếp cận ngành
                công nghiệp thời trang bền vững có thể phục vụ nhiều nhu cầu trang phục ở nhiều lứa tuổi khác nhau.</p>
            <img src="../img/ad2.png" alt="">

        </div>
    </div>
    <div id="info" class="col-12 bg-light">
        <div class="headline">
            <div>
                <h3>Thông tin tài khoản quản trị</h3>
            </div>
            <?php
            $user = getuserinfo($_SESSION['id']);
            echo '
                    <form action="index.php?act=updateaccount" method="post" enctype="multipart/form-data">
                    <div class=" my-5 mx-3">
                        <label class="col-4 my-2 mx-2" for="name">Ảnh đại diện của bạn</label><br>
                        <img src="' . $user[0]['avt'] . '" width="80px">
                    </div>
                    
                    <div class="row form-group my-5 mx-3">
                      <label class="col-4 text-primary " for="name">Tên người dùng</label>
                      <input class="col-6" type="text" name="name" placeholder="' . $user[0]['name'] . '"/>
                    </div>
                    <div class="row form-group my-5 mx-3">
                        <label class="col-4 text-primary" for="email">Tài khoản người dùng</label>
                        <input class="col-6" type="text" name="user" placeholder="' . $user[0]['user'] . '"/>
                    </div>
                    <div class="row form-group my-5 mx-3">
                        <label class="col-4 text-primary" for="email">Email người dùng</label>
                        <input class="col-6" type="text" name="email" placeholder="' . $user[0]['email'] . '"/>
                    </div>
                    <div class="row form-group my-5 mx-3">
                        <label class="col-4 text-primary">Địa chỉ người dùng</label>
                        <textarea class="col-6" rows="6" name="address" placeholder="' . $user[0]['address'] . '"></textarea>
                    </div>
                    <a class="btn btn-secondary" href="index.php?act=updateaccount&id=' . $user[0]['id'] . '">Chỉnh Sửa</a>
                    </form>
                      ';

            ?>
        </div>
        
    </div>
    
    

    <!--End-Main-->
    
</div>
