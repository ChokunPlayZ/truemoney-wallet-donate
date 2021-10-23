<?php 
require ('./config.php');

// By ChokunPlayZ
// TikTok: @realchokunplayz
// YouTube: ChokunPlayZ
// Instragram : @chokunplayz 

class TMWAPI
{
    public function fetch($method = null, $url = null, $headers = array(), $data = null)
    {
        $this->url = $url;
        $this->headers = $headers;
        $this->data = $data;
        $this->method = $method;
        $fetch = curl_init();
        $headers = array("Content-Type" => "application/json");
        curl_setopt_array($fetch, [
            CURLOPT_URL => $this->url,
            CURLOPT_CUSTOMREQUEST => $this->method,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_PROXY => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => $this->buildHeaders($headers),
            CURLOPT_POSTFIELDS => $data
        ]);
        $this->response = curl_exec($fetch);
        curl_close($fetch);
        return $this->response;
    }

    public function buildHeaders($array)
    {
        $headers = array();
        foreach ($array as $key => $value) {
            $headers[] = $key . ": " . $value;
        }
        return $headers;
    }

    public function VoucherCode($Mobile = null, $voucher_code = null, $array = false)
    {
        $this->Mobile = $Mobile;
        $this->VoucherCode = $voucher_code;

        if (isset($this->VoucherCode) === true && $this->VoucherCode === "") {
            return $this->data_array(309, "gift not found", $array);
        } else if (isset($this->Mobile) === true && $this->Mobile === "") {
            return $this->data_array(308, "phone number not found please contact the administrator", $array);
        } else {
            $gift = str_replace("https://gift.truemoney.com/campaign/?v=", "", $this->VoucherCode);
            if (strlen($gift) <= 0) {
                return $this->data_array(307, "this is not a gift link", $array);
            }
            $res = json_decode($this->fetch("POST", "https://gift.truemoney.com/campaign/vouchers/{$gift}/redeem", null, json_encode(array("mobile" => $this->Mobile, "voucher_hash" => $this->VoucherCode))), true);
            $code = $res["status"]["code"];
            switch ($code) {
                case "SUCCESS":
                    $bath = $res["data"]["voucher"]["redeemed_amount_baht"];
                    return $this->data_array(200, 'success', $array, $bath);
                break;
                case "CANNOT_GET_OWN_VOUCHER":
                    return $this->data_array(301, 'you cannot use your own gift', $array);
                break;
                case "TARGET_USER_NOT_FOUND":
                    return $this->data_array(302, 'reciver phone number is invalid please contact administraotr', $array);
                break;
                case "VOUCHER_OUT_OF_STOCK":
                    return $this->data_array(304, 'this link is used', $array);
                break;
                case "VOUCHER_NOT_FOUND":
                    return $this->data_array(305, 'gift not found', $array);
                break;
                case "VOUCHER_EXPIRED":
                    return $this->data_array(306, 'gift expired', $array);
                break;
                case "INTERNAL_ERROR":
                    return $this->data_array(500, 'server error', $array);
                break;
                default:
                    return $this->data_array(404, "error 404", $array);
            }
        }
    }
        
    public function data_array($code, $message, $array = false, int $amount = 0){
        if($array){
            return [
                "code" => $code,
                "message" => $message,
                "amount" => $amount
            ];
        } else {
            return json_encode([
                "code"=>$code, 
                "message"=>$message, 
                "amount"=>$amount
            ]);
        }
    }

}
?>