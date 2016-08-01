<?php
namespace src\controller;

use Container;

/**
 * Created by PhpStorm.
 * User: gay_k
 * Date: 01/08/2016
 * Time: 23:10
 */
class publication
{
  /**
   * @var
   */
  private $table;

  public function __construct()
  {
    $container = new Container();
    $this->table = $container->getContainer('db')->table('publication');
  }
}