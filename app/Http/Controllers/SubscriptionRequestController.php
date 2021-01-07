<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionRequest;
use Illuminate\Http\Request;
use App\Models\Speciality;
use App\Models\Locality;
use App\Models\Structure;

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
         $subscription_requests =  SubscriptionRequest::orderBy('id', 'desc')->paginate(10)->setPath('subscription_requests');
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
        $localities =  Locality::all();
        $structures =  Structure::all();

        $subscription_request =  new SubscriptionRequest;
        return view('subscription_requests.create', compact(['subscription_request','specialities', 'localities', 'structures']));
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
            'civility' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',

        ]);

  
        $created = SubscriptionRequest::create($request->all());

       

        if ($created){
            if($request->hasFile('files')){
                $allowedfileExtension=['pdf','jpg','png','docx'];
                $files = $request->file('files');

                
                foreach($files as $file){
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $check=in_array($extension,$allowedfileExtension);
                    //dd($check);
                    if($check){
                        $items= Item::create($request->all());
                        foreach ($request->photos as $photo) {
                            $filename = $photo->store('photos');
                            ItemDetail::create([
                            'item_id' => $items->id,
                            'filename' => $filename
                            ]);
                        }
                    }
                }
                
                dd($files);
            }
        }

   
        return redirect()->route('home_path')
            ->with('success','Locality created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubscriptionRequest  $subscriptionRequest
     * @return \Illuminate\Http\Response
     */
    public function show(SubscriptionRequest $subscriptionRequest)
    {
        //
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
        return view('subscription_requests.edit',compact('subscription_request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubscriptionRequest  $subscriptionRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubscriptionRequest $subscriptionRequest)
    {
        //
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
