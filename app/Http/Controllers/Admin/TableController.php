<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;
use File;

class TableController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::where('is_deleted',0)
                    ->get();
        return view('admin.tables.index',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tables.create');
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

            $file->move('tables',$fileName);
        }

        $menu = Table::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'location'=>$request->location,
            'image'=>$fileName,
            'guest_number'=>$request->guest_number,
            'status'=>$request->status,
        ]);

        return redirect()->back()->with('message','New Table Created Successfully');
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
    public function edit(Table $table)
    {
        return view('admin.tables.edit',compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        $fileName = $exestingImage  = $table->image;

        if ($request->hasFile('image')) {

            $exestingfilename = public_path().'/tables/'.$exestingImage;

            File::delete($exestingfilename);

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $categoryName= $request->name;

            $fileName = $categoryName.time().'.'.$extension;

            $file->move('tables',$fileName);
        }

        $table->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'location'=>$request->location,
            'image'=>$fileName,
            'guest_number'=>$request->guest_number,
            'status'=>$request->status,
        ]);

        return redirect()->back()->with('message','Table Updated Successfully');


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

    public function change_table_status(Table $table){
        
        if ($table->status==1) {

            $table->update(['status'=>0]);
        }
        elseif ($table->status==0) {
            $table->update(['status'=>1]);
        }
        return redirect()->back()->with('message','Table Status Updated Successfully');
    }

    public function delete_table(Table $table){
        
        $table->update(['is_deleted'=>1]);

        return redirect()->back()->with('message','Table Status Updated Successfully');
    }
}
