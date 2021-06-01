<?php

namespace App\Http\Controllers;

use App\Models\DocumentRequest;
use App\Models\DocumentType;
use App\Models\StructureCategory;
use Illuminate\Http\Request;
use PDF;

class DocumentRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $document_requests =  DocumentRequest::orderBy('id', 'asc')->get();
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("document_requests.index", compact(['document_requests']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $document_request = new DocumentRequest;
        $document_types =  DocumentType::all();
        $structure_categories =  StructureCategory::all();
        return view('document_requests.create', compact(['document_request', 'document_types', 'structure_categories']));
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
        // If doctor profile.

       

        if (current_user()->isDoctor()){
           $request['doctor_id'] = current_user()->userable_id;
        
           $request['request_location'] = "Bamako";
        //$request['doctor_id'] = current_user()->id;
        $request['status'] = "En attente";
       

        $request->validate([
            'doctor_id' => 'required',
            'document_type_id' => 'required',
            'recipient_civility' => 'required',
            'recipient_function' => 'required',

        ]);

        

        DocumentRequest::create($request->all());

   
        return redirect()->route('document_requests.index')
            ->with('success','La demande a été créé avec succès.');

        }else{
            return back()->withError("Seul un médecin peut faire une demande de document.")->withInput();
        }
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
    public function edit(DocumentRequest $document_request)
    {
        //
        $document_types =  DocumentType::all();
        $structure_categories =  StructureCategory::all();
        return view('document_requests.edit',compact(['document_request', 'document_types', 'structure_categories']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CertificateRequest  $certificateRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentRequest $document_request)
    {
        //

        $request->validate([
            'document_type_id' => 'required',
            'recipient_civility' => 'required',
            'recipient_function' => 'required',

        ]);


        $document_request->update($request->all());

  

        return redirect()->route('document_requests.index')

                        ->with('success','La eemande a été mise à jour avec succès');
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
        DocumentRequest::where('id',$id)->delete();
        return redirect()->back()->with('success','Supprimer avec succès');
    }

    public function download_document_request_pdf($id){
       
        

        $document_request = DocumentRequest::findOrFail($id);
        //dd($document_request);
        
        
        
        

        if ($document_request->document_type->name == "Demande d’agrément"){
            $pdf = PDF::loadView('document_requests.demande_agrement_pdf', compact(['document_request']));
            return $pdf->download("demande_agrement_pdf.pdf");

            //return view('document_requests.demande_agrement_pdf',compact(['document_request']));
        }
        else if($document_request->document_type->name == "Demande de licence d’exploitation"){
            $pdf = PDF::loadView('document_requests.demande_licence_exploitation_pdf', compact(['document_request']));
            return $pdf->download("demande_licence_exploitation_pdf.pdf");
        }
        
    }



     public function validate_request($id)
    {
        $document_request = DocumentRequest::findOrFail($id);
        $document_request->status = "Validée";
        $document_request->update();
        //dd($contribution);

        return redirect()->route('document_requests.index')

                        ->with('success','Demande de document validée avec succès.');

    }

     public function cancel_request($id)
    {
        $document_request = DocumentRequest::findOrFail($id);
        $document_request->status = "Annulée";
        $document_request->update();
        //dd($contribution);

        return redirect()->route('document_requests.index')

                        ->with('success','Demande de document annulée avec succès.');

    }

}
