<!DOCTYPE html>
<html lang="en">
<head>
<?php
// بيانات التوثيق
$consumerKey = 'qqALVCmwgv9ASdxbR0Bg0kykj';
$consumerSecret = 'c4Ctt0sCLV8QsYZEY5Kb0CnC9FTCc2sHXF3MmMWUWCEUYNVtt7';
$accessToken = '1924323504909938688-CvOz5Vi6vGkgJug23OTiRnOBEatGOY';
$accessTokenSecret = 'icWasORnP6eKLfhyBPVGAz8YNwb2GlFDyEJvsRr9HYIGH';

// نص التغريدة
$tweet = 'هذه تغريدة تجريبية باستخدام cURL و OAuth 1.0a';

// إعداد البيانات لتوقيع OAuth
$oauth = [
    'oauth_consumer_key'     => $consumerKey,
    'oauth_nonce'            => (string)mt_rand(),
    'oauth_signature_method' => 'HMAC-SHA1',
    'oauth_token'            => $accessToken,
    'oauth_timestamp'        => time(),
    'oauth_version'          => '1.0'
];

$baseParams = $oauth;
$baseParams['status'] = $tweet;

ksort($baseParams);

$baseInfo = buildBaseString("https://api.twitter.com/1.1/statuses/update.json", 'POST', $baseParams);
$compositeKey = rawurlencode($consumerKey) . '&' . rawurlencode($accessTokenSecret);
$oauth['oauth_signature'] = base64_encode(hash_hmac('sha1', $baseInfo, $compositeKey, true));

$header = [
    buildAuthorizationHeader($oauth),
    'Expect:'
];

$options = [
    CURLOPT_HTTPHEADER => $header,
    CURLOPT_HEADER => false,
    CURLOPT_URL => "https://api.twitter.com/1.1/statuses/update.json",
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => http_build_query(['status' => $tweet]),
];

$ch = curl_init();
curl_setopt_array($ch, $options);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode == 200) {
    echo "✅ تم نشر التغريدة!";
} else {
    echo "❌ فشل في نشر التغريدة. رمز HTTP: $httpCode\n";
    echo "الرد:\n$response";
}

// دوال المساعدة
function buildBaseString($baseURI, $method, $params) {
    $r = [];
    foreach ($params as $key => $value) {
        $r[] = "$key=" . rawurlencode($value);
    }
    return $method . "&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
}

function buildAuthorizationHeader($oauth) {
    $r = 'Authorization: OAuth ';
    $values = [];
    foreach ($oauth as $key => $value) {
        $values[] = "$key=\"" . rawurlencode($value) . "\"";
    }
    $r .= implode(', ', $values);
    return $r;
}
?>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>