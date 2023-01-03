<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Admin\Post;

class PostCRUDController extends Controller
{

    public function index()
    {
        $data['posts'] = Post::orderBy('id','desc')->paginate(5);
        return view('products.index',$data);
    }

    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            'description'=>'required',
        ]);

        $path = $request->file('image')->store('public/images');
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $path;
        $post->save();

        return redirect()->route('posts.index')->with('success','Product has been created successfully');
    }


    public function show($id)
    {
        return view('products.show',compact('post'));
    }


    public function edit(Post $post)
    {
        return view('products.edit',compact('post'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([

                'title'=>'required',
                'description'=>'required'
        ]);

        $post = Post::find($id);
        if($request->hasFile('image'))
        {
            $request->validate([

                'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $path = $request->file('image')->store('public/images');
            $post->image = $path;
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return redirect()->route('posts.index')->with('success','Product Updated Successfully');
    }


    public function destroy(Post $post)
    {
        $post->delete();
         return redirect()->route('posts.index')->with('success','Product Deleted Successfully');
    }
}
