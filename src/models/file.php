<?php
namespace src\models;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
  protected $id;
  protected $filename;
  public $timestamps = false;
}
