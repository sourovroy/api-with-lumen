<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Show comments
     */
    public function index(Request $request)
    {
    	$commentModel = Comment::make();
        
        if($request->has('per_page')){
            $perPage = (int) $request->input('per_page');
            $comments = $commentModel->paginate($perPage);
        }else{
            $comments = $commentModel->paginate(20);
        }

        return $this->success($comments);
    } // index


    /**
     * Show a specific comment
     */
    public function show(Request $request, $id)
    {
        $comment = Comment::find($id);

        if(empty($comment)){
            return $this->error("The comment with id {$id} doesn't exist", 404);
        }

        return $this->success(['item' => $comment]);
    }

}
