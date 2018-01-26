<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function addComment(Post $post)
    {
    	$this->validate(request(), [
    		'body' => 'required|min:2'
    	]);
    	$post->addComment(request('body'));
    	// Comment::create([
    	//     'post_id' => $post->id,
    	// 	'body' => request('body')
    	// ]);
    	return redirect('/');
    }
}
