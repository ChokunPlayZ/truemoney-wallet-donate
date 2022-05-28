<?php
include './config.php';

function SendLinenotifySuccess($name, $amount, $message, $donation_id) {

    include './config.php';

    $lmessage =  "\n";
    $lmessage .= "Name" . " : " . $name . "\n";
    $lmessage .= "Amount" . " : " . $amount . " THB \n";
    $lmessage .= "Message" . " : " . $message . "\n";
    $lmessage .= "Donation ID" . " : " . $donation_id . "\n";
    $lmessage .= "วันที่ : " . date('Y-m-d H:i:s') . "\n";
    $line_message = $lmessage;
    $opts = array(
        'http' => array(
        'method' => 'POST',
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n" . 'Authorization: Bearer ' . $line_token,
        'content' => 'message=' . $line_message
        )
    );
    $context = stream_context_create($opts);
    if (file_get_contents('https://notify-api.line.me/api/notify', false, $context)) {
        return 1;
    } else {
        return 0;

    }
}
function SendLinenotifyFail($name, $message, $twn_code, $errmsg) {

    include './config.php';

    $lmessage =  "\n";
    $lmessage .= "Name" . " : " . $name . "\n";
    $lmessage .= "Message" . " : " . $message . "\n";
    $lmessage .= "TWN Error Code" . " : " . $twn_code . " \n";
    $lmessage .= "ERR MSG" . " : " . $errmsg . "\n";
    $lmessage .= "วันที่ : " . date('Y-m-d H:i:s') . "\n";
    $line_message = $lmessage;
    $opts = array(
        'http' => array(
        'method' => 'POST',
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n" . 'Authorization: Bearer ' . $line_token,
        'content' => 'message=' . $line_message
        )
    );
    $context = stream_context_create($opts);
    if (file_get_contents('https://notify-api.line.me/api/notify', false, $context)) {
        return 1;
    } else {
        return 0;

    }
}
?>