<?php
namespace App\Controllers;

class PagesController extends Controller {

  function home($request,$response){
    //var_dump($this->container->sickrage->shows());
    //var_dump($this->container->couchpotato->getMediaList());
    $this->render($response,'pages/home.twig');
  }

}

?>
