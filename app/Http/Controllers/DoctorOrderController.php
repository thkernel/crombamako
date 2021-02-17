<?php

namespace App\Http\Controllers;

use App\Models\DoctorOrder;
use Illuminate\Http\Request;

class DoctorOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $doctor_orders =  DoctorOrder::orderBy('id', 'asc')->paginate(10)->setPath('doctor_orders');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("doctor_orders.index", compact(['doctor_orders']) );


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoctorOrder  $doctorOrder
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorOrder $doctorOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DoctorOrder  $doctorOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorOrder $doctorOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DoctorOrder  $doctorOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoctorOrder $doctorOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoctorOrder  $doctorOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorOrder $doctorOrder)
    {
        //
    }
}
