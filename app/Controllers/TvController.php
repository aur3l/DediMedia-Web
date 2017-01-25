<?php
namespace App\Controllers;
use ColorThief\ColorThief;
use Tmdb\Exception\TmdbApiException;
use Intervention\Image\ImageManager;

class TvController extends Controller {

  function home($request,$response){
    $data = [];
    $tvs = json_decode($this->container->sickrage->shows('name'), true);
    $data['tvs'] = $tvs['data'];
    foreach ($data['tvs'] as $key => $val) {
          $stats = json_decode($this->container->sickrage->showStats($val['tvdbid']));
          $data['tvs'][$key]['stats'] = json_decode(json_encode($stats->data), true);
          $data['tvs'][$key]['banner'] = $this->multiRezise($this->container->sickrage->showGetPoster($val['tvdbid']), $val['tvdbid'], "tmp/covers",['small']);
    }
    $this->render($response, 'tv/home.twig',$data);
  }

  function tv($request,$response, $args = []){
    $data = [];
    $id   = $args['tvdbId'];

    $serie = $this->ObjecttoArray($this->container->tvdb->getSerieEpisodes($id,"fr"));
    $data = $serie['serie'];
    $data = $this->ObjecttoArray($data);
    foreach ($serie['episodes'] as $key => $episode) {
      if($episode['thumbnail'] != null){
        $thumbnailLien = "http://thetvdb.com/banners/".$episode['thumbnail'];
        if(fopen($thumbnailLien, "r")){
            $thumbnail = $thumbnailLien;
        }
        else{
            $thumbnail = "http://thetvdb.com/banners/".$data['fanArt'];
        }
      }
      else{
        $thumbnail = "http://thetvdb.com/banners/".$data['fanArt'];
      }

      $dir = dirname(dirname(__DIR__));
      $url = $dir.'/public/tmp/thumbnail/'.$id.'_'.$key.'_thumbnail.jpg';
      $urlNo = '/tmp/thumbnail/'.$id.'_'.$key.'_thumbnail.jpg';

      if(!file_exists($url)){
        $img = $this->container->resize->make($thumbnail);
        $img->resize(227, null, function ($constraint) {$constraint->aspectRatio();});
        $img->crop(227, 127);
        $img->save($url);
      }

      $thumbnail = $urlNo;

      $data['seasons'][$episode['season']][$episode['number']] = [
        'name' => $episode['name'],
        'season' => $episode['season'],
        'number' => $episode['number'],
        'firstAired' => $episode['firstAired'],
        'overview' => $episode['overview'],
        'rating' => $episode['rating'],
        'ratingCount' => $episode['ratingCount'],
        'thumbnail' => $thumbnail
      ];
    }
    $actors = $this->ObjecttoArray($this->container->tvdb->getActors($id));
    $data['actors'] =[];
    foreach ($actors as $key => $actor) {
      if($key > 5) break;
      if($actor['image'] != null){
        $imageLien = "http://thetvdb.com/banners/".$actor['image'];
        $image = $this->multiRezise($imageLien, $actor['id'], "tmp/actors",['small']);
        $data['actors'][$key]['id'] = $actor['id'];
        $data['actors'][$key]['name'] = $actor['name'];
        $data['actors'][$key]['image'] = $image;
      }
    }

    $poster = $this->container->tvdb->getBannersFiltered($id, "poster");
    $nameposter = "http://thetvdb.com/banners/".$poster[0]->path;
    $data['poster_path'] = $this->multiRezise($nameposter, $id, "tmp/covers",['medium']);

    if(isset($this->getConfig()[$id]['palette'])) {
      $data['palette'] = $this->getConfig()[$id]['palette'];
    }
    else {
      $ColorThief = ColorThief::getPalette("http://".$_SERVER['SERVER_NAME'].$data['poster_path']['medium'], 4,25, array('w' => 200, 'h' => 294));

      foreach ($ColorThief as $key => $rgb) {
        $palette[$id]['palette'][$key] = $this->rgb2hex($rgb);
      }
      $send = $this->setConfig($palette);
      $data['palette'] = $send[$id]['palette'];
    }

    //$this->getArray($data);

    $this->render($response, 'tv/tv.twig',$data);
  }

  function episode($request,$response, $args){
    $data = [];
    $data['episode'] = json_decode($this->container->sickrage->shows('name'), true);
    $this->render($response, 'tv/episode.twig',$data);
  }

  function getPaused($request,$response, $args){
    if($this->container->sickrage->showPause($args['tvdbId'],$args['etat'])){
      $this->container->flash->addMessage('Flash', ($args['etat'] == 0) ? "La recherche des nouveaux épisodes reprend." : "La recherhe des nouveaux épisodes a été stopée.","warning");
    }
    return $this->redirect($response, 'tv', $args);
  }

  function getAdd($request,$response, $args){
    if($this->container->sickrage->showAddNew($args['tvdbId'])){
      $this->container->flash->addMessage('Flash', "La série est en cours d'ajout.");
    }
    return $this->redirect($response, 'tv', $args);
  }

  function getDelete($request,$response, $args){
    if($this->container->sickrage->showDelete($args['tvdbId'])){
      $this->container->flash->addMessage('Flash', "La série est en cours de suppression.");
    }
    return $this->redirect($response, 'tv', $args);
  }

}

?>
