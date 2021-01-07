<?php

namespace App\Http\Controllers;

use App\Models\CertificateType;
use Illuminate\Http\Request;

class CertificateTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $certificate_types =  CertificateType::orderBy('id', 'desc')->paginate(10)->setPath('certificate_types');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("certificate_types.index", compact(['certificate_types']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $certificate_type =  new Certificateype;
        return view('certificate_types.create', compact(['certificate_type']));
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
            'name' => 'required',

        ]);

        

        CertificateType::create($request->all());

   
        return redirect()->route('certificate_types.index')
            ->with('success','CertificateType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CertificateType  $certificateType
     * @return \Illuminate\Http\Response
     */
    public function show(CertificateType $certificateType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CertificateType  $certificateType
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificateType $certificate_type)
    {
        //
        return view('certificate_types.edit',compact('certificate_type'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CertificateType  $certificateType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CertificateType $certificate_type)
    {
        //
        $request->validate([
        'name' => 'required',   

        ]);

  
        $certificate_type->update($request->all());

  

        return redirect()->route('certificate_types.index')

                        ->with('success','CertificateType updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CertificateType  $certificateType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        CertificateType::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
