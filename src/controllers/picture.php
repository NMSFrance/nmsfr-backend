<?php
use Interop\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Created by PhpStorm.
 * User: gay_k
 * Date: 02/08/2016
 * Time: 21:33
 */
class Picture
{
  /**
   * @var
   */
  private $ci;

  /**
   * @var string
   */
  private $picturePath;

  public function __construct(ContainerInterface $ci)
  {
    $this->ci = $ci;
    $this->picturePath = $this->ci->get('settings')['picturePath'];
  }

  public function show(Request $request, Response $response, $args)
  {
    $fileName = $args['filename'];

    $image = file_get_contents($fileName, FILE_USE_INCLUDE_PATH);

    $fInfo = new finfo(FILEINFO_MIME_TYPE);

    $response->withHeader('Content-Type', 'content-type: ' . $fInfo->buffer($image));

    readfile($fileName, FILE_USE_INCLUDE_PATH);
  }
}