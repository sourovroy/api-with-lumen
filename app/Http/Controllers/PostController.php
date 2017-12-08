<?php

namespace App\Http\Controllers;

use App\Post;
use Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Show posts with 20 paginations default
     */
    public function index(Request $request)
    {
        $postsModel = Post::make();

        $validator = $this->listValidate($request);

        if($validator->fails()){
            return $this->error($validator->errors()->first(), 422);
        }

        if($request->has('search')){
            $postsModel = $postsModel->search($request->input('search'));
        }

        if($request->has('order_by') && $request->has('sort')){
            $postsModel = $postsModel->orderBy($request->input('order_by'), $request->input('sort'));
        }else{
            $postsModel = $postsModel->orderBy('id', 'DESC');
        }

        if($request->has('with')){
        	$withs = $this->withsValidate($request);
        	if($withs === false){
        		return $this->error('The selected with is invalid.', 422);
        	}
        	$postsModel = $postsModel->with($withs);
        }

        if($request->has('per_page')){
        	$perPage = (int) $request->input('per_page');
            $posts = $postsModel->paginate($perPage);
        }else{
            $posts = $postsModel->paginate(20);
        }

        return $this->success($posts);
    } // index

    /**
     * Create a post
     */
    public function store(Request $request)
    {
        $validator = $this->saveValidate($request);

        if($validator->fails()){
            return $this->error($validator->errors()->first(), 422);
        }

        $post = $request->user()->posts()->create($request->all());
        $post = $this->postTransform($post);
        return $this->success($post, 201);
    }

    /**
     * Post transform
     */
    public function postTransform($post)
    {
        if(is_object($post) && is_a($post, 'App\Post')){
            return [
                'item' => [
                    'id' => $post->id,
                    'title' => $post->title,
                    'content' => $post->content,
                    'image_url' => $post->image_url,
                    'user_id' => (int) $post->user_id,
                    'created_at' => (string) $post->created_at,
                ]
            ];
        }

        return $post;
    } // postTransform

    /**
     * Show one post
     */
    public function show(Request $request, $id)
    {
    	$postModel = Post::where('id', '=', $id);

        if(empty($postModel->first())){
            return $this->error("The post with id {$id} doesn't exist", 404);
        }
        
        if($request->has('with')){
            $withs = $this->withsValidate($request);
            if($withs === false){
                return $this->error('The selected with is invalid.', 422);
            }
            $postModel = $postModel->with($withs);
        }

    	// $post = $this->postTransform($post);
        return $this->success(['item' => $postModel->first()]);
    }

    /**
     * Update a specific post
     */
    public function update(Request $request, $id)
    {
    	$post = Post::find($id);
    	
        if(empty($post)){
            return $this->error("The post with id {$id} doesn't exist", 404);
        }elseif($post->user_id != $request->user()->id){
            return $this->error('You don\'t have access to edit this post.', 401);
        }

        $post->title = ($request->has('title')) ? $request->input('title') : $post->title;
        $post->content = ($request->has('content')) ? $request->input('content') : $post->content;
    	$post->image_url = ($request->has('image_url')) ? $request->input('image_url') : $post->image_url;
        $post->save();

        $post = $this->postTransform($post);
        return $this->success($post);
    } // update

    /**
     * Post save Validate
     */
    public function saveValidate($request)
    {
    	$validator = Validator::make($request->all(), [
            'title' => 'required|min:2',
        ]);

        return $validator;
    }

    /**
     * Show all validate
     */
    public function listValidate($request)
    {
    	$validator = Validator::make($request->all(), [
            'order_by' => 'nullable|in:id,title,created_at',
            'sort' => 'nullable|in:DESC,ASC,desc,asc',
        ]);

        return $validator;
    }

    /**
     * List withs validate
     */
    public function withsValidate($request)
    {
    	$postWiths = ['comments', 'user'];
    	$with = $request->input('with');
    	if(is_array($with)){
    		$with = array_keys($with);
    		foreach($with as $value){
    			if(!in_array($value, $postWiths)){
        			return false;
        		}
    		}
    	}else{
    		$with = (string) $with;
    		if(!in_array($with, $postWiths)){
    			return false;
    		}
    	}
    	return $with;
    } // withsValidate

    /**
     * Delete a post
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);
        
        if(empty($post)){
            return $this->error("The post with id {$id} doesn't exist", 404);
        }elseif($post->user_id != $request->user()->id){
            return $this->error('You don\'t have access to delete this post.', 401);
        }

        $post->delete();

        return $this->success("The post with with id {$id} has been deleted.");
    }

}
