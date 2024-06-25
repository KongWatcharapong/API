<?php
function TMWGETINFO_GiftVoucher($hash = null) {
    if (is_null($hash)) return false;
	
    $ch = curl_init();
    $hash = explode('?v=',$hash)[1];
    $headers  = [
        'Content-Type: application/json',
        'Accept: application/json'
    ];
    curl_setopt($ch, CURLOPT_URL,"https://gift.truemoney.com/campaign/vouchers/$hash/verify");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);       
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt ($ch, CURLOPT_SSLVERSION, 7);
    curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1" );
    $result     = curl_exec ($ch);
    return json_decode($result,true);
}

TMWGETINFO_GiftVoucher("https://gift.truemoney.com/campaign/?v=XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");
?>
