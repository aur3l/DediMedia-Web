<?php
namespace App\Controllers;

class SearchsController extends Controller {

  function home($request,$response, $args = []){
    $series = $this->container->tvdb->getSeries($request->getParam('term'));
    $array = [];
    foreach ($series as $key => $value ){
      $vals = get_object_vars($value);
      $array[] = array(
        'id' => $vals['id'],
        'value' => $vals['name'],
        'type' => "series"
      );;
    }
    
    /*echo "<pre>";
    print_r($array);
    echo "</pre>";
    die();*/
    return  $response->withJson($array);
  }

}

?>
