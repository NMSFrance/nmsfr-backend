<?php
use Interop\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use src\models\File as FileModel;

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
    $this->table = $this->ci->get('db')->table('files');
  }

  public function show(Request $request, Response $response, $args)
  {
    $fileName = $args['filename'];

    $response->withHeader('Content-Type', 'content-type: image/png');

    echo '<img src="'.$_SERVER['HTTP_REFERER'].$this->picturePath.$fileName.'"/>';
  }

  public function upload(Request $request, Response $res, $args)
  {
    $contentType = $request->getHeaders()['CONTENT_TYPE'];
    // TODO filter
    // TODO resize png & gif

    $putdata = fopen('php://input', 'r');

    $genName = uniqid(mt_rand(), false);
    $filename = $genName.'.'.explode('/', $contentType[0])[1];

    $fullFile = $this->publiFilePath.'f-'.$filename;
    $thumbFile = $this->publiFilePath.'t-'.$filename;

    $fp = fopen($fullFile, 'x');

    $data = $request->getBody();

    while ($data = fread($putdata, 1024)) fwrite($fp, $data);

    fclose($fp);
    fclose($putdata);

    copy($fullFile, $thumbFile);

    list($width, $height) = getimagesize($thumbFile);
    $ratio = $width / $height;

    $newWidth = 350; // max width
    $newHeight = $newWidth / $ratio;

    $thumb = imagecreatetruecolor($newWidth, $newHeight);
    $source = imagecreatefromjpeg($fullFile);

    imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    imagejpeg($thumb, $thumbFile);

    $file = new FileModel();
    $file->filename = $filename;
    $file->save();

    // TODO response
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
