<?php
use Zaachi\Image\Filter;
require '../vendor/autoload.php';

$image = imagecreatefromjpeg(isset($argv[1]) ? $argv[1] : "example.jpg");

$effects = (new Filter($image))->bubbles();

header("Content-type: image/png");
imagepng($image);
imagedestroy($image);
