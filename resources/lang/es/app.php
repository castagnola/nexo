<?php

$file = resource_path().'/lang/es/app.json';
$data = \File::get($file);
$arr = json_decode($data,true);

return $arr;