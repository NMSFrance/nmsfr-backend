<?php
namespace src\controller;

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
  /**
   * @var ContainerInterface $ci
   */
  private $ci;

  public function __construct(ContainerInterface $ci)
  {
    $this->ci = $ci;
    $this->table = $this->get('db')->table('publication');
  }
}