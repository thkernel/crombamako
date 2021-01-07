<?php

namespace App\Http\Controllers;

use App\Models\CertificateRequest;
use App\Models\CertificateType;
use Illuminate\Http\Request;

class CertificateRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $certificate_requests =  CertificateRequest::orderBy('id', 'desc')->paginate(10)->setPath('certificate_requests');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("certificate_requests.index", compact(['certificate_requests']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $certificate_request = new CertificateRequest;
        $certificate_types =  CertificateType::all();
        return view('certificate_requests.create', compact(['certificate_request', 'certificate_types']));
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
        //
        $request['doctor_id'] = current_user()->id;
     

        $request->validate([
            'certificate_type' => 'required',
            'content' => 'required',

        ]);

        

        CertificateRequest::create($request->all());

   
        return redirect()->route('certificate_requests.index')
            ->with('success','CertificateRequest created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CertificateRequest  $certificateRequest
     * @return \Illuminate\Http\Response
     */
    public function show(CertificateRequest $certificateRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CertificateRequest  $certificateRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificateRequest $certificate_request)
    {
        //
        return view('certificate_requests.edit',compact('certificate_request'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CertificateRequest  $certificateRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CertificateRequest $certificate_request)
    {
        //

        $request->validate([
            'certificate_type' => 'required',
            'content' => 'required',

        ]);


        $certificate_request->update($request->all());

  

        return redirect()->route('certificate_requests.index')

                        ->with('success','CertificateRequest updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CertificateRequest  $certificateRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        CertificateRequest::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
