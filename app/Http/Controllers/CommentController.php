<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{

    public function index(){

    }
    public function store(Request $request)
    {
        $validator =Validator::make($request->all(),['comment'=>'required|string']);
        if($validator->fails()){
            return redirect()->back();
        }
        else{
        
        $post= post::where('id',$request->post_id)->first();
        Comment::create([
            'post_id'=>$post->id,
            'user_id'=>auth()->user()->id,
            'comment'=>$request->comment

        ]);
        return redirect()->back();
    }
    }

    
}
