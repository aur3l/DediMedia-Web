<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;
class Controller {

    protected $container;

    function __construct($container) {
      $this->container = $container;
    }

    function render($response, $file, $params= []) {
      return $this->container->view->render($response,$file,$params);
    }

    function redirect($response, $name, $args=[]) {
      return $response->withStatus(302)->withHeader('Location', $this->container->router->pathFor($name,$args));
    }

    //Rezise multi tailles
    function multiRezise($src, $name, $dest="tmp", $size=[], $style =null) {
      $sizes = $this->container->sizes;
      if($size == null)
      {
        foreach ($sizes as $key => $value) {
          $dir = dirname(dirname(__DIR__));
          $url = $dir.'/public/'.$dest.'/'.$name.'_'.$key.$style.'.jpg';
          $urlNo = '/'.$dest.'/'.$name.'_'.$key.$style.'.jpg';
          if(file_exists($url)){
            $new[$key] = $urlNo;
          }
          else{
            $img = $this->container->resize->make($src);
            $img->resize($value, null, function ($constraint) {$constraint->aspectRatio();});
            $img->save($url);
            $new[$key] = $urlNo;
          }
        }
      }
      else{
        foreach ($size as $key => $value) {
          $dir = dirname(dirname(__DIR__));
          $url = $dir.'/public/'.$dest.'/'.$name.'_'.$value.$style.'.jpg';
          $urlNo = '/'.$dest.'/'.$name.'_'.$value.$style.'.jpg';
          if(file_exists($url)){
            $new[$value] = $urlNo;

          }
          else{
            $img = $this->container->resize->make($src);
            $img->resize($sizes[$value], null, function ($constraint) {$constraint->aspectRatio();});
            $img->save($url);
            $new[$value] = $urlNo;
          }
        }
      }
      return $new;
    }

    // Array Reverse Recursive
    function ReverseArray($arr) {
      foreach ($arr as $key => $val) {
        if (is_array($val))
          $arr[$key] = $this->ReverseArray($val);
        }
      return array_reverse($arr, TRUE);
    }

    // Afficher un tableau avec pre.
    function getArray($array){
      echo "<pre>";
      print_r($array);
      echo "</pre>";
      die();
    }
    function rgb2hex($rgb) {
      return '#' . sprintf('%02x', $rgb['0']) . sprintf('%02x', $rgb['1']) . sprintf('%02x', $rgb['2']);
    }

}
