<?php
namespace src\models;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: gay_k
 * Date: 08/08/2016
 * Time: 19:59
 */
class Like extends Model
{

  /**
   * @var $user_id
   */
  protected $user_id;
  /**
   * @var $id
   */
  protected $id;
  /**
   * @var $publication_id
   */
  protected $publication_id;

  /**
   * @var bool
   */
  public $timestamps = false;

  /**
   * @return mixed
   */
  public function getUserId()
  {
    return $this->user_id;
  }

  /**
   * @param mixed $user_id
   * @return $this
   */
  public function setUserId($user_id)
  {
    $this->user_id = $user_id;

    return $this;
  }

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param mixed $id
   * @return $this
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * @return mixed
   */
  public function getPublicationId()
  {
    return $this->publication_id;
  }

  /**
   * @param mixed $publication_id
   * @return $this
   */
  public function setPublicationId($publication_id)
  {
    $this->publication_id = $publication_id;

    return $this;
  }
}