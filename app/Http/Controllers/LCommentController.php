<?php

namespace App\Http\Controllers;

use App\Models\lcomment;
use App\Models\listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LCommentController extends Controller
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
        
        $listing= listing::where('id',$request->listing_id)->first();
        lcomment::create([
            'listing_id'=>$listing->id,
            'user_id'=>auth()->user()->id,
            'comment'=>$request->comment
            


        ]);
        return redirect()->back();
    }
    }
  
    public function show()
    {

    }


    public function destroy(lcomment $lcomment)
    {
        $lcomment->delete();
        return redirect()->back()->with('success', 'Comment has been deleted');
    }

    public function publish($id)
{
    $lcomment = lcomment::findOrFail($id);
    $lcomment->is_published = 1;
    $lcomment->save();
    return redirect()->back()->with('success', 'Comment has been published');
}
}
