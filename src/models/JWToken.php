<?php

/**
 * Created by PhpStorm.
 * User: gay_k
 * Date: 01/08/2016
 * Time: 22:26
 */

use \Firebase\JWT\JWT;

class JWToken
{
  /**
   * @var string
   */
  private $secretKey;

  /**
   * JWToken constructor.
   */
  public  function __construct()
  {
    $container = new Container();
    $this->secretKey = $container->getContainer('secretKey');
  }

  /**
   *
   */
  public function encodeToken($user)
  {
    $token = array(
    );

    $jwt = JWT::encode($token, $this->secretKey);
  }

  /**
   *
   */
  public function decodeToken($token)
  {
    $decoded = JWT::decode($token, $this->secretKey, array('HS256'));
  }

}