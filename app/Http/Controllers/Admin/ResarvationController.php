<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;

class ResarvationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::where('is_deleted',0)
                        ->get();

        $tables = Table::where('is_deleted',0)
                        ->where('status',1)
                        ->get();
        return view('admin.resarvations.index',compact('reservations','tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables = Table::where('is_deleted',0)
                        ->where('available_status','available')
                        ->where('status',1)
                        ->get();
        return view('admin.resarvations.create',compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = Reservation::create([
            'fast_name'=>$request->fast_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'res_date'=>$request->date,
            'table_id'=>$request->table,
            'guest_number'=>$request->guest_number,
            'status'=>$request->status,
        ]);

        if ($reservation==true) {
            
            $table = Table::where('id',$request->table);
            $table->update(['available_status'=>'unavailable']) ;
        }

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
