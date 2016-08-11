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
    $this->publiFilePath = $this->ci->get('settings')['publiFilePath'];
  }

  public function show(Request $request, Response $response, $args)
  {
    $fileName = $args['filename'];

    $response->withHeader('Content-Type', 'content-type: image/png');

    echo '<img src="'.$_SERVER['HTTP_REFERER'].$this->picturePath.$fileName.'"/>';
  }

  public function upload(Request $request, Response $res, $args)
  {
    $putdata = fopen('php://input', 'r');

    $fp = fopen($this->publiFilePath.'myputfile.jpg', 'x');

    $data = $request->getBody();

    while ($data = fread($putdata, 1024)) fwrite($fp, $data);

    fclose($fp);
    fclose($putdata);
  }

  public function getUrl($filename)
  {
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
      $http = 'https';
    } else {
      $http = 'http';
    }

    return $http . '://' . $_SERVER['HTTP_HOST']. $this->picturePath . $filename;
  }
}
