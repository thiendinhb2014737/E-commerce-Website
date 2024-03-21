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
                <button id="search-btn" type="submit" name="timkiem"><i id="icon-find"
                        class="fa-solid fa-magnifying-glass text-white"></i></button>
            </div>
        </form>
        <div id="img-sale">
                <img src="../img/img-ad10.png" alt="">
                <p class="my-5">Sản phẩn thời trang DingVog mang phong cách thời trang hiện đại. Xu hướng tiếp cận ngành công nghiệp thời trang bền vững có thể phục vụ nhiều nhu cầu trang phục ở nhiều lứa tuổi khác nhau.</p>
                <img src="../img/img-ad09.png" alt="">
        </div>
    </div>

    <div class="container">
        <div class="row" id="video">
            <div class="col-sm-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <label for="">CHUNG THANH PHONG FASHION SHOW /PRE FALL 2023</label>
                        <a id="video" href="https://www.youtube.com/watch?v=kxFknVK6_s4"></a>
                    </li>
                    <li class="list-group-item">
                        <label for="">EXOTICA 2023 kỷ niệm 10 năm thành lập XITA by Katy Nguyen</label>
                        <a id="video" href="https://www.youtube.com/watch?v=Xn0dietKHUg"></a>
                    </li>
                    <li class="list-group-item">
                        <label for="">REWATCH the 71st MISS UNIVERSE Competition</label>
                        <a id="video" href="https://www.youtube.com/watch?v=rvzVumViRtg"></a>
                    </li>
                    <li class="list-group-item">
                        <label for="">Spring Summer 2024 Show</label>
                        <a id="video" href="https://www.youtube.com/watch?v=KU-iBVPz1Ww"></a>
                    </li>

                </ul>
            </div>
            <div class="col-sm-9" id="video-watcher"></div>
        </div>
        <div class="row">

        </div>
    </div>




    <script src="../js/youtube.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        const thumbnailify = function (videoLink) {
            const linkUrl = videoLink.prop("href");
            const thumbnailUrl = youtube.generateThumbnailUrl(linkUrl);

            const thumbnailImg = $("<img>");
            thumbnailImg.prop("src", thumbnailUrl);
            videoLink.append(thumbnailImg);

            videoLink.on("click", function (e) {
                e.preventDefault();

                const videoEmbed = $("<iframe></iframe>");
                videoEmbed.prop("src", youtube.generateEmbedUrl(linkUrl));
                videoEmbed.prop("width", 560);
                videoEmbed.prop("height", 315);

                const videoWatcher = $("#video-watcher");
                videoWatcher.html(videoEmbed);
                videoWatcher.fadeIn();

            });
        };

        //Duyệt qua các phần tử a, thumbnaility trên từng phần tử a
        $("a#video").each(function () {
            thumbnailify($(this));
        });
    </script>
    <div class="chat-bar-collapsible">

        <button id="chat-button" type="button" class="collapsible">Nhấn vào đây để chat!
            <img src="../img/Logo.png" alt="">
            <!--
                    <i id="chat-icon" style="color: #fff;" class="fa fa-fw fa-comments-o"></i>
                    -->
        </button>

        <div class="content">
            <div class="full-chat-block">
                <!-- Message Container -->
                <div class="outer-container">
                    <div class="chat-container">
                        <!-- Messages -->
                        <div id="chatbox">
                            <h5 id="chat-timestamp"></h5>
                            <p id="botStarterMessage" class="botText"><span>Loading...</span></p>
                        </div>

                        <!-- User input box -->
                        <div class="chat-bar-input-block">
                            <div id="userInput">
                                <input id="textInput" class="input-box" type="text" name="msg"
                                    placeholder="Bạn có câu hỏi nào không?">
                                <p></p>
                            </div>

                            <div class="chat-bar-icons">
                                <!--
                                            <i id="chat-icon" style="color: crimson;" class="fa fa-fw fa-heart"
                                            onclick="heartButton()"></i>
                                        -->

                                <i id="chat-icon" style="color: #333;" class="fa fa-fw fa-send"
                                    onclick="sendButton()"></i>
                            </div>
                        </div>

                        <div id="chat-bar-bottom">
                            <p></p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

    <div id="content">

        <div id="img-sale">
            <img src="../img/spct-img2.png" alt="">
            <p class="my-5">DingVog tự hào là ngành thời trang có thể mang đến sản phẩm thời trang phù hợp với mọi phong
                cách.</p>
            <img src="../img/img-ad12.png" alt="">
        </div>
    </div>

    <!--End-Main-->
</div>