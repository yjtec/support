<?php 
require __DIR__.'/../vendor/autoload.php';
use Yjtec\Support\Str;
echo (Str::random(16));


echo (Str::cc2('fontSize'));

echo (Str::uncc2('font-size'));
?>