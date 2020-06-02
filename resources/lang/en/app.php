<?php

$file = resource_path().'/lang/en/app.json';
$data = \File::get($file);
$arr = json_decode($data,true);


return $arr;