<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        $listings= listing::all();
        return view('admin.listings.index',compact('listings'));
    }
}
