<?php
    session_start();
    $captcha_text = '';
    for ($i = 0; $i < 6; $i++) {
        $captcha_text .= chr(rand(97, 122));
    }
    $_SESSION['captcha'] = $captcha_text;
    $image = imagecreate(100, 30);
    $background_color = imagecolorallocate($image, 255, 255, 255);
    $text_color = imagecolorallocate($image, 0, 0, 0);
    imagestring($image, 5, 10, 10, $captcha_text, $text_color);
    header('Content-Type: image/png');
    imagepng($image);
    imagedestroy($image);
?>