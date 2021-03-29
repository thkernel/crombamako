<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\PriceConfiguration;
use App\Models\ContributionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DoctorProfile;
use App\Models\Role;
use App\Models\Town;
use App\Models\Neighborhood;
use App\Mail\ContributionMail;
use PDF;
use NumberToWords\NumberToWords;
use Carbon\Carbon;
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
        if (current_user()->isDoctor()){
            $contributions = current_user()->userable->contributions;
        }
        else{
        $contributions =  Contribution::where("status",  "Payée")->get();
        }

        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("contributions.index", compact(['contributions']) );
    }

    public function download_statement_pdf(Request $request)
    {

        //$search_terms = $request['search_terms'];

        $start_date = $request['pdf_start_date'];
        $end_date = $request['pdf_end_date'];

        $town_id = $request['pdf_town_id'];
        $neighborhood_id = $request['pdf_neighborhood_id'];


        $current_timestamp = Carbon::now()->timestamp;

        $contributions = _statement($start_date, $end_date, $town_id, $neighborhood_id);

        if ($contributions){
            $sum_total = $contributions->sum('total_amount');
        }else{
            $sum_total = 0;
        }

        // create the number to words "manager" class
        $numberToWords = new NumberToWords();

        // build a new number transformer using the RFC 3066 language identifier
        $numberTransformer = $numberToWords->getNumberTransformer('fr');

        $amount_words = $numberTransformer->toWords($sum_total);
        $amount_words = ucwords($amount_words). " (". $sum_total .")". " F CFA" ;
        
        $pdf = PDF::loadView('contributions.statement_pdf', compact(['contributions','sum_total', 'amount_words', 'start_date', 'end_date','town_id','neighborhood_id']));
        
        return $pdf->download('etat-paiement-'.$current_timestamp.'.pdf');

        /*return view('contributions.statement_pdf',compact(['contributions','sum_total','amount_words']));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $price_configuration = PriceConfiguration::get()->first();
        $contribution = new Contribution;
        //$doctor = DB::table('roles')->whereName('Médecin')->first();
        $doctors =  DoctorProfile::all();
        //$doctors =  User::all();

        return view("contributions.create", compact(['doctors', 'contribution','price_configuration']) );
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

        $request['status'] = "Payée";

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


        $doctor = DoctorProfile::find($request['doctor_id']);
        $doctor_contributions = $doctor->contributions;

         
        $contribution_ids = [];
        $contribution_item_years = [];

        foreach($doctor_contributions as $doctor_contribution){
            array_push($contribution_ids, $doctor_contribution->id);
        }

    
        $insertion = false;

        $doctor_contribution_items = ContributionItem::whereIn('contribution_id', $contribution_ids)->get();
        

        foreach($doctor_contribution_items as $doctor_contribution_item){
            
            array_push($contribution_item_years, $doctor_contribution_item->year);
            
        }

        //dd($contribution_item_years);
        
        if ($contribution && $contribution_items){
            

            foreach($contribution_items as $contribution_item){
                $item = [
                    "contribution_id" => $contribution->id,
                    "year" => intval($contribution_item),
                    "amount" => $amount
                ];


                

               if (!in_array(intval($contribution_item), $contribution_item_years)){
                    ContributionItem::create($item);
                    $insertion = true;
                }
                else{
                    if (!$insertion){
                        $contribution->delete();
                        return redirect()->route('contributions.index')
            ->with('error','Opération annulée. La cotisation pour '.intval($contribution_item). ' a été déjà payée pour le médecin sélectionné.');

                    }
                }


                            
                            
           

               
                
            } 
        }

        // Get doctor instance for prepare sending.
        $doctor = DoctorProfile::find($contribution->doctor_id);
        

        // Send email
        \Mail::to($doctor->email)->send(new ContributionMail($contribution));
   
        return redirect()->route('contributions.index')
            ->with('success','Cotisation créée avec succès.');
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
         $price_configuration = PriceConfiguration::get()->first();
        $doctors =  DoctorProfile::all();



        
        return view('contributions.edit',compact(['contribution', 'doctors', 'price_configuration']));

    }


    public function cancel($id)
    {
        $contribution = Contribution::findOrFail($id);
        $contribution->status = "Annulée";
        $contribution->update();
        //dd($contribution);

        return redirect()->route('contributions.index')

                        ->with('success','Cotisation a été annulée avec succès.');

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

                        ->with('success','La cotisation a bien été mise à jour');
    }

    public function statement(Request $request){

        $towns =  Town::all();
        $neighborhoods = Neighborhood::all();
        $doctors =  DoctorProfile::all();
        $contributions = Contribution::all();
        
        $search_terms = $request['search_terms'];

        $start_date = $request['start_date'];
        $end_date = $request['end_date'];

        $town_id = $request['town_id'];
        $neighborhood_id = $request['neighborhood_id'];
        
            


        $contributions = _statement($start_date, $end_date, $town_id, $neighborhood_id);
       
        if ($contributions){
            $sum_total = $contributions->sum('total_amount');
        }else{
            $sum_total = 0.0;
        }

        return view('contributions.statement', compact(['contributions', 'towns', 'neighborhoods',  'sum_total', 'search_terms', 'start_date', 'end_date',  'town_id', 'neighborhood_id']));
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
        return redirect()->back()->with('success','Supprimer avec succès');
    }
}
