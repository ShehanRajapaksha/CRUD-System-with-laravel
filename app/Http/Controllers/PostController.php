<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {   
        if(Auth::check()){
          // $listings = listing::where('is_published',true)->get();
        
        $posts=post::where('is_published',true)->paginate(24);
    
        return view('posts.index',compact('posts'));
        }
        else{
             return redirect()->route('login');
        }

    }
    public function create()
    {
        return view('posts.create');
    }
    
    public function store(Request $request)
    {
       $featured_image= $request->file('featured_image')->store('public/posts');
       
        
       
       
        post::create([
            'user_id'=>auth()->user()->id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'child_category_id' => $request->child_category_id,
            'name'=> $request->title,
            'slug'=> Str::slug($request->title),
            'description'=> nl2br($request->description),
            'is_published'=>$request->is_published,
            'featured_image'=>$featured_image,
            'featured_text'=>$request->featured_text,
          


        ]);
        return redirect()->route('posts.index')->with('message', 'Post Created Sucessfully');
    
    
    }
     public function  show(post $post)
     
     {
        
        return view('posts.view',compact('post'));

     }

}
