<?php
namespace App\Controllers;

class SearchsController extends Controller {

  function home($request,$response, $args = []){
    $medias = $this->container->tmdb->getSearchApi()->searchMulti($request->getParam('id'));
    //$this->getArray($medias);
    foreach ($medias['results'] as $key => $value ){
      if($value['media_type'] == "tv" or $value['media_type'] == "movie"){
        $name = ($value['media_type'] == "tv") ? $value['original_name'] : $value['title'];
        $array[] = array(
          'id' => $value['id'],
          'value' => $name,
          'type' => $value['media_type']
        );;
      }
    }
    return  $response->withJson($array);
  }

}

?>
