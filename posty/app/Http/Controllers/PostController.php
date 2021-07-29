<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){
        
        $posts = Post::latest()->paginate(5);

        return view('posts.index', ['posts' => $posts]);
    }

    public function insert_post(Request $request){
        $this->validate($request,[
            'body' => 'required'
        ]);


        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();
    }

    public function destroy(Post $post){

        $this->authorize('delete', $post);
        $post->delete();
        return back();

    }

    public function get_update(Post $post){
        $data = Post::find($post);
        return view('posts.updatePost' ,[
            'data' => $data
        ]);
    }


    public function post_update(Request $request){
        $data = Post::find($request->id);
        $data->body = $request->body;
        $data->save();
        return redirect('posts');
    }
}