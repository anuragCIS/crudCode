<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ApiController extends Controller
{
    //
    function list($id = null)
    {

        return $id ? Post::find($id) : Post::all();
    }

    function add(Request $req)
    {

        $model = new Post();
        $model->title = $req->title;
        $model->body = $req->body;
        if ($model->save()) {
            return "Data is Inserted Successfully";
        } else {
            return "Something Went Wrong";
        }
    }

    function update(Request $req)
    {
        $model = Post::find($req->id);
        $model->title = $req->title;
        $model->body = $req->body;
        if ($model->save()) {
            return "Data Updated Successfully";
        } else {
            return "Something Went Wrong";
        }
    }

    function search($name){        
        return Post::where('title','like',"%".$name."%")->get();
    }

}
