<?php

namespace App\Http\Controllers;

use App\Post;
use Validator;
use App\Comment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    /**
     * Get all comments of a post
     * Show comments
     */
    public function index($post_id)
    {
        $comments = Comment::where('post_id', '=', $post_id)->get();
        
        if(empty($comments)){
            return $this->error("Could not find any comments for post with id {$post_id}.", 404);
        }

        return $this->success(['items' => $comments], 200);
    } // index


    /**
     * Save a specific comment
     */
    public function store(Request $request, $post_id)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|min:2',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors()->first(), 422);
        }

        $post = Post::find($post_id);

        if(empty($post)){
            return $this->error("The post with id {$post_id} doesn't exist", 404);
        }

        $comment = $post->comments()->create([
            'user_id' => $request->user()->id,
            'content' => $request->input('content')
        ]);

        return $this->success(['item' => $comment], 201);
    } // store

    /**
     * Update comment
     */
    public function update(Request $request, $post_id, $comment_id)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|min:2',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors()->first(), 422);
        }

        $comment = Comment::where('id', '=', $comment_id)->where('post_id', '=', $post_id)->first();

        if(empty($comment)){
            return $this->error("Either comment with id {$comment_id} or post with id {$post_id} doesn't exist.", 404);
        }elseif($comment->user_id != $request->user()->id){
            return $this->error('You don\'t have access to edit this comment.', 401);
        }

        $comment->content = $request->input('content');
        $comment->save();

        return $this->success(['item' => $comment]);
    } // update

    /**
     * Delete comment
     */
    public function destroy(Request $request, $post_id, $comment_id)
    {
    	$comment = Comment::where('id', '=', $comment_id)->where('post_id', '=', $post_id)->first();

        if(empty($comment)){
            return $this->error("Either comment with id {$comment_id} or post with id {$post_id} doesn't exist.", 404);
        }elseif($comment->user_id != $request->user()->id){
            return $this->error('You don\'t have access to delete this comment.', 401);
        }

        $comment->delete();

        return $this->success("The comment with id {$comment_id} has been deleted.");
    } // destroy

    /**
     * Show comment with post id
     */
    public function show(Request $request, $post_id, $comment_id)
    {
    	$comment = Comment::where('id', '=', $comment_id)->where('post_id', '=', $post_id)->first();

        if(empty($comment)){
            return $this->error("The comment with id {$comment_id} doesn't exist", 404);
        }

        return $this->success(['item' => $comment]);
    } // show

}