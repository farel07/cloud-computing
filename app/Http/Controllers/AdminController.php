<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $data['posts'] = Post::latest()->get();
        $data['excerpt'] = function ($id){
            return Str::limit(Post::find($id)->content, 200, '...');
        };
        return view('admin.dashboard',$data);
    }
}
