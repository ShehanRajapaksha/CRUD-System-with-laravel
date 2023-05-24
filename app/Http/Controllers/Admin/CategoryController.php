<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories= Category::paginate(12);
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        if($request->hasFile('image')){
            $path= $request->file('image')->store('public/categories');

            Category::create([
                'name'=>$request->name,
                'slug'=>Str::slug($request->name),
                'image'=>$path

            ]);
                return redirect()->route('categories.index')->with('message','Category Created Successfully.');
            
        }
        dd('no image');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if($request->hasFile(('image'))){
            $path= $request->file('image')->store('public/categories');
            $category->update([
                'name'=>$request->name,
                'slug' => Str::slug($request->name),
                'image' => $path
            ]);
            return redirect()->route('categories.index')->with('message','Category Updated Successfully.');
             
        }else {
            $category->update([
                'name'=>$request->name,
                'slug' => Str::slug($request->name)
            ]);
            return redirect()->route('categories.index')->with('message','Category Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('message','Category Deleted Successfully.');
    }
}
