<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::with('category')->select('id', 'title', 'category_id', 'status')->get();
        return view('post.index')->with('posts', $posts);
    }

    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('post.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'sub_title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'img' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        //store img
        if ($request->has('img')) {
            $img      = $request->file('img');
            $img_name = uniqid('',true).Str::random(10). '.' . $img->getClientOriginalExtension();
            $img->storeAs('images', $img_name );
        }
        
        $post = new Post();
        $post->title = $request->title;
        $post->sub_title = $request->sub_title;
        $post->slug  = Str::slug($request->title);
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->img = $img_name;

        //save into database
        $post->save();

        //Redirect and show flash message
        return redirect()->back()->with(session()->flash('alert-success', 'Post successfully Created'));
    }

    public function show($id)
    {
        $post = Post::with('category')->where('id', $id)->first();
        return view('post.show')->with('post', $post);
    }

    public function edit(Post $post)
    {
        $categories = Category::select('id', 'name')->get();
        return view('post.edit')->with('post', $post)->with('categories', $categories);
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);

        //get request data
        $data = $request->except("_token", "_method");
        $data["slug"] = Str::slug($request->title);

        if($request->has('img')){
            $new_img= $request->file('img');
            $new_img_name = uniqid('',true).Str::random(10). '.' . $new_img->getClientOriginalExtension();
            $new_img->storeAs('images', $new_img_name );
            
            //set new logo name
            $data["img"] = $new_img_name;

            // Delete Old image
            $isExists = file_exists(public_path('images/'). '/'. $post->img);
            if($isExists){
                unlink( public_path('images/'). '/'. $post->img);
            }
            
        }

        // update database 
        $post->update($data);

        //Redirect and show flash message
        return redirect()->route('posts.index')->with(session()->flash('alert-success', 'Post updated successfully'));
    }

    public function destroy(Post $post)
    {
        // Delete image
        $isExists = file_exists(public_path('images/'). '/'. $post->img);
        if($isExists){
            unlink( public_path('images/'). '/'. $post->img);
        }
        
        //Delete Data
        $post->delete();

        //Redirect and show flash message
        return redirect()->route('posts.index')->with(session()->flash('alert-success', 'Post successfully Deleted'));
    }
}
