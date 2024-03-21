
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dangnhap2.css">
    <title>Thời trang thịnh hành</title>
</head>
<body>    
    <div id="wrapper">

        <!--Header-->
        <div >
            <div id="header">
            <a href="" id="logo">
                <img src="Images/Logo.png" alt="DingVog.vn">
            </a>

            <h2 id="Hello">DingVog xin chào!</h2>

            <nav class="container">
                <ul id="main-menu" class="justify-content-center">
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="about.php">Giới thiệu</a></li>
                    <li><a href="news.php">Tin tức</a></li>
                    <li><a href="contact.php">Liên hệ</a></li>
                    <li><a href="chat.php">Hỏi đáp</a></li>
                    <li><a href="index.php?act=cart">Giỏ hàng</a></li> 
                </ul>
                       
            </nav>
            <div id="login_">
                <a href="dangnhap.php">Đăng nhập</a>
            </div>
           
            </div>
        </div>
        <!--End-Header-->

        <!--Main-->
        <div id="main-content">
            
            <div id="content">
                
                <div id="img-sale">
                    <img src="Images/ad1.png" alt="">
                    <p class="my-5">Sản phẩn thời trang DingVog mang phong cách thời trang hiện đại. Xu hướng tiếp cận ngành công nghiệp thời trang bền vững có thể phục vụ nhiều nhu cầu trang phục ở nhiều lứa tuổi khác nhau.</p>
                       
                </div>
            </div>

            <div id="info">
              <main class="main">
                <!--Tạo ra 1 thanh ngăn cách header và thân-->
                <div class="gap-element clearfix " style="display:block; height:auto; padding-top:30px "></div> 
                <div class="center">
                  <div class="contain">
                    <h1 class="h1">Đăng Nhập</h1>
                    <form action="xuly.php" method="post">
                            <p><i class="fa-solid "></i> Nhập vào thông tin đăng nhập</p>
                        <div class="txt_field">
                          <input type="text" name="user" placeholder="Tên đăng nhập" required autofocus>
                        </div>
        
                        <div class="txt_field">
                            <input type="password" name="pass" placeholder="Password" required>
                        </div>
        
                        <div class="fogotpass">
                          Quên mật khẩu ?
                        </div>
                           
                          <input type="submit" name="dangnhap" value="Đăng nhập" class="sub" style="margin-bottom: 15px;">
                          <div class="signup_link">Chưa có tài khoản <a href="dangki.php">Đăng kí</a></div>
                    </form>
                  </div>
                </div>
                <div class="gap-element clearfix" style="display:block; height:auto; padding-top:30px "></div> 
            </main>
            <!--
            
            <script>
              const form = document.querySelector("form");
              form.addEventListener("submit", (event) => {
                event.preventDefault();
                alert("Đăng nhập thành công");
              });
            </script>
            -->
             </div>

             <div id="content">
                
                <div id="img-sale">
                    <img src="Images/ad2.png" alt="">
                    <p class="my-5">DingVog tự hào là ngành thời trang có thể mang đến sản phẩm thời trang phù hợp với mọi phong cách.</p>   
                </div>
            </div>
    
        <!--End-Main-->
    </div>
    <!--Footer-->
    <footer id="footer">
        <div>
            <img src="Images/Logo.png" alt="">
            <p>Thương hiệu thường trang uy tín hàng đầu Việt Nam</p>
            <i class="fa-solid fa-square-phone"></i> 0869 253 251<br>
            <a href=""><i class="fa-brands fa-facebook">Facebook</i></a><br>
            <i class="fa-solid fa-house"></i>Trần Hoàng Na, Ninh Kiều, Cần Thơ<br>
            
        </div>
        <p>Copyright &copy; by DingVog.vn</p>

    </footer>
    <!--End-Footer-->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
            // Tìm tất cả các li có sub-menu và thêm vào nó class has-child
            $('.sub-menu').parent('li').addClass('has-child');
        });
    </script>
</body>
</html>





