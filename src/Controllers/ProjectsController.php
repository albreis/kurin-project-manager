<?php namespace Albreis\Kurin\Controllers;

use Albreis\Kurin\Repositories\ProjectsRepository;
use Albreis\Kurin\Traits\Cache;
use Albreis\Kurin\Traits\Request;
use Albreis\Kurin\Traits\Response;
use Exception;

/** @package Albreis\Kurin\Controllers */
class ProjectsController extends AbstractController {

  function index() {
    $cache = Cache::file(md5(Request::uri()), 60, function () {
      $request = json_decode(file_get_contents('php://input'));
      $projects = new ProjectsRepository;
      $limit = $request->limit ?? 20;
      $offset = $request->offset ?? 0;
      try {
        $result = $projects->getAll($limit, $offset);   
      }catch(Exception $e) {
        $result = $e->getMessage();
      }  
      return Response::json($result);
    });

    echo $cache;
  }
}