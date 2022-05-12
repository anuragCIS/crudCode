<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Database\PDO\PostgresDriver;

class PostController extends Controller
{
    public function addPost()
    {
        return view('add-post');
    }

    public function createPost(Request $req)
    {
        $model = new Post();
        $model->title = $req->title;
        $model->body = $req->body;
        $model->save();
        return redirect('/posts')->with('post_created', 'Post has been created successfully!');
    }

    public function getPost()
    {
        $post = Post::get();
        return view('posts',['post'=>$post]);
    }

    public function getPostById($id)
    {
        $post=Post::where('id',$id)->first();
        return view('Single-post',['post'=>$post]);
    }

    public function deletePost($id)
    {
        Post::where('id',$id)->delete();
        return back()->with('post_delete','Post is deleted successfully');
    }

    public function editPost($id)
    {
        $model=Post::find($id);
        return view('edit-post',['model'=>$model]);
    }

    public function updatePost(Request $req)
    {
        $model=Post::find($req->id);
        $model->title=$req->title;
        $model->body=$req->body;
        $model->save();
        return redirect('/posts')->with('post_updated','Post has been updated Successfully');
    }
}
