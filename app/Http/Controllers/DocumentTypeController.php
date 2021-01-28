<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $document_types =  DocumentType::orderBy('id', 'desc')->paginate(10)->setPath('document_types');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("document_types.index", compact(['document_types']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $document_type =  new DocumentType;
        return view('document_types.create', compact(['document_type']));
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

        

        DocumentType::create($request->all());

   
        return redirect()->route('document_types.index')
            ->with('success','DocumentType created successfully.');
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
    public function edit(DocumentType $document_type)
    {
        //
        return view('document_types.edit',compact('document_type'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CertificateType  $certificateType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentType $document_type)
    {
        //
        $request->validate([
        'name' => 'required',   

        ]);

  
        $document_type->update($request->all());

  

        return redirect()->route('document_types.index')

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
        DocumentType::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
