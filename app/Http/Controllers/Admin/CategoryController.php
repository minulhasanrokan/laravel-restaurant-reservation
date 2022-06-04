<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;

use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('is_deleted',0)
                                ->get();
        return view('admin.categories.index',compact('categories'));
    }


    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = '';

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $categoryName= $request->name; 

            $fileName = $categoryName.time().'.'.$extension;

            $file->move('categories',$fileName);
        }

        Category::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status,
            'image'=>$fileName,
        ]);
        return redirect()->back()->with('message','New Category Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
         return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category  $category)
    {
        $fileName = $exestingImage  = $category->image;

        if ($request->hasFile('image')) {

            $exestingfilename = public_path().'/categories/'.$exestingImage;

            File::delete($exestingfilename);

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $categoryName= $request->name;

            $fileName = $categoryName.time().'.'.$extension;

            $file->move('categories',$fileName);
        }

        $category->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status,
            'image'=>$fileName,
        ]);
        return redirect()->back()->with('message','New Category Created Successfully');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->update([
            'is_deleted'=>1,
        ]);
        return redirect()->back()->with('message','Category Deleted Successfully');
    }

    public function change_category_status(Category $category){
        
        if ($category->status==1) {

            $category->update(['status'=>0]);
        }
        elseif ($category->status==0) {
            $menu->update(['status'=>1]);
        }
        return redirect()->back()->with('message','Category Status Updated Successfully');
    }

    public function delete_category(Category $category){
        

        $category->update(['is_deleted'=>1]);

        return redirect()->back()->with('message','Category Status Updated Successfully');
    }
}
