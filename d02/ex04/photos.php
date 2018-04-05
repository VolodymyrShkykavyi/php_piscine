#!/usr/bin/php
<?php
function ft_get_site_url($str){
    preg_match('/https?:\/\/(.+?)\/?$/i', $str, $result);
    if (empty($result))
        return($str);
    return($result[1]);
}

function ft_get_data($url){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);    // allow redirects
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    $raw = curl_exec($ch);
    curl_close($ch);
    return($raw);
}

function ft_get_img_name($url){
    preg_match('#([^\/])*$#', $url, $match);
    return($match[0]);
}

function ft_save_img($url, $path){

    if (preg_match('#^http#', $url) == 0)
        return;
    $img = ft_get_data($url);
    $file = fopen(
             $path . "/" . escapeshellcmd(ft_get_img_name($url)),
        "w");
    if ($file) {
        fwrite($file, $img);
        fclose($file);
    }
}

function ft_create_dir($name){
    @mkdir($name, 0777);
}

function ft_get_site_name($site_url){
    preg_match('#^[^\/]*#', $site_url, $name);
    return($name[0]);
}

if ($argc != 2)
    exit(0);
$site_url = addslashes(ft_get_site_url($argv[1]));
$raw_html = ft_get_data($site_url);
$site_name = ft_get_site_name($site_url);

if (preg_match_all('/(?<=\<img)[^>]*src=\"([^"]*)/i', $raw_html, $tab_img_src)){
    ft_create_dir($site_name);
    foreach ($tab_img_src[1] as $value){
        ft_save_img($value, $site_name);
    }
}
