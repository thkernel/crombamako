<?php

  

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;
use Validator,Redirect,Response;

  

class CkeditorController extends Controller

{

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        return view('ckeditor');

    }

  

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function upload(Request $request)

    {
        
        if($request->hasFile('upload')) {

            $originName = $request->file('upload')->getClientOriginalName();

            $fileName = pathinfo($originName, PATHINFO_FILENAME);

            $extension = $request->file('upload')->getClientOriginalExtension();

            $fileName = $fileName.'_'.time().'.'.$extension;

        

            //$request->file('upload')->move(public_path('images'), $fileName);

            $request->file('upload')->storeAs("ckeditor",$fileName, 'public');


   

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');

            $url = asset('storage/ckeditor/'.$fileName); 

            $msg = 'Fichier téléchargé avec succès.'; 

            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

               

            @header('Content-type: text/html; charset=utf-8'); 

            echo $response;

        }

    }

}