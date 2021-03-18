<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionRequest;
use Illuminate\Http\Request;
use App\Models\Speciality;
use App\Models\Town;
use App\Models\Neighborhood;
use App\Models\Service;
use App\Models\StructureProfile;
use App\Models\Role;
use App\Models\DoctorProfile;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\DoctorOrder;


class SubscriptionRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $subscription_requests =  SubscriptionRequest::where("status", '<>', "validated")->get();
         activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("subscription_requests.index", compact(['subscription_requests']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $specialities =  Speciality::all();
        $towns =  Town::all();
        $neighborhoods =  Neighborhood::all();
        $structures =  StructureProfile::all();
        $services =  Service::all();

        $subscription_request =  new SubscriptionRequest;
        return view('subscription_requests.create', compact(['subscription_request','specialities', 'towns', 'structures', 'neighborhoods', 'services']));
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
        $request['status'] = "En attente";

        $request->validate([
            'sex' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|unique:subscription_requests',
            'town_id' => 'required',
            'email' => 'required|unique:subscription_requests',
            'is_specialist' => 'required'
            


        ]);

  
        $subscription_request = SubscriptionRequest::create($request->all());


       
       

       if ($request->hasFile('files')){

             // Attach record
       $allowedfileExtension = ['pdf','jpg','png','docx'];

            eloquent_storage_service($subscription_request, $request, $allowedfileExtension, 'files', 'files');
        }

   
        return redirect()->route('home_path')
            ->with('success','La préinscription a bien été créé.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubscriptionRequest  $subscriptionRequest
     * @return \Illuminate\Http\Response
     */
    public function show(SubscriptionRequest $subscription_request)
    {
        //
        return view('subscription_requests.show',compact('subscription_request'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubscriptionRequest  $subscriptionRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(SubscriptionRequest $subscription_request)
    {
        //
        $specialities =  Speciality::all();
        $towns =  Town::all();
        $neighborhoods =  Neighborhood::all();
        $structures =  StructureProfile::all();
        $services =  Service::all();

        return view('subscription_requests.edit', compact(['subscription_request','specialities', 'towns', 'structures', 'neighborhoods', 'services']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubscriptionRequest  $subscriptionRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubscriptionRequest $subscription_request)
    {
        //

        $request->validate([
            'sex' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'town_id' => 'required',
            'email' => 'required',
            


        ]);

  
        $subscription_request->update($request->all());


       
        if ($request->hasFile('files[]')){

             // Attach record
       $allowedfileExtension = ['pdf','jpg','png','docx'];

            eloquent_storage_service($subscription_request, $request, $allowedfileExtension, 'files', 'files');
        }

   
        return redirect()->route('subscription_requests.index')
            ->with('success','La préinscription a été modifié avec succès.');



    }

    public function validate_subscription(Request $request, SubscriptionRequest $subscription_request){
        //
    

        // create doctor account and send credentials
        $doctor = doctor_factory($subscription_request);
        
/*
        $year = Carbon::parse(date('Y-m-d H:i:s'))->format("Y");

        $reference = last_doctor_reference($year);
        

        
        $doctor_order = [
            "reference" => $reference,
            "doctor_id" => $doctor->id,
            "year" => $year,
            "status" => 'enable',
            "user_id" => current_user()->id
        ];

        DoctorOrder::create($doctor_order);*/

        

        // change subscription request status to valided

        $request['status'] = "validated";
        //$request['user_id'] = current_user()->id;
        $subscription_request->update($request->all());
        
    

        return redirect()->route('subscription_requests.index')

                        ->with('success','La préinscription a été validée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubscriptionRequest  $subscriptionRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubscriptionRequest $subscriptionRequest)
    {
        //
    }
}
