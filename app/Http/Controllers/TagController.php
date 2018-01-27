<?php

namespace App\Http\Controllers;

use App\Tag;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);

        Tag::Create(request()->all());

        return redirect('/');
    }

}
