<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\lcomment;
use App\Models\listing;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ListingController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $listings = QueryBuilder::for(Listing::class)
                ->join('states', 'listings.state_id', '=', 'states.id')
                ->allowedFilters([
                    'title',
                    AllowedFilter::exact('states.zip_code', 'states.zip_code'),
                    AllowedFilter::exact('category_id'),
                    AllowedFilter::exact('sub_category_id'),
                    AllowedFilter::exact('child_category_id'),
                ])
                ->get();
    
            return view('frontend.all-listings', compact('listings'));
        } else {
            return redirect()->route('login');
        }
    }
    



    public function welcome(){
        $categories=Category::all();
        $users = User::count();
        $listings=listing::count();
        $comments= intval(Comment::count()) + intval(lcomment::count());
        $posts=post::where('is_published','1')->get();
        
        return view('welcome',compact('categories','users','listings','comments','posts'));
        

    }
    public function  show(listing $listing)
     
     {
        $otherlistings = listing::where('is_published','1')
        // ->join('states', 'listings.state_id', '=', 'states.id')->where('states.zip_code','states.zip_code')
        ->get();
        $lcomments=lcomment::where('is_published','1')->get();
        return view('listings.view',compact('listing','lcomments','otherlistings'));

     }

   
    
  
}


