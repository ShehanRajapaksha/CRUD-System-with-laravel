<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\City;
use App\Models\Country;
use App\Models\listing;
use App\Models\State;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class AdminController extends Controller
{
    public function index()
    {
        $users=User::all();
        $listings =listing::all();
        $categories=Category::all();
        $sub_categories=Subcategory::all();
        $child_categories =ChildCategory::all();
        $countries=Country::all();
        $states =State::all();
        $cities=City::all();

        return  view('admin.index',compact("users",'listings','categories','sub_categories','child_categories','states','cities'));
    }

  
}
