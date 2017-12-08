<?php

namespace App\Http\Controllers;

use Validator;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Show posts with 20 paginations
     */
    public function index(Request $request)
    {
        $postsModel = Post::make();

        $validator = Validator::make($request->all(), [
            'order_by' => 'nullable|in:id,title,created_at',
            'sort' => 'nullable|in:DESC,ASC,desc,asc',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors()->first(), 422);
        }

        if($request->has('search')){
            $postsModel = $postsModel->where('title', 'LIKE', '%'.$request->input('search').'%');
        }

        if($request->has('order_by') && $request->has('sort')){
            $postsModel = $postsModel->orderBy($request->input('order_by'), $request->input('sort'));
        }else{
            $postsModel = $postsModel->orderBy('id', 'DESC');
        }

        if($request->has('with')){
        	$postWiths = ['comments', 'user'];
        	$with = $request->input('with');
        	if(is_array($with)){
        		$with = array_keys($with);
        		foreach($with as $value){
        			if(!in_array($value, $postWiths)){
	        			return $this->error('The selected with is invalid.', 422);
	        		}
        		}
        	}else{
        		$with = (string) $with;
        		if(!in_array($with, $postWiths)){
        			return $this->error('The selected with is invalid.', 422);
        		}
        	}
        	$postsModel = $postsModel->with($with);
        }

        if($request->has('per_page')){
        	$perPage = (int) $request->input('per_page');
            $posts = $postsModel->paginate($perPage);
        }else{
            $posts = $postsModel->paginate(20);
        }

        return $this->success($posts);
    }

    /**
     * Create a post
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors()->first(), 422);
        }

        $post = $request->user()->posts()->create($request->all());
        $post = $this->postTransform($post, 201);
        return $this->success($post);
    }

    /**
     * Post transform
     */
    public function postTransform($post, $code)
    {
        if(is_object($post) && is_a($post, 'App\Post')){
            return [
                'item' => [
                    'id' => $post->id,
                    'title' => $post->title,
                    'content' => $post->content,
                    'image_url' => $post->image_url,
                    'created_at' => (string) $post->created_at,
                ],
                'success' => true,
                'status' => $code,
            ];
        }

        return $post;
    } // postTransform

}
