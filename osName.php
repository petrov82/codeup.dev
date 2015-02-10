<?php


$uagent = $_SERVER['HTTP_USER_AGENT'];
$foo = '';
$browser = '';

function check_browser()
{
    $uagent = $_SERVER['HTTP_USER_AGENT'];

    if (strpos($uagent, 'MSIE') !== FALSE) {
        return "Internet Explorer.";
    } elseif (strpos($uagent, 'Firefox') !== FALSE) {
        return "Firefox.";
    } elseif ( (strpos($uagent, 'Chrome') !== FALSE) && (strpos($uagent, 'Safari') !== TRUE)) {
        return "Chrome.";
    } elseif (strpos($uagent, 'Opera') !== FALSE) {
        return "Opera.";
    } elseif ( (strpos($uagent, 'Safari') !== FALSE) && (strpos($uagent, 'Chrome') !== TRUE) ) {
        return "Safari.";
    } else {
        return "some strange sort of magick.";
    }
};

$browser = check_browser($uagent);
var_dump($uagent);
// echo "$uagent";

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check your Browser</title>
    <link rel="stylesheet" href="">
</head>

<body>
    <div>
            <? echo "You are running $browser"; ?>
    </div>
</body>
