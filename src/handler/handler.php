<?php

/**
 * Created by PhpStorm.
 * User: gay_k
 * Date: 11/08/2016
 * Time: 21:36
 */
class Handler
{
  /**
   * @var int
   */
  protected $code;

  /**
   * @var array
   */
  private $error = [
      1000 => 'Utilisateur déjà utlisé',
      1001 => 'Adresse e-mail déjà utlisée',
      2000 => 'Impossible d\'upload l\'image',
    ];

  public function __construct($code)
  {
    $this->code = $code;
  }

  public function getError()
  {
    $error = [
      'status' => $this->error[$this->code]
    ];

    return $error;
  }

  public function getSuccess()
  {
    $success = [
      'success' => true,
    ];

    return $success;
  }
}