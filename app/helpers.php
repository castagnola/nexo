<?php

use Carbon\Carbon;

if (!function_exists('webpack')) {
    /**
     * Get the path to a versioned Webpack file.
     *
     * @param  string $extension
     * @param  string $bundle
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    function webpack($extension, $bundle = 'vendor')
    {
        static $manifest = null;
        if (is_null($manifest)) {
            $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
        }
        if (isset($manifest[$bundle][$extension])) {
            $url = url($manifest[$bundle][$extension]);

            $tag = null;


            switch ($extension) {
                case 'css':
                    $tag = \Collective\Html\HtmlFacade::style($url);
                    break;
                case 'js':
                    $tag = \Collective\Html\HtmlFacade::script($url);
                    break;
            }
            return $tag;
        }

        return false;
    }
}

if (!function_exists('glob_recursive')) {
    // Does not support flag GLOB_BRACE
    function glob_recursive($pattern, $flags = 0)
    {
        $files = glob($pattern, $flags);
        foreach (glob(dirname($pattern) . '/*', GLOB_ONLYDIR | GLOB_NOSORT) as $dir) {
            $files = array_merge($files, glob_recursive($dir . '/' . basename($pattern), $flags));
        }
        return $files;
    }
}


if (!function_exists('impr')) {
    // show print
    function impr($arr)
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }
}

if (!function_exists('script')) {
    // show print
    function script($url)
    {
        return \Collective\Html\HtmlFacade::script($url);
    }
}

if (!function_exists('style')) {
    // show print
    function style($url)
    {
        return \Collective\Html\HtmlFacade::style($url);
    }
}

if (!function_exists('convertArray')) {
    function convertArray($table = '',$name='',$value='',$conditions = array()){
        $arr = array();
        $return = array();
        if(is_string($table)){
            $values = DB::table($table);
            $return = array();
            if(empty($conditions)){
                $conditions = array();
            }
            if(!empty($val)){
                $conditions[$value] = $val;    
            }
            if($conditions){
                foreach ($conditions as $k => $v) {
                    $values->where($k,'=',$v);
                }
            }
            $arr = $values->get();
        }else{
            $arr = $table;
        }
        if($arr){
            foreach ($arr as $k => $v) {
                    if($name){
                        $return[$v->$value] = $v->$name;    
                    }else{
                        $return[] = $v->$value;
                    }
                    
            }
            return $return;
        }
        return $return ;
    }
} 

if (!function_exists('geocodeAddress')) {
function geocodeAddress($address){

        $address = trim($address);
        $return = array();
        $geocode = '';
        $latitude = '4.6482837';
        $longitude = '-74.2478957';
        $prepAddr = str_replace(' ','+',$address);
        $prepAddr = str_replace('#','#%23',$prepAddr);
        $url = 'https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false&key=AIzaSyC2vBv3u8HF4pQbJ5kRMnh-GVPu22V_PE0'; 
        $geocode = file_get_contents($url);
        if($geocode){
            $output= json_decode($geocode);
            if($output){
                if($output->results){
                    $latitude = $output->results[0]->geometry->location->lat;
                    $longitude = $output->results[0]->geometry->location->lng;  
                    $return['latitude'] = $latitude;
                    $return['longitude'] = $longitude;
                    return $return;    
                }else{
                    return geocodeAddress($address);
                }
                
            }
        }

        $return['latitude'] = $latitude;
        $return['longitude'] = $longitude;
        return $return;
    }
}

if (!function_exists('setDate')) {
    function setDate($date, $format = 'd-m-Y', $default = 'Y-m-d H:i:s'){
        if($date){
            $dateFormat = Carbon::createFromTimeStamp(strtotime($date));
            return $dateFormat->format($format);    
        }else{
            return $date;
        }
        
    }
}

if (!function_exists('setLang')) {
    function setLang(){
        $user = Auth::user();
        $lang = $user->lang;
        App::setLocale($lang);
    }
}