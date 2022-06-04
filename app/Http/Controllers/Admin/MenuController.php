<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use File;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::where('is_deleted',0)
                    ->get();
        return view('admin.menus.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response 
     */ 
    public function create()
    {
        $categories = Category::where('status',1)
                    ->get();
        return view('admin.menus.create',compact('categories'));
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

            $file->move('menus',$fileName);
        }

        $menu = Menu::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status,
            'price'=>$request->price,
            'image'=>$fileName,
        ]);

        if($request->has('categories')){
            $menu->categories()->attach($request->categories);
        }
        return redirect()->back()->with('message','New Menu Created Successfully');
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
    public function edit(Menu $menu)
    {
        $categories = Category::where('status',1)
                    ->get();
        return view('admin.menus.edit',compact('menu','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu  $menu)
    {
        $fileName = $exestingImage  = $menu->image;

        if ($request->hasFile('image')) {

            $exestingfilename = public_path().'/menus/'.$exestingImage;

            File::delete($exestingfilename);

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $categoryName= $request->name;

            $fileName = $categoryName.time().'.'.$extension;

            $file->move('menus',$fileName);
        }

        $menu->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status,
            'price'=>$request->price,
            'image'=>$fileName,
        ]);

        if($request->has('categories')){
            $menu->categories()->sync($request->categories);
        }

        return redirect()->back()->with('message','New Category Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function change_menu_status(Menu $menu){
        
        if ($menu->status==1) {

            $menu->update(['status'=>0]);
        }
        elseif ($menu->status==0) {
            $menu->update(['status'=>1]);
        }
        return redirect()->back()->with('message','Category Status Updated Successfully');
    }

    public function delete_menu(Menu $menu){
        

        $menu->update(['is_deleted'=>1]);

        return redirect()->back()->with('message','Category Status Updated Successfully');
    }
}
