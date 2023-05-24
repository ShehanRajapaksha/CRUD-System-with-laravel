<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingRequest;
use App\Models\Category;
use App\Models\InviteLink;
use App\Models\lcomment;
use App\Models\listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings= listing::where('user_id',auth()->user()->id)->get();
        return view('listings.index',compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingRequest $request)
    {
       $featured_image= $request->file('featured_image')->store('public/listings');
       $image_one= $request->file('image_one')->store('public/listings');
       $image_two= $request->file('image_two')->store('public/listings');
       $image_three= $request->file('image_three')->store('public/listings');
        
       
       
        listing::create([
            'user_id'=>auth()->user()->id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'child_category_id' => $request->child_category_id,
            'title'=> $request->title,
            'slug'=> Str::slug($request->title),
            'description'=>$request->description,
            'price'=> $request->price,
            'location'=>$request->location,
            'facilities'=> $request->facilities,
            'phone_number'=> $request->phone_number,
            'is_published'=>$request->is_published,
            'country_id'=>$request->country_id,
            'city_id'=>$request->city_id,
            'state_id'=>$request->state_id,
            'featured_image'=>$featured_image,
            'image_one'=>$image_one,
            'image_two'=>$image_two,
            'image_three'=>$image_three,


        ]);
        return redirect()->route('listings.index')->with('message','Listing Created Sucessfully');
    }

  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listing =Listing::find($id);
        return view('listings.edit',compact('listing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreListingRequest $request, string $id)
    {
        $listing= listing::find($id);
        
        $featured_image = $listing->featured_image;
        $image_one =$listing->image_one;
        $image_two=$listing->image_two;
        $image_three=$listing->image_three;



        if($request->hasFile('featured_image'))
        {
            $featured_image= $request->file('featured_image')->store('public/listings');
        }
        if($request->hasFile('image_one'))
        {
            $image_one= $request->file('image_one')->store('public/listings');
        }
        if($request->hasFile('image_two'))
        {
            $image_two= $request->file('image_two')->store('public/listings');
        }
        if($request->hasFile('image_three'))
        {
            $image_three= $request->file('image_three')->store('public/listings');
        }
       
     
        
       
        
        $listing->update([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'child_category_id' => $request->child_category_id,
            'title'=> $request->title,
            'slug'=> Str::slug($request->title),
            'description'=>nl2br($request->description),
            'price'=> $request->price,
            'location'=>$request->location,
            'facilities'=> $request->facilities,
            'phone_number'=> $request->phone_number,
            'is_published'=>$request->is_published,
            'country_id'=>$request->country_id,
            'city_id'=>$request->city_id,
            'state_id'=>$request->state_id,
            'featured_image'=>$featured_image,
            'image_one'=>$image_one,
            'image_two'=>$image_two,
            'image_three'=>$image_three,


        ]);
        return redirect()->route('listings.index')->with('message','Listing Updated Sucessfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $listing=Listing::find($id);
        Storage::delete($listing->featured_image);
        Storage::delete($listing->image_one);
        Storage::delete($listing->image_two);
        Storage::delete($listing->image_three);
        $listing->delete();
        return redirect()->route('listings.index')->with('message','Listing Deleted Sucessfully');
         
    }
    public function  show($id,$link)
     
     {
        $inviteLink = InviteLink::where('link', $link)->first();
        if(!$inviteLink){
            abort(404);
        }
        $listing=listing::find($id);
        $otherlistings = listing::where('is_published','1')
        ->join('states', 'listings.state_id', '=', 'states.id')->where('states.zip_code',$listing->state->zip_code)
        ->get();
        $lcomments=lcomment::where('is_published','1')->get();
        return view('listings.view',compact('listing','lcomments','otherlistings'));

     }

     public function dashboard(){
        $categories = Category::all();
        $users = User::count();
        $listings = listing::count();
    
        return view('dashboard', compact('categories', 'users', 'listings'));
    }
    
}
