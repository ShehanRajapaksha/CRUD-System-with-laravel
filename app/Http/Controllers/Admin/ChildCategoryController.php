<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChildCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $child_categories= ChildCategory::paginate(12);
        return view('admin.childcategories.index',compact('child_categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.childcategories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $path= $request->file('image')->store('public/childcategories');

            ChildCategory::create([
                'name'=>$request->name,
                'slug'=>Str::slug($request->name),
                'sub_category_id' => $request->sub_category_id,
                'image'=>$path

            ]);
                return redirect()->route('childcategories.index')->with('message','child Category Created Successfully.');
            
        }
        dd('no image');
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $child_category=ChildCategory::find($id);
        return view("admin.childcategories.edit",compact('child_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $child_category=Childcategory::find($id);
        if($request->hasFile(('image'))){
            $path= $request->file('image')->store('public/childcategories');
            $child_category->update([
                'name'=>$request->name,
                'slug' => Str::slug($request->name),
                'sub_category_id'=> $request->sub_category_id,
                'image' => $path
            ]);
            return redirect()->route('childcategories.index')->with('message','child Category Updated Successfully.');
             
        }else {
            $child_category->update([
                'name'=>$request->name,
                'slug' => Str::slug($request->name),
                'sub_category_id'=> $request->sub_category_id

            ]);
            return redirect()->route('childcategories.index')->with('message','child Category Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $child_category= ChildCategory::findOrFail($id);
        $child_category->delete();
        return redirect()->route('childcategories.index')->with('message','Deleted Sucessfully');
    }
}
