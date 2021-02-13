<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\ContributionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DoctorProfile;
use App\Models\Role;
use App\Models\Town;
use App\Models\Neighborhood;
use App\Mail\ContributionMail;
//use Illuminate\Mail\Mailable;

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
        //$doctor = DB::table('roles')->whereName('Médecin')->first();
        $doctors =  DoctorProfile::all();
        //$doctors =  User::all();

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


        $contribution_items = array_filter($request['year']); // Remove empty element into array.


        $amount = $request['amount'];
        
        
        // Check if contribution items exist, else exit function.
        if (!isset($contribution_items)){
            exit();
        }

        // Compute total amount.
        $request['total_amount'] = $request['amount'] * count($contribution_items);

        $contribution = Contribution::create($request->all());

        
        if ($contribution && $contribution_items){
            

            foreach($contribution_items as $contribution_item){
                $item = [
                    "contribution_id" => $contribution->id,
                    "year" => $contribution_item,
                    "amount" => $amount
                ];
                
                ContributionItem::create($item);
            } 
        }

        // Get doctor instance for prepare sending.
        $doctor = DoctorProfile::find($contribution->doctor_id);
        

        // Send email
        \Mail::to($doctor->email)->send(new ContributionMail($contribution));
   
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
        $doctors =  DoctorProfile::all();



        
        return view('contributions.edit',compact(['contribution', 'doctors']));

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


        $contribution_items = $request['year'];
        $amount = $request['amount'];

    
        
        if ($contribution && $contribution_items ){
            // delete all items before.
            ContributionItem::where('contribution_id', $contribution->id)->delete();

            foreach($contribution_items as $contribution_item){
                $item = [
                    "contribution_id" => $contribution->id,
                    "year" => $contribution_item,
                    "amount" => $amount
                ];
                
                ContributionItem::create($item);
            }
        }

  

        return redirect()->route('contributions.index')

                        ->with('success','Contribution updated successfully');
    }

    public function statement(Request $request){

        $towns =  Town::all();
        $neighborhoods = Neighborhood::all();
        $doctors =  DoctorProfile::all();

        // Check if request content the  search terms
        
        if (isset($request['start_date']) && $request['start_date'] != null ){
            dd($request['start_date']);

        }

        return view('contributions.statement', compact(['towns', 'neighborhoods', 'doctors']));
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
