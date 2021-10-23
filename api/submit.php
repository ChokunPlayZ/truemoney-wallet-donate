<?php
include './api/streamlabs_api.php';
include './api/linenoti.php';
include './api/tmw_api.php';
include './config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['dusername'];
    $giftlink = $_POST['gift-link'];
    $smsg = $_POST['smsg'];
            
    if(isset($_POST['remember-username'])) {
        setcookie("Username", $_POST['dusername'], 99999999999, "/");
    }

    if(!isset($_COOKIE["slabs_iden"])) {
        $streamlabs_identifier_gen = md5(uniqid(rand(), TRUE));
        setcookie("slabs_iden", $streamlabs_identifier_gen, 99999999999, "/");
    }

    if(!isset($_COOKIE["slabs_iden"])) {
        setcookie("Credit", "Made By ChokunPlayZ", 99999999999, "/");
    }
    
    $tmgift = new TG();
    $trequest = $tmgift->VoucherCode('0635414659', $giftlink, true);
    if ($trequest['code'] === 200) {
        header("Location: ".$web_url."?result=1");
        $slabs_iden = $_COOKIE["slabs_iden"];
        $donations = json_decode(postStreamlabsDoantion($username, $slabs_iden, $trequest['amount'], $smsg), true)["donation_id"];
        SendLinenotifySuccess($username, $trequest['amount'], $smsg, $donations);
        echo($trequest['amount']);
        return;
    } elseif ($trequest['code'] === 301) {
        header("Location: ".$web_url."?result=2");
        return;
    } elseif ($trequest['code'] === 302) {
        header("Location: ".$web_url."?result=2");
        return;
    } elseif ($trequest['code'] === 304) {
        header("Location: ".$web_url."?result=4");
        return;
    } elseif ($trequest['code'] === 305) {
        header("Location: ".$web_url."?result=3");
        return;
    } elseif ($trequest['code'] === 306) {
        header("Location: ".$web_url."?result=3");
        return;
    } elseif ($trequest['code'] === 307) {
        header("Location: ".$web_url."?result=3");
        return;
    } elseif ($trequest['code'] === 308) {
        header("Location: ".$web_url."?result=2");
        return;
    } elseif ($trequest['code'] === 309) {
        header("Location: ".$web_url."?result=3");
        return;
    } elseif ($trequest['code'] === 404) {
        header("Location: ".$web_url."?result=2");
        return;
    } elseif ($trequest['code'] === 500) {
        header("Location: ".$web_url."?result=2");
        return;
    }
}
?>