<?php

use Interop\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;
use src\models\User as UserModel;

class User
{

  private $table;
  private $ci;

  public function __construct(ContainerInterface $ci)
  {
    $this->ci = $ci;
    $this->table = $this->ci->get('db')->table('users');
  }

  public function create(Request $request, Response $res, $args)
  {
    $username = $request->getAttribute('name');
    $password = $request->getAttribute('password');
    $email = $request->getAttribute('email');

    var_dump($request->getBody());

    $salt = uniqid(mt_rand(), true) . '@';

    $cp = crypt($password, $salt);

    $user = new UserModel();
    $user->name = $username;
    $user->password = $password;
    $user->email = $email;
    $user->_s = $salt;
    $user->save();

    return $res->withJson($user);
  }
}
