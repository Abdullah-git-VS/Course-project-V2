<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require "vendor/autoload.php";

    use Abraham\TwitterOAuth\TwitterOAuth;

    $consumerKey = "ShWk0fiu0f1achz7IrVHzrMd8";
    $consumerSecret = "vSpIVYUv80rqzqJnubqgxhqN0Fg2pTMfivnLvjXHrku0UHD6Ys";
    $accessToken = "1924323504909938688-yPuYzH987lyL1qdNu0DQrd8C94x0lj";
    $accessTokenSecret = "CoJ3kiZplltIQwU8UxV0p9vOV72zHUJPD1F5S3VdUKrxw";

    $connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

    // ارفع تغريدة
    $post = $connection->post("statuses/update", ["status" => "هذه تغريدة تجريبية من PHP باستخدام Twitter API!"]);

    if ($connection->getLastHttpCode() == 200) {
        echo "تم رفع التغريدة بنجاح!";
    } else {
        echo "حدث خطأ!";
    }
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    

</body>

</html>