<?php
include './config.php';
function postStreamlabsDoantion($name, $identifier, $amount, $smessage) {
    include './config.php';

    $url = "https://streamlabs.com/api/v1.0/donations";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
    "Content-Type: application/x-www-form-urlencoded",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = "name=".$name."&identifier=".$identifier."&amount=".$amount."&currency=THB&message=".$smessage."&access_token=".$streamlabs_access_token;

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);

    return $resp;

}
?>