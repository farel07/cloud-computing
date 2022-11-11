<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|file|max:2048'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('posts-image',['disk' => 'public']);
        }

        Post::create($validatedData);
        return redirect('/admin/dashboard')->with('success', 'Post created');
    }

    public function store_reply_comment(Request $request, $id){
        $validatedData = $request->validate([
            'body' => 'required',
            'post_id' => 'required'
        ]);

        $validatedData['name'] = auth()->user()->name;
        $validatedData['parent_id'] = $id;

        PostComment::create($validatedData);

        return back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'post' => Post::find($id)
        ];

        $data['comments'] = PostComment::where('post_id', $id)->where('parent_id', null )->get();
        $data['reply_comments'] = function ($id){
            return PostComment::where('parent_id', $id)->get();
        };

        $data['reply_to'] = function($id){
            return PostComment::find($id);
        };

        return view('admin.post.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.post.edit',[
            'post' => Post::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|file|max:2048'
        ]);

        if ($request->file('image')) {
            if($request->oldImage){
                Storage::disk('public')->delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('posts-image',['disk' => 'public']);
        }

        Post::where('id', $id)->update($validatedData);
        return redirect('/admin/dashboard')->with('success', 'Post updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Storage::disk('public')->delete(Post::find($id)->image);
        Post::destroy($id);
        return redirect('/admin/dashboard')->with('success', 'Post deleted');
    }
}
