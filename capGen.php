<?php
    header("Content-Type:image/png");
    $captchaCode = $_GET['captchaCode'];
    $image = @imagecreate(100,32)
    or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($image, 74,20,140);
$text_color = imagecolorallocate($image, 255,255,255);
imagestring($image, 3,25,8,$captchaCode, $text_color);
imagepng($image);
imagedestroy($image);
?>