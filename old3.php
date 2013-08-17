<?php
include 'filters/effects.php';

$image = imagecreatefromjpeg("space.jpg");

$effects = new Effects($image, Effects::OLD3);

header("content-type: image/png");
imagepng($image);
imagedestroy($image);
