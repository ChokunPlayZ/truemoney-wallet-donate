<?php
include "./config.php";
include "./api/submit.php";

// By ChokunPlayZ
// TikTok: @realchokunplayz
// YouTube: ChokunPlayZ
// Instragram : @chokunplayz
?>

<!-- 
By ChokunPlayZ
TikTok: @realchokunplayz
YouTube: ChokunPlayZ
Instragram : @chokunplayz 
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo($title_name); ?></title>
        <link rel="stylesheet" href="<?php echo($web_url); ?>assets/style.css">
    </head>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="<?php echo($web_url); ?>">
                <strong><?php echo($site_name); ?></strong>
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
            <a class="navbar-item" href="<?php echo($web_url); ?>">
                หน้าหลัก
            </a>
        </div>
    </nav>
    <body>
        <section class="hero is-fullheight has-background-primary">
            <div class="hero-body">
                <div class="container">
                    <div class="box">
                        <form method="post" enctype="multipart/form-data">
                            <div class="field">
                                <label class="label">ชื่อ</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-success" name="dusername" type="text" placeholder="Name" <?php if(isset($_COOKIE["Username"])){echo('value="'.$_COOKIE["Username"].'"');}?> required>
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">ลิงค์ของขวัญ Truemoney Wallet</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-info" name="gift-link" type="text" placeholder="Gift Link" required>
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-gift"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">ข้อความ</label>
                                <div class="control has-icons-left has-icons-right">
                                    <textarea class="textarea is-success" name="smsg" placeholder="Message"></textarea>
                                </div>
                            </div>

                            <br><br>
                            <label class="checkbox">
                                <input type="checkbox" name="remember-username">
                                จดจำชื่อที่ใช้โดเนท
                            </label><br>
                            <br><br>
                            <div class="control">
                                <button class="button is-link" name="send" value="Send">โดเนท</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 
include "./assets/footer.php";
?>
    <script>
            <?php 
            if (isset($_GET['result'])) {
                if ($_GET['result'] == "1") {
                    echo 'swal({title: "สำเร็จ",text: "ส่งข้อความแล้ว ขอบคุณที่สนับสนุนผลงานผมนะครับ :)",icon: "success",button: "ปิด",}).then(function() {window.location = "'.$web_url.'";});';
                }elseif ($_GET['result'] == "2") {
                    echo 'swal({title: "เกิดข้อผิดพลาด",text: "เกิดข้อผิดพลาดที่ไมทราบสาเหตุ",icon: "error",button: "ปิด",}).then(function() {window.location = "'.$web_url.'";});';
                }
                elseif ($_GET['result'] == "3") {
                    echo 'swal({title: "เกิดข้อผิดพลาด",text: "ลิงค์ของขวัญไม่ถูกต้อง",icon: "error",button: "ปิด",}).then(function() {window.location = "'.$web_url.'";});';
                }
                elseif ($_GET['result'] == "4") {
                    echo 'swal({title: "เกิดข้อผิดพลาด",text: "ลิงค์ของขวัญถูกใช้งานไปแล้ว",icon: "error",button: "ปิด",}).then(function() {window.location = "'.$web_url.'";});';
                }
                elseif ($_GET['result'] == "5") {
                    echo 'swal({title: "เกิดข้อผิดพลาด",text: "ระบบตรวจเจอความผิดปรกติ กรุณาลองอีกครั้ง",icon: "error",button: "ปิด",}).then(function() {window.location = "'.$web_url.'";});';
                }
                elseif ($_GET['result'] == "6") {
                    echo 'swal({title: "เกิดข้อผิดพลาด",text: "ฟอร์มมีปัญหา กรุณาลองอีกครั้ง",icon: "error",button: "ปิด",}).then(function() {window.location = "'.$web_url.'";});';
                }
            }
            // By ChokunPlayZ
            // TikTok: @realchokunplayz
            // YouTube: ChokunPlayZ
            // Instragram : @chokunplayz
            ?>
        </script>