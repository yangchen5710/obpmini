<?php

require __DIR__ .'/vendor/autoload.php';

use Ycstar\Obpmini\Obp;

$config = [
    'appid' => 'xxxxxxx',
    'secret_key' => 'xxxxxxxxxxxxx',
    'public_key' => 'xxxxxxxxxxxxxxxxxx',
    'private_key' => 'xxxxxxxxxxxx',
];

$obp = new Obp($config);

$params = [
    'state' => 'YXNmX3Bh',
    "authCode" => '5fcb98cebb164b3ab81a4ff5a87bb48f'
];
$rs = $obp->getAccessToken($params);
echo $rs;

echo "\n";

$params = [
    'openId' => '02xj3r73k9auq4pk',
    'orderNo' => date('YmdHis').rand(1000, 9999),
    'orderPrdCode' => '202111181200001234',
    'orderPrdName' => 'xx',
    'totalAmount' => 8.68
];
$rs = $obp->createPerPay($params);
print_r($rs);
exit;
