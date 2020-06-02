<?php

$file = resource_path().'/lang/pt/app.json';
$data = \File::get($file);
$arr = json_decode($data,true);

return $arr;