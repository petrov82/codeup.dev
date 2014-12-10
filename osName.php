<?php


$butts = $_SERVER['HTTP_USER_AGENT'];
$gooch = strstr($butts, ';');
$fanny = substr($gooch, 2, 21);

// var_dump($butts);
// echo "$butts";
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Box Model Exercise</title>
    <link rel="stylesheet" href="../css/site.css">
</head>

<body>
    <div id="greenbox" style="color: black; height: 100px; width: 100px;">
            <? echo "You are running: $butts"; ?>
    </div>
</body>
