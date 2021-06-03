<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImportData;
use App\Models\DoctorOrder;

use Illuminate\Database\QueryException;
use DB;
//use FastExcel;
use Rap2hpoutre\FastExcel\FastExcel;


class ImportExcelController extends Controller
{
    function index()
    {
     $data = DoctorOrder::all();
     return view('import_excel.import_excel', compact('data'));
    }

    function import(Request $request)
    {
      $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);

      $path = $request->file('select_file')->getRealPath();

      $collection = (new FastExcel)->import($path);

     
      foreach ($collection as $key => $value) {
        
        if ($key !== 0){


          $doctor = DoctorOrder::where('reference',$value['Reference'])->get();
          

          if ($doctor->count() == 0){
            
            
            $fullname  = $value['Name'];
            $reference   = $value['Reference'];
         
            
            //dd($insert_data);
            // Processing...
            //ImportData::create($insert_data);
            import_doctor_factory($fullname, $reference);
          }
          
        }
      }

     /*
      $data = Excel::load($path)->get();
      
      if($data->count() > 0){
        foreach($data->toArray() as $key => $value){
          foreach($value as $row){
           
            $doctor = ImportData::where('reference',$row['reference'])->get();
            
            dd($doctor);
            
            $insert_data[] = array(
            'fullname'  => $row['fullname'],
            'reference'   => $row['reference'],
         
            );

          }
        }

        if(!empty($insert_data)){
          DB::table('import_data')->insert($insert_data);
        }
      }

      */
     return back()->with('success', 'Excel Data Imported successfully.');
    }

    function import_data(Request $request){

      //

    }
}