<?php
function rp($data){
    return "<div><span style='display:inline-block'>Rp.</span><span style='float:right;display:inline-block'>".number_format($data,0,',','.')."</span><div class='clear'></div></div>";
}
function dd($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
function url($url=null){
    $url = str_replace('.', '/', $url);
    $link = sprintf(
        "%s://%s%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME'],
        $_SERVER['REQUEST_URI']
    );
    if(CONTROLLER != null){
        $link = explode(CONTROLLER, $link)[0];
    }
    return $link.$url;
}
function redirect($url=null){
    $url = str_replace('.', '/', $url);
    return header('Location:'.url().$url);
}
function method($data,$callback=null){
    if($_SERVER['REQUEST_METHOD'] != strtoupper($data)){
      if(!$callback){
           die("Access Denied");
      }
      else {
           redirect($callback);
      }
    }
}
function session($key=null){
    if(!$key){
         return $_SESSION;
    }
    if(!isset($_SESSION[$key])){
         return null;
    }
    return $_SESSION[$key];
}
function view($D,$parram=[]){
    extract($parram);
    $D = str_replace('.','/',$D);
    return require BASEPATH.'App/Http/Views/'.$D.'.php';
}
function random($length = 16, $type = 'alnum'){
  $string = '';
  switch ($type) {
    case 'alnum':
      while (($len = strlen($string)) < $length) {
        $size = $length - $len;
        $bytes = random_bytes($size);
        $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
      }
      break;
      case 'alpha':
        $data = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        while (($len = strlen($string))< $length) {
          $string .= $data[rand(0, strlen($data)-1)];
        }
      break;
      case 'numeric':
          $data = "01234567890";
          while (($len = strlen($string))< $length) {
              $string .= $data[rand(0, 9)];
          }
          break;
      case 'md5':
          return md5(uniqid(mt_rand()));
      break;
      case 'hex':
          if (($length%2) != 0) {
              $string = "Length must be even";
          } else {
              $bytes = random_bytes($length/2);
              $string = bin2hex($bytes);
          }
          break;
      case 'binary':
          $string = random_bytes($length);
          break;
      default:
          $string = 'Your random type not found';
          break;
    }
    return $string;
}
function segment($n){
    if(!isset(SEGMENT[$n])){
        return "Segment Not Found";
    }
    return SEGMENT[$n];
}
