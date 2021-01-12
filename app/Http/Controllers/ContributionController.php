<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class ContributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contributions =  Contribution::orderBy('id', 'desc')->paginate(10)->setPath('contributions');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("contributions.index", compact(['contributions']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $contribution = new Contribution;
        $doctor = DB::table('roles')->whereName('medecin')->get()[0];
        //$doctors =  User::where('role_id', $doctor->id)->get();
        $doctors =  User::all();

        return view("contributions.create", compact(['doctors', 'contribution']) );
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
        $request['user_id'] = current_user()->id;
     

        $request->validate([
            'doctor_id' => 'required',
            'year' => 'required',
            'amount' => 'required',

        ]);

        

        Contribution::create($request->all());

   
        return redirect()->route('contributions.index')
            ->with('success','Contribution created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function show(Contribution $contribution)
    {
        //
        return view('contributions.edit',compact('contribution'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function edit(Contribution $contribution)
    {
        //
        return view('contributions.edit',compact('contribution'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contribution $contribution)
    {
        //

        $request->validate([
            'doctor_id' => 'required',
            'year' => 'required',
            'amount' => 'required',

        ]);

        $contribution->update($request->all());

  

        return redirect()->route('contributions.index')

                        ->with('success','Contribution updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Contribution::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
