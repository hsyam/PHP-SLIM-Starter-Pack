<?php

namespace App\Controllers ;

//use \Psr\Http\Message\ServerRequestInterface as Request;
//use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Post ;
use Respect\Validation\Validator as V ;
class PostController extends Controller {
    public  function index(Request $request , Response $response){
        $posts = Post::all();

        return $response->withJson($posts);
    }

    public  function store(Request $request , Response $response){

        $body = $request->getParsedBody();
        $validator = $this->validator->validate($request , [
            'title' => V::notEmpty(),
            'body' => V::notEmpty(),
        ]);
        if (!$validator->isValid()) {
            $errors = $validator->getErrors();
            return $response->withStatus(401)->withJson(
                [
                    'message' => 'Validation Error' ,
                    'errors' => $errors
                ]
            );
        }

        $post = new Post();
        $post->title = $body['title'];
        $post->body = $body['body'];

        if ($post->save()){
            $res = [
                'status'    => true ,
                'message'   => 'Post Added' ,
                'post' => $post
            ];
        }else {
            $res = [
                'status'    => false ,
                'message'   => 'Post Not Added' ,
            ];
        }

        return $response->withJson($res);
    }
    public function update(Request $request , Response $response , array $args){
        $body = $request->getParsedBody();
        $validator = $this->validator->validate($request , [
            'title' => V::notEmpty(),
            'body' => V::notEmpty(),
        ]);
        if (!$validator->isValid()) {
            $errors = $validator->getErrors();
            return $response->withStatus(401)->withJson(
                [
                    'message' => 'Validation Error' ,
                    'errors' => $errors
                ]
            );
        }

        $post = Post::find($args['id']);
        if(!$post){
            return $response->withStatus(404)->withJson([
                'message'=>'Post Not Found'
            ]);
        }
        $post->title = $body['title'];
        $post->body = $body['body'];
        if ($post->save()){
            return $response->withJson([
                'status'    => true ,
                'message'   => 'Post Edited' ,
                'post' => $post
            ]);
        }
    }

    public function destroy(Request $request , Response $response , array $args){
        $body = $request->getParsedBody();
        $post = Post::find($args['id']);
        if(!$post){
            return $response->withStatus(404)->withJson([
                'message'=>'Post Not Found'
            ]);
        }

        if ($post->delete()){
            return $response->withJson([
                'status'    => true ,
                'message'   => 'Post Deleted' ,
            ]);
        }

    }
}