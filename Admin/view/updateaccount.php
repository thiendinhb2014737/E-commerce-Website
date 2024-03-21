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

        </div>
    </div>
    <div id="info" class="col-12">
        <div class="headline">

            <h2>CẬP NHẬT THÔNG TIN TÀI KHOẢN<h2>
                    <form action="index.php?act=updateaccount" method="post" enctype="multipart/form-data">
                        <div class="row form-group my-5 mx-3">
                            <input type="file" name="avt" id="">
                        </div>

                        <div class="row form-group my-5 mx-3">
                            <label class="col-4 " for="name">Tên của bạn</label>
                            <input class="col-6" type="text" name="name" value="<?= $kqone[0]['name'] ?>" />
                        </div>
                        <div class="row form-group my-5 mx-3">
                            <label class="col-4 " for="email">Tên tài khoản</label>
                            <input class="col-6" type="text" name="user" value="<?= $kqone[0]['user'] ?>" />
                        </div>
                        <div class="row form-group my-5 mx-3">
                            <label class="col-4 " for="email">Mật khẩu của bạn</label>
                            <input class="col-6" type="password" name="pass" />
                        </div>
                        <div class="row form-group my-5 mx-3">
                            <label class="col-4 " for="email">Mật khẩu mới</label>
                            <input class="col-6" type="password" name="pass_new" />
                        </div>
                        <div class="row form-group my-5 mx-3">
                            <label class="col-4 " for="email">Email của bạn</label>
                            <input class="col-6" type="text" name="email" value="<?= $kqone[0]['email'] ?>" />
                        </div>
                        <div class="row form-group my-5 mx-3">
                            <label class="col-4 ">Địa chỉ</label>
                            <textarea class="col-6" rows="6" name="address"
                                value="<?= $kqone[0]['address'] ?>"></textarea>
                        </div>
                        
                            <input id="capnhat" type="submit" name="capnhat" value="Cập nhật">
                       
                    </form>
                    <br>

        </div>

    </div>

    <!--End-Main-->
</div>


<div>

</div>