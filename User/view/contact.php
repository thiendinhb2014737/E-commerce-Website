<div class="box">
            <img src="../img/next-img.png" alt="">
        </div>

        <!--Main-->
        <div id="main-content">
            
            <div id="content">
                <!-- Chức năng tìm kiếm-->
                <form action="index.php?act=products" id="search-box" method="post">
                    <div class="bg-white">
                        <input type="text" id="search-text" name="kyw" placeholder="Tìm kiếm sản phẩm">
                        <button id="search-btn" type="submit" name="timkiem"><i id="icon-find" class="fa-solid fa-magnifying-glass text-white"></i></button>
                    </div>
                </form>
                <div id="img-sale">
                    <img src="../img/img-ad10.png" alt="">
                    <p class="my-5">Sản phẩn thời trang DingVog mang phong cách thời trang hiện đại. Xu hướng tiếp cận ngành công nghiệp thời trang bền vững có thể phục vụ nhiều nhu cầu trang phục ở nhiều lứa tuổi khác nhau.</p>
                    <img src="../img/img-ad09.png" alt="">
                </div>
            </div>
            <hr/>
            <?php
            if(isset($_POST['lienhe'])){
                $data=array(
                    'name'=>$_POST['name'],
                    'sđt'=>$_POST['sđt'],
                    'email'=>$_POST['email'],
                    'noidung'=>$_POST['noidung'],
                    'created_at'=>date('Y-m-d H:i:s'),
                    'update_at'=>date('Y-m-d H:i:s'),
                    'update_by'=>1,
                    'status'=>1
                );
                
               insert_contact($data['name'],$data['sđt'],$data['email'],$data['noidung'],$data['created_at'],$data['update_at']);
               echo '<script>alert("Thông tin liên hệ của bạn đã được gửi! Xin cảm ơn!");</script>';
            }
            ?>
            <div class="row">
                <div id="contact" class=" col-8">
                    <h3>Liên hệ với chúng tôi!</h3>
                    <p class="bg-white">Chúng tôi mong muốn lắng nghe từ bạn. Hãy liên hệ với chúng tôi và một thành viên của chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất.</p>
                    <form act="" method="post">
                        <div class="row form-group my-5 mx-3">
                            <label class="col-4 " for="name">Tên của bạn</label>
                            <input class="col-5" type="text" name="name" placeholder="Tên của bạn"/>
                        </div>
                        <div class="row form-group my-5 mx-3">
                            <label class="col-4 " for="email">Số điện thoại của bạn</label>
                            <input class="col-5" type="text" name="sđt" placeholder="Số điện thoại của bạn"/>
                        </div>
                        <div class="row form-group my-5 mx-3">
                            <label class="col-4 " for="email">Email của bạn</label>
                            <input class="col-5" type="text" name="email" placeholder="Email của bạn"/>
                        </div>
                        <div class="row form-group my-5 mx-3">
                            <label class="col-3 ">Nội dung liên hệ</label>
                            <textarea class="col-8" rows="6" name="noidung" ></textarea>
                        </div>
                        <div class="row form-group my-5 mx-3">
                            <button type="submit" name="lienhe" class="col-2 text-center btn btn-sm btn-success">Liên hệ</button>
                        </div>
                       
                    </form>
                </div>
                <div class="col-4" id="map">
                    <h5 class="text-center my-3">Bản đồ</h5>
                    <p>
                        <a href="#">
                            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15729855.42909206!2d96.7382165931671!3d15.735434000981483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31157a4d736a1e5f%3A0xb03bb0c9e2fe62be!2zVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1445179448264" width="380" height="250" frameborder="0" style="border:0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <br />
                        </a>
                        <br />
                        <a href="#">Xem bản đồ</a>
                    </p>
                    <p class="text-center bg-white my-2 mx-3">
                        Hẻm 9, đường Trần Hoàng Na, phường Hưng Lợi, quận Ninh Kiều, thành phố Cần Thơ
                    </p>
                </div>
            </div>
            <hr/>
        <!--End-Main-->
    </div>