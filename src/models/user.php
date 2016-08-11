<?php
namespace src\models;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{

  protected $id;
  protected $name;
  protected $password;
  protected $email;
  protected $_s;
  protected $description;

}
