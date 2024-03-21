
<link rel="stylesheet" href="../css/binhluan.css">


<?php
include "Admin/model/connectdb.php";
include "Admin/model/binhluan.php";

session_start();
if (isset($_SESSION["id_user"]) && ($_SESSION["id_user"] > 0)) {
    if (isset($_SESSION["user"]) && ($_SESSION["user"] != "")) {
        $user = $_SESSION["user"];


    } else {
        $user = "";
    }
    if (isset($_SESSION["avt"]) && ($_SESSION["avt"] != "")) {
        $avt = $_SESSION["avt"];


    } else {
        $avt = "";
    }
    if (isset($_POST["guibinhluan"]) && ($_POST["guibinhluan"])) {
        //
        $idsp = $_SESSION["id_sp"];
        $id_user = $_SESSION["id_user"];
        $avt = $_SESSION["avt"];
        $user = $_POST['user'];
        $noidung = $_POST['noidung'];
        $date = date('Y-m-d H:i:s');

        thembinhluan($user,$id_user,$idsp, $noidung, $date, $avt);

    }
    $dsbl = getall_binhluan();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Binh luan</title>
        
        <link rel="stylesheet" href="../css/binhluan.css">
        <link rel="stylesheet" href="css/binhluan.css">
    </head>
    <style>
        
       
    </style>
    <body>
        <div class="" id="binhluan">
            <form action="binhluan.php" method="post">
                <img name="avt" src="<?= $avt ?>" alt="">
                <input type="text" name="user" value="<?= $user ?>">
                <textarea id="noidung" name="noidung" id="" cols="80" rows="2"></textarea>
                <input type="submit" value="Gửi bình luận" name="guibinhluan">
            </form>
        </div>
        <hr>
        <div id="shbinhluan">
            <?php
            foreach ($dsbl as $item) {
                echo '<img name="avt" src="' . $item['avt'] . '" alt="">
                ' . $item['user'] . '
                ' . ':' . '
                ' . $item['noidung'] . '
                ' . '<br>' . '
                ' . '<hr>' . '';
            }
            ?>
        </div>
        
      
       

        <hr>
    </body>

    </html>
    <?php
} else {
    $dsbl = getall_binhluan();
    echo '<div id="shbinhluan">';
    foreach ($dsbl as $item) {
        echo '<img name="avt" src="' . $item['avt'] . '" alt="">
        ' . $item['user'] . '
        ' . ':' . '
        ' . $item['noidung'] . '
        ' . '<br>' . '
        ' . '<hr>' . '';
    }
    echo '</div>';
    echo "<a href='login.php' target='_parent'>Bạn muốn bình luận.Vui lòng đăng nhập!</a>";
}
?>