<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home', [
            'post' => Post::latest()->get()
        ]);
    }

    public function show($id){
        return view('show_post', [
            'post' => Post::find($id),
            'comments' => PostComment::where('post_id', $id)->where('parent_id', null)->get(),
            'reply_comments' => function($id){
                return PostComment::where('parent_id', $id)->get();
            },
            'reply_to' => function($id){
                return PostComment::find($id);
            }
        ]);
    }

    public function store_comment(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required',
            'body' => 'required'
        ]);

        $validatedData['post_id'] = $id;

        PostComment::create($validatedData);

        return back();
    }
}
