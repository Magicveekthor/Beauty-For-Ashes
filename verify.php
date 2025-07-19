<?php
if(!isset($_GET['reference'])) {
    die('No reference supplied');
}

$reference = $_GET['reference'];
$secretKey = 'sk_live_7732f8df64fd3fd20f3582ec092df63bd241c2a0';

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer $secretKey",
        "Cache-Control: no-cache",
    ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    die("Curl Error: $err");
}

$result = json_decode($response, true);

if ($result['status'] && $result['data']['status'] === 'success') {
    #Payment was successful
    $amount = $result['data']['amount'] / 100;
    $email = $result['data']['customer']['email'];
    echo "<h2>Payment Successful</h2>";
    echo "Email: $email <br>";
    echo "Amount: ₦$amount <br>";
    echo "Reference: " . $result['data']['reference'];
}  else {
    echo "<h2>Payment Failed or Unverified</h2>";
}