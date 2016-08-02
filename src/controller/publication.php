<?php

use Interop\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Created by PhpStorm.
 * User: gay_k
 * Date: 01/08/2016
 * Time: 23:10
 */
class Publication
{
  /**
   * @var
   */
  private $table;
  /**
   * @var ContainerInterface $ci
   */
  private $ci;

  public function __construct(ContainerInterface $ci)
  {
    $this->ci = $ci;
    $this->table = $this->ci->get('db')->table('publication');
  }

  public function get(Request $request, Response $response, $args)
  {
    $id = $args['id'];

    $publication = $this->table->find($id);

    return $response->withJson($publication);
  }
}