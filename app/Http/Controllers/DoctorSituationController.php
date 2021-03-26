<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Town;
use App\Models\Neighborhood;
use App\Models\StructureProfile;
use App\Models\DoctorProfile;
use App\Models\StructureCategory;
use App\Models\Speciality;
use PDF;


class DoctorSituationController extends Controller
{
   

    public function situation_locality(Request $request)
    {
        
        
        $results = null;
        $towns =  Town::all();
        $neighborhoods = Neighborhood::all();
        $structure_categories =  StructureCategory::all();
        $specialities =  Speciality::all();

       
        // Get search term

        $speciality_id = $request['speciality_id'];
        $town_id = $request['town_id'];
        $neighborhood_id = $request['neighborhood_id'];
        $approval = $request['approval'];
        $business_license = $request['business_license'];

        

        
       
        
       $results = _situation_locality($speciality_id,$town_id,$neighborhood_id);

        //dd($request);

        return view("doctor_situation.situation_locality", compact(['results', 'towns', 'specialities', 'neighborhoods','town_id', 'neighborhood_id', 'speciality_id']) );
    }

    public function situation_approval(Request $request){
         //

        $results = null;
       
        $specialities =  Speciality::all();

       
        // Get search term

       
        $speciality_id = $request['speciality_id'];
        $approval = $request['approval'];
       

        

        
        
        $results = _situation_approval($speciality_id, $approval );

        return view("doctor_situation.situation_approval", compact(['results', 'specialities', 'approval', 'speciality_id']) );
    }

    public function situation_business_license(Request $request){



        $results = null;
       
        $specialities =  Speciality::all();

       
        // Get search term

       
        $speciality_id = $request['speciality_id'];
        //$approval = $request['approval'];
        $business_license = $request['business_license'];

        

        $results = _situation_business_license($speciality_id, $business_license);

        

        return view("doctor_situation.situation_business_license", compact(['results', 'specialities', 'business_license', 'speciality_id']) );

    }

    public function situation_contribution(Request $request){
        //

        $results = null;
       
        $specialities =  Speciality::all();

       
        // Get search term

       
        $speciality_id = $request['speciality_id'];
        //$approval = $request['approval'];
        $contribution_status = $request['contribution_status'];
        $selected_year = $request['year'];

        

        
        $results = _situation_contribution($speciality_id, $contribution_status, $selected_year);

        

        return view("doctor_situation.situation_contribution", compact(['results', 'specialities', 'contribution_status','selected_year', 'speciality_id']) );

    }

   public function download_doctor_situation_locality_pdf(Request $request){

        $results = null;
        $towns =  Town::all();
        $neighborhoods = Neighborhood::all();
        $structure_categories =  StructureCategory::all();
        $specialities =  Speciality::all();

       
        // Get search term

        $speciality_id = $request['pdf_speciality_id'];
        $town_id = $request['pdf_town_id'];
        $neighborhood_id = $request['pdf_neighborhood_id'];
        

   

    
        
       $results = _situation_locality($speciality_id,$town_id,$neighborhood_id);



        

        $pdf = PDF::loadView('doctor_situation.pdf.doctor_situation_locality_pdf', compact(['results', 'speciality_id', 'town_id', 'neighborhood_id']));
        
        return $pdf->download('doctor-stituation-locality-'.get_current_timestamp().'.pdf');

        /*return view('contributions.statement_pdf',compact(['contributions','sum_total','amount_words']));*/
   }

   public function download_doctor_situation_approval_pdf(Request $request){

        $results = null;
        $towns =  Town::all();
        $neighborhoods = Neighborhood::all();
        $structure_categories =  StructureCategory::all();
        $specialities =  Speciality::all();

       
        // Get search term

        $speciality_id = $request['pdf_speciality_id'];
        $approval = $request['pdf_approval'];
       
        

   

    
        
       $results = _situation_approval($speciality_id,$approval);



        

        $pdf = PDF::loadView('doctor_situation.pdf.doctor_situation_approval_pdf', compact(['results', 'speciality_id', 'approval']));
        
        return $pdf->download('doctor-stituation-approval-'.get_current_timestamp().'.pdf');

        /*return view('contributions.statement_pdf',compact(['contributions','sum_total','amount_words']));*/
   }

   public function download_doctor_situation_business_license_pdf(Request $request){

        $results = null;
        $towns =  Town::all();
        $neighborhoods = Neighborhood::all();
        $structure_categories =  StructureCategory::all();
        $specialities =  Speciality::all();

       
        // Get search term

        $speciality_id = $request['pdf_speciality_id'];
        $business_license = $request['pdf_business_license'];
       
        

   

    
        
       $results = _situation_business_license($speciality_id,$business_license);



        

        $pdf = PDF::loadView('doctor_situation.pdf.doctor_situation_business_license_pdf', compact(['results', 'speciality_id', 'business_license']));
        
        return $pdf->download('doctor-stituation-business-license-'.get_current_timestamp().'.pdf');

        /*return view('contributions.statement_pdf',compact(['contributions','sum_total','amount_words']));*/
   }


    public function download_doctor_situation_contribution_pdf(Request $request){

        $results = null;
        $towns =  Town::all();
        $neighborhoods = Neighborhood::all();
        $structure_categories =  StructureCategory::all();
        $specialities =  Speciality::all();

       
        // Get search term

          $speciality_id = $request['pdf_speciality_id'];
        //$approval = $request['approval'];
        $contribution_status = $request['pdf_contribution_status'];
        $selected_year = $request['pdf_selected_year'];

        

        
        $results = _situation_contribution($speciality_id, $contribution_status, $selected_year);
       
        

        

        $pdf = PDF::loadView('doctor_situation.pdf.doctor_situation_contribution_pdf', compact(['results', 'speciality_id', 'contribution_status', 'selected_year']));
        
        return $pdf->download('doctor-stituation-contribution-'.get_current_timestamp().'.pdf');

        /*return view('contributions.statement_pdf',compact(['contributions','sum_total','amount_words']));*/
   }






      
   
    

}
