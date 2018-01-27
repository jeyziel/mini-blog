<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        /*// setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
        $date = strftime('%B');
        dd($date);*/
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

//        $user = auth()->user();
//        \Mail::to($user)->send( new Welcome($user) );

        return view('posts.index', compact('posts', 'archives'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $tags = Tag::all();


    	return view('posts.create', compact('tags'));
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'tag_id' => 'required'
        ]);

		try {

            $post = Post::create([
                'title' => request('title'),
                'body' => request('body'),
                'user_id' => auth()->id()
            ]);

            $post->tags()->attach( request('tag_id') );

        } catch (\Exception $e) {
            redirect('/posts/create');
        }

    	return redirect('/');
    }
}
