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
    $username = $request->getParsedBody()['name'];
    $password = $request->getParsedBody()['password'];
    $email = $request->getParsedBody()['email'];

    $salt = uniqid(mt_rand(), true) . '@';

    $cp = crypt($password, $salt);

    $user = new UserModel();
    $user->name = $username;
    $user->password = $cp;
    $user->email = $email;
    $user->_s = $salt;
    $user->save();

    return $res->withJson($user);
  }

  public function login(Request $request, Response $res, $args)
  {
    $username = $request->getParsedBody()['name'];
    $email = $request->getParsedBody()['email'];
    $password = $request->getParsedBody()['password'];

    $login = (empty($username)) ? $email : $username;

    $user = $this->table
      ->where('users.name', '=', $login)
      ->orWhere('users.email', '=', $login)
      ->get();

    if(hash_equals($user[0]->password, crypt($password, $user[0]->_s))) {
      $token = array(
        'iss' => $user[0]->id
      );
      $jwt = JWT::encode($token, $this->ci->get('settings')['secretKey']);
      return $res->withJson(['token' => $jwt]);
    }

    // TODO : allo
    return $res->withJson(['lol' => $user[0]->password, 'lel' => crypt($password, $user->_s)]);
  }
}
