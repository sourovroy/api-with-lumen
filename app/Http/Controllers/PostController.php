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

        if($request->has('search')){
            $postsModel = $postsModel->where('title', 'LIKE', '%'.$request->input('search').'%');
        }

        if($request->has('order_by') && $request->has('sort')){
            $postsModel = $postsModel->orderBy($request->input('order_by'), $request->input('sort'));
        }else{
            $postsModel = $postsModel->orderBy('id', 'DESC');
        }

        if($request->has('per_page')){
            $posts = $postsModel->paginate($request->input('per_page'));
        }else{
            $posts = $postsModel->paginate(20);
        }
        
        return $this->success($posts, 200);
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

        $post = $request->user()->posts()->create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image_url' => $request->input('image_url'),
        ]);

        return $this->success($post, 201);
    }

}
