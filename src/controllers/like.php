<?php

use Interop\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use src\models\Like as LikeModel;

/**
 * Created by PhpStorm.
 * User: gay_k
 * Date: 04/08/16
 * Time: 13:20
 */
class Like {
    /**
     * @var
     */
    private $ci;

    /**
     * @var string
     */
    private $picturePath;

    public function __construct( ContainerInterface $ci ) {
        $this->ci = $ci;
        $this->table = $this->ci->get('db')->table('like');
    }

    public function like( Request $request, Response $response, $args ) {
      $like = (new LikeModel())
        ->setPublicationId($args['publicationId'])
        ->setUserId(1)
        ->save();

       return json_encode($like);
    }

    public function dislike( Request $request, Response $response, $args  ) {

        $publicationId = $args['publicationId'];
        $userId = 1;

        $like = $this->table
            ->where('publication.id', '=', $publicationId)
            ->where('user_id', '=', $userId)
            ->delete();
    }
}