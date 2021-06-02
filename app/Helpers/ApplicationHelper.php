<?php
    use Illuminate\Database\QueryException;
	use App\Models\ActivityLog;
	use App\Models\SubscriptionRequest;
	use App\Models\Role;
	use App\Models\User;
	use App\Models\DoctorProfile;
    use App\Models\DoctorOrder;
	use App\Models\StructureCategory;
	use App\Models\EloquentStorageBlob;
	use App\Models\EloquentStorangeAttachment;
    use App\Models\Feature;
    use App\Models\Permission;
    use App\Models\Town;
    use App\Models\Neighborhood;
    use App\Models\Speciality;
    use App\Models\StructureProfile;
    use App\Models\Contribution;
    use App\Models\Organization;


	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Str;
	use Carbon\Carbon;
	use Illuminate\Support\Facades\DB;

    use Illuminate\Container\Container;
    //use File;
    use Illuminate\Support\Facades\File;

    use Illuminate\Auth\Events\Registered;
    use Intervention\Image\Facades\Image as Image;


    function get_current_timestamp(){
        $current_timestamp = Carbon::now()->timestamp;
        return $current_timestamp;

    }

    function speciality_object($id){
        $speciality = Speciality::find($id);
        return $speciality;

    }
    function hasOrganization(){
        $organization = Organization::first();
        if ($organization){
            return true;
        }else{
            return false;
        }
    }

    function organization(){
        $organization = Organization::first();
        return $organization;
    }

    function structure_category_object($id){
        $s = StructureCategory::find($id);
        return $s;

    }
    function town_object($id){
        $town = Town::find($id);
        return $town;

    }

    function neighborhood_object($id){
        $neighborhood = Neighborhood::find($id);
        return $neighborhood;

    }

    /* Get current user */

	function current_user(){
		$user = auth()->user();
		return $user;
	}

    /* Formate date */
	function format_date($date, $format){
		return Carbon::parse($date)->format($format);
	}

    /* Get all Eloquent models */
    function get_all_models(){
        $appNamespace = Container::getInstance()->getNamespace();
        $modelNamespace = 'Models';

        $models = collect(File::allFiles(app_path($modelNamespace)))->map(function ($item) use ($appNamespace, $modelNamespace) {
            $rel   = $item->getRelativePathName();
            $class = sprintf('\%s%s%s', $appNamespace, $modelNamespace ? $modelNamespace . '\\' : '',
                implode('\\', explode('/', substr($rel, 0, strrpos($rel, '.')))));
            return class_exists($class) ? $class : null;
        })->filter();

        
        $models_array = [];

        foreach ($models as $key => $value) {
            //$m = explode('\\', $value);
            array_push($models_array, explode('\\', $value)[3] );

        }
        return collect($models_array)->except(['Application']);
    }


    /* Display side menu based on user role */

    function isDoctorEnable(DoctorProfile $doctor_profile){

        
        if ($doctor_profile->status == "enable"){
            return true;
        }
        else {
            return false;
        }
        
       
    }

    /* Display side menu based on user role */

	function sidebar_menu(){

		if (!empty(current_user())){
			if (current_user()->isSuperUser()){
				$view = view("layouts/partials/dashboard/navs/_superuser-nav");
				return $view;
			}
			else if (current_user()->isAdmin()){
				$view = view("layouts/partials/dashboard/navs/_admin-nav");
				return $view;
			}
			else if (current_user()->isDoctor()){
				$view = view("layouts/partials/dashboard/navs/_doctor-nav");
				return $view;
			}
		}

 
	}


    /* Load authorization */

    function authorize_resource($action_name, $class_name){


        $feature = Feature::where('subject_class', $class_name )->first();

        

        if ($feature){
            $permission = Permission::where('user_id', current_user()->id)->where('feature_id', $feature->id)->first();


        
            $abilities = [];

            if ($permission ){

                $permission_items = $permission->permission_items;

                foreach ($permission_items as $permission_item) {
                    array_push($abilities, strtolower($permission_item->action_name));
                }

                return in_array($action_name, $abilities);
            }
            else{
                return false;
            }
            

        }
        else{


            return false;
        }
        
           


    }

	/* Used to storage files */

	function eloquent_storage_service($record, $request, $allowedfileExtension, $fileInputName, $storage_directory){
		

		if ($record){

            if($request->hasFile($fileInputName)){
                
                $files = $request->file($fileInputName);
                
                if (is_array($files)){
                
                    foreach($files as $file){
                        $current_timestamp = Carbon::now()->timestamp;

                        // For blob
                        $key = Str::random(40);
                        $filename = $file->getFileName();
                        $original_filename = $file->getClientOriginalName();
                        $content_type = $file->getClientMimeType();
                        $meta_data = '';
                        $byte_size = $file->getSize();
                        $checksum = md5_file($file->getPathName());
                        $extension = $file->getClientOriginalExtension();
                        $check = in_array($extension,$allowedfileExtension);

                        $tab = [$key, $filename, $original_filename, $content_type, $meta_data, $byte_size, $checksum];
                        
                        
                        
                        if($check){

                            


                            // create blob
                            $blob = new EloquentStorageBlob;
                            $blob->key = $key;
                            $blob->filename = $current_timestamp."_".$original_filename;
                            $blob->content_type = $content_type;
                            $blob->metadata = $meta_data;
                            $blob->byte_size = $byte_size;
                            $blob->checksum = $checksum;
                            $blob->save();

                            //dd($blob);

                           	
                            $attachment = $record->attachments()->create([
                                    "blob_id" => $blob->id,
                                    "name" => $fileInputName
                                ]
                            );

                               
                               

                            if ($attachment){
                                $file->storeAs($storage_directory,$current_timestamp."_".$original_filename, 'public');
                                
                            }

                            
                        }
                    }

                }
                else{



                        $current_timestamp = Carbon::now()->timestamp;
                        // For blob
                        $file = $files;
                        $key = Str::random(40);
                        $filename = $file->getFileName();
                        $original_filename = $file->getClientOriginalName();
                        $content_type = $file->getClientMimeType();
                        $meta_data = '';
                        $byte_size = $file->getSize();
                        $checksum = md5_file($file->getPathName());
                        $extension = $file->getClientOriginalExtension();
                        $check = in_array($extension,$allowedfileExtension);

                        $tab = [$key, $filename, $original_filename, $content_type, $meta_data, $byte_size, $checksum];
                        
                        
                        
                        if($check){
                            $original_filename = str_replace(' ', '',$current_timestamp."_".$original_filename);
                            
                            // create blob
                            $blob = new EloquentStorageBlob;
                            $blob->key = $key;
                            $blob->filename = $original_filename;
                            $blob->content_type = $content_type;
                            $blob->metadata = $meta_data;
                            $blob->byte_size = $byte_size;
                            $blob->checksum = $checksum;
                            $blob->save();



                            // Delete attachment
                            $record_attachment = $record->attachment;
                            if ($record_attachment){

                                $temp_blob = $record_attachment->blob;

                                $record_attachment->delete();
                                $temp_blob->delete();
                                //dd($record_attachment);

                            }
                            // Delete blob


                            $attachment = $record->attachment()->create([
                                    "blob_id" => $blob->id,
                                    "name" => $fileInputName
                                ]
                            );

                               
                            if ($attachment){
                                
                                $file->storeAs($storage_directory,$original_filename, 'public');

                                $imageExtension = ['jpeg','jpg','png'];
                                $isImage = in_array($extension,$imageExtension);
                                // Resize image.
                                // Before, we check if image file.
                                if ($isImage){
                                    resize_image($original_filename,$storage_directory);
                                }
                                
                                
                            }



                            
                        
                    }

                }
            }
        }

	}

    /* Activities logger */
	function activities_logger($controller, $action, $params){

		$client_ip = getUserIpAddr();
		$browser = $_SERVER['HTTP_USER_AGENT'];

		$log = new ActivityLog;
		
		$log->ip_address = $client_ip;
		$log->browser = $browser;
		$log->controller = $controller;
		$log->action = $action;
		$log->params = $params;

		if (!empty(current_user())){
			$log->user_id = current_user()->id;
		}

		$log->save();
 
	}

	/*
	Create user account after subscription validation.
	*/

	function doctor_factory($subscription_request){
		try{

    		

            
                // create profile
                $doctor_profile = DoctorProfile::create([
                "sex" => $subscription_request->sex,
                "first_name" => $subscription_request->first_name,
                "last_name" => $subscription_request->last_name,
                "address" => $subscription_request->address,
                "email" => $subscription_request->email,
                "phone" => $subscription_request->phone,
                "town_id" => $subscription_request->town_id,
                "neighborhood_id" => $subscription_request->neighborhood_id,
                "service_id" => $subscription_request->service_id,
                "is_specialist" => $subscription_request->is_specialist,
                "speciality_id" => $subscription_request->speciality_id,
                "structure_id" => $subscription_request->structure_id,
                ]);

                // Save profile
                //$doctor_profile = $doctor_profile->save();
                
                //$doctor_profile->user()->save($doctor_user);

                $year = Carbon::parse(date('Y-m-d H:i:s'))->format("Y");
                
                $reference = last_doctor_reference($year);
                

                // Add doctor to the doctor order.
                $doctor_order = [
                    "reference" => $reference,
                    "doctor_id" => $doctor_profile->id,
                    "year" => $year,
                    "status" => 'enable',
                    "user_id" => current_user()->id
                ];

                $doctor_order = DoctorOrder::create($doctor_order);


                // create account.
                if ($doctor_profile){
                
                    $doctor_user = create_doctor_account($doctor_profile, $doctor_order->reference, $subscription_request->email, 'Médecin' );
                }
               
            

            return $doctor_profile;

        }catch(QueryException $e){
            $error_code = $e->errorInfo[0];
                 
            if($error_code == 23505){
                
                //return back()->withError("Un médecin avec la même adresse email".' existe déjà.')->withInput();
                return back()->withError($e->getMessage())->withInput();
            }else{
                return back()->withError($e->getMessage())->withInput();
            }
            
        }

		
	}

	function send_mail(){

	}

    /* Create user account */
	function create_doctor_account($doctor_profile, $doctor_order_reference, $email, $role, $verified=true){
        try{

    		$role = Role::whereName($role)->first();

            // generate login and password
            //$random_str = strtolower(Str::random(8));
            //$login = strtolower($last_name.'_'.$random_str);
            $password = explode("@", $email)[0]."".$doctor_profile->id;
            //$login = explode("°", $doctor_order_reference)[1];
            $login = $doctor_order_reference;
            $password = Hash::make($password);

            
           
            
            $user = [
                    "login" => $login,
                    "password" => $password,
                    "userable_type" => get_class($doctor_profile),
                    "userable_id" => $doctor_profile->id,
                    "email" => $email,
                    "role_id" => $role->id,
                    
            ];

            $user = User::create($user);
            
           
          
            event(new Registered($user));
            return $user;

        }catch(QueryException $e){
            $error_code = $e->errorInfo[0];
                 
            if($error_code == 23505){
                
                return back()->withError("Login ou Email".', existe déjà.')->withInput();
            }else{
                return back()->withError($e->getMessage())->withInput();
            }
            
        }

	}



    /* Create structure account */
    function create_structure_account($structure_profile, $email, $role, $verified=true){
        try{

            $role = Role::whereName($role)->first();

            // generate login and password
            //$random_str = strtolower(Str::random(8));
            //$login = strtolower($last_name.'_'.$random_str);
            $password = explode("@", $email)[0]."".$structure_profile->id;
            $login = explode("@", $email)[0];
            $password = Hash::make($password);

            
           
            
            $user = [
                    "login" => $login,
                    "password" => $password,
                    "userable_type" => get_class($structure_profile),
                    "userable_id" => $structure_profile->id,
                    "email" => $email,
                    "role_id" => $role->id,
                    
            ];

            $user = User::create($user);
            
           
          
            event(new Registered($user));
            return $user;

        }catch(QueryException $e){
            $error_code = $e->errorInfo[0];
                 
            if($error_code == 23505){
                
                return back()->withError("Login ou Email".', existe déjà.')->withInput();
            }else{
                return back()->withError($e->getMessage())->withInput();
            }
            
        }

    }




    /* Get user IP */

	function getUserIpAddr(){
    	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	        //ip from share internet
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	        //ip pass from proxy
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }else{
	        $ip = $_SERVER['REMOTE_ADDR'];
	    }

	    return $ip;
	}

    function contribution_selected_years($contribution_items, $current_year){


        $contribution_items_array = [];

        foreach($contribution_items as $contribution_item){
           array_push($contribution_items_array, $contribution_item->year);
        }
            
        return in_array($current_year, $contribution_items_array);
    }

    function visit_summary_selected_doctors($staff, $doctor_id){


        $staff_array = [];

        foreach($staff as $staff_item){
           array_push($staff_array, $staff_item->doctor_id);
        }
            
        return in_array($doctor_id, $staff_array);
    }

    function selected_prestations($prestations, $prestation_id){


        $prestations_array = [];

        foreach($prestations as $prestation_item){
           array_push($prestations_array, $prestation_item->prestation_id);
        }
            
        return in_array($prestation_id, $prestations_array);
    }


    function selected_services($services, $service_id){


        $services_array = [];

        foreach($services as $service_item){
           array_push($services_array, $service_item->service_id);
        }
            
        return in_array($service_id, $services_array);
    }

    


    function selected_abilities($permission_items, $current_action){


        $permission_items_array = [];

        foreach($permission_items as $permission_item){
           array_push($permission_items_array, $permission_item->action_name);
        }
            
        return in_array($current_action, $permission_items_array);
    }
	

	function years_list(){
		$years = collect(array_reverse(range(1970, 2030)))->map(function ($item) {
    return  $item;

});

		return $years;
	}




function structure_logo($structure, $alt_tag, $class_name,  $dimension_name=null){
    

      
    if  ($structure->attachment){
        if ($dimension_name){
            $filename = $structure->attachment->blob->filename;
            $image_dimensions = config("global.image_dimensions");

            $current_dimension = $image_dimensions[$dimension_name];
            return "<img src=". asset("storage/logos/".$current_dimension."-".$filename).">";

        }

    }
    
    else{
        return '<img src="/images/post-missing.jpg"  alt="">';
         
    }


}



function post_thumbnail($post, $alt_tag, $class_name, $dimension_name=null){
    
    

      
    if  ($post->attachment){
        if ($dimension_name){
            $filename = $post->attachment->blob->filename;
            $image_dimensions = config("global.image_dimensions");

            $current_dimension = $image_dimensions[$dimension_name];
            return "<img src=". asset("storage/posts/".$current_dimension."-".$filename).">";

        }
        /*
        else{
        
        //dd(asset("storage/app/public/posts/".$post->attachment->blob->filename));
        return "<img src=". asset("storage/posts/".$post->attachment->blob->filename) .">";
        }
        */

    }
    
    else{
        return '<img src="/images/post-missing.jpg"  alt="">';
         
    }


}

function opportunity_thumbnail($opportunity, $alt_tag, $class_name, $dimension_name=null){
    
    

      
    if  ($opportunity->attachment){
        
       if ($dimension_name){
            $filename = $opportunity->attachment->blob->filename;
            $image_dimensions = config("global.image_dimensions");

            $current_dimension = $image_dimensions[$dimension_name];
            return "<img src=". asset("storage/opportunities/".$current_dimension."-".$filename).">";

        }
        /*
        else{
        
       
        return "<img src=". asset("storage/opportunities/".$opportunity->attachment->blob->filename) .">";
        }
        */

    }
    
    else{
        return '<img src="/images/post-missing.jpg"  alt="">';
         
    }


}



function doctor_avatar($doctor, $alt_tag, $class_name){
   
      
    
    
   
        return '<img src="/images/avatar-missing.png"  class="" alt="">';
         
   

}
 
function translate_ability($ability){
    $abilities = config('global.abilities');
    return $abilities[$ability];

}

function last_doctor_reference($year){
    

    // Get the latest record.
    $last_doctor_order = DoctorOrder::where('year', $year)->latest()->first();

    if ($last_doctor_order){
        $id = $last_doctor_order->id;
        $id_to_str = strval($id);
        $str_size = strlen($id_to_str);

        if ($str_size == 1 ){
            
            if ($id == 9){
                $sn = $last_doctor_order->id + 1;
                $reference = "0". $sn ."/". Carbon::parse(date('Y-m-d H:i:s'))->format("y") . "/D";

            }else{
                $sn = $last_doctor_order->id + 1;
                $reference = "00". $sn  ."/". Carbon::parse(date('Y-m-d H:i:s'))->format("y") . "/D";
            }
            
        }
        else if ($str_size == 2 ){

            if ($id == 99){
                $sn = $last_doctor_order->id + 1;

                $reference = "". $sn ."/". Carbon::parse(date('Y-m-d H:i:s'))->format("y") . "/D";

            }else{
                $sn = $last_doctor_order->id + 1;
                $reference = "0". $sn ."/". Carbon::parse(date('Y-m-d H:i:s'))->format("y") . "/D";
            }
            
        }
        else if ($str_size >= 3 ){
            if ($id >= 999){
                $sn = $last_doctor_order->id + 1;
                $reference = "". $sn ."/". Carbon::parse(date('Y-m-d H:i:s'))->format("y") . "/D";

            }else{
                $sn = $last_doctor_order->id + 1;
                $reference = "". $sn ."/". Carbon::parse(date('Y-m-d H:i:s'))->format("y") . "/D";

            }
            
        }
        

    }else{

        $reference = "00". 1 ."/". Carbon::parse(date('Y-m-d H:i:s'))->format("y") . "/D";
        
    }

    return $reference;
}


/* */
function _situation_locality($speciality_id,$town_id,$neighborhood_id){
   
        $results = null;
         // 1 - cas Structure
        
        if ($speciality_id && $town_id && $neighborhood_id){
            $results = DoctorProfile::where('speciality_id', $speciality_id)->where('town_id', $town_id)->where('neighborhood_id', $neighborhood_id)->get();
        }
        
        else if ($speciality_id && $town_id){
            $results = DoctorProfile::where('speciality_id', $speciality_id)->where('town_id', $town_id)->get();

        }else if ($speciality_id && $neighborhood_id){
            $results = DoctorProfile::where('speciality_id', $speciality_id)->where('neighborhood_id', $neighborhood_id)->get();
        }else if ($town_id && $neighborhood_id){
            $results = DoctorProfile::where('town_id', $town_id)->where('neighborhood_id', $neighborhood_id)->get();
        }else if ($speciality_id){
            $results = DoctorProfile::where('speciality_id', $speciality_id)->get();
            
        }
        else if ($town_id){
            $results = DoctorProfile::where('town_id', $town_id)->get();
            
        }

        return $results;
}



function _situation_approval($speciality_id, $approval ){
         //

        $results = null;
       
       

        
        
        // 1 - cas Structure
        
        if ($speciality_id  && $approval == "Sans agréement"){
            $results = DoctorProfile::where('speciality_id', $speciality_id)->get();

            $doctors = $results;

            $doctors_with_approval_ids = [];
            

          

            foreach ($doctors as $doctor) {
               $doctor_approval = $doctor->approval;

               if (count($doctor_approval) <= 0){
                array_push($doctors_with_approval_ids, $doctor->id);
               }
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_approval_ids)->get();

        }
        
        else if ($speciality_id && $approval == "Avec agréement"){
            $results = DoctorProfile::where('speciality_id', $speciality_id)->get();

            $doctors = $results;

            $doctors_with_approval_ids = [];
            

          

            foreach ($doctors as $doctor) {
               $doctor_approval = $doctor->approval;

               if (count($doctor_approval) > 0){
                array_push($doctors_with_approval_ids, $doctor->id);
               }
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_approval_ids)->get();

        }
        else if ($approval == "Avec agréement"){
            $doctors = DoctorProfile::all();

            $doctors_with_approval_ids = [];
            

          

            foreach ($doctors as $doctor) {
               $doctor_approval = $doctor->approval;

               if (count($doctor_approval) > 0){
               
                array_push($doctors_with_approval_ids, $doctor->id);
               }
            }

           
            $results = DoctorProfile::whereIn('id', $doctors_with_approval_ids)->get();

            
            

            
        }
        else if ($approval == "Sans agréement"){
            $doctors = DoctorProfile::all();

            $doctors_with_approval_ids = [];
            

          

            foreach ($doctors as $doctor) {
               $doctor_approval = $doctor->approval;

               if (count($doctor_approval) <= 0){
                array_push($doctors_with_approval_ids, $doctor->id);
               }
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_approval_ids)->get();
        }

        

        return $results;
    }
  


function _situation_business_license($speciality_id,$business_license){



        $results = null;
       
    

        
        // 1 - cas Structure
        
        if ($speciality_id  && $business_license == "Sans licence"){
            $results = DoctorProfile::where('speciality_id', $speciality_id)->get();

            $doctors = $results;

            $doctors_with_business_license_ids = [];
            

          

            foreach ($doctors as $doctor) {
               $doctor_business_license = $doctor->business_license;

               if (count($doctor_business_license) <= 0){
                array_push($doctors_with_business_license_ids, $doctor->id);
               }
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_business_license_ids)->get();

        }
        
        else if ($speciality_id && $business_license == "Avec licence"){
            $results = DoctorProfile::where('speciality_id', $speciality_id)->get();

            $doctors = $results;

            $doctors_with_business_license_ids = [];
            

          

            foreach ($doctors as $doctor) {
               $doctor_business_license = $doctor->business_license;

               if (count($doctor_business_license) > 0){
                array_push($doctors_with_business_license_ids, $doctor->id);
               }
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_business_license_ids)->get();

        }
        else if ($business_license == "Avec licence"){
            $doctors = DoctorProfile::all();

            $doctors_with_business_license_ids = [];
            

          

            foreach ($doctors as $doctor) {
               $doctor_business_license = $doctor->business_license;

               if (count($doctor_business_license) > 0){
               
                array_push($doctors_with_business_license_ids, $doctor->id);
               }
            }

           
            $results = DoctorProfile::whereIn('id', $doctors_with_business_license_ids)->get();

            
            

            
        }
        else if ($business_license == "Sans licence"){
            $doctors = DoctorProfile::all();

            $doctors_with_business_license_ids = [];
            

          

            foreach ($doctors as $doctor) {
               $doctor_business_license = $doctor->business_license;

               if (count($doctor_business_license) <= 0){
                array_push($doctors_with_business_license_ids, $doctor->id);
               }
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_business_license_ids)->get();
        }

        

        return $results;

    }


function _situation_contribution($speciality_id,$contribution_status, $selected_year ){
        //

        $results = null;
       
        

        
        // 1 - cas Structure
        
        if ($speciality_id  && $contribution_status == "A jour" && $selected_year){
            
            $results = DoctorProfile::where('speciality_id', $speciality_id)->get();

            $doctors = $results;

            $doctors_with_contribution_ids = [];
            

            //dd($doctors);

            foreach ($doctors as $doctor) {
                $doctor_contributions = $doctor->contributions;

                $flag = false;
                foreach ($doctor_contributions as $doctor_contribution) {
                    $doctor_contribution_items = $doctor_contribution->contribution_items->where('year', $selected_year);
                    
                    if ($doctor_contribution_items->count() > 0 && $doctor_contribution->status == "Payée"){
                        $flag = true;
                        array_push($doctors_with_contribution_ids, $doctor_contribution->doctor_id);
                        break 1;
                    }



                    
                }
              
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_contribution_ids)->get();

        }
        else if ($speciality_id  && $contribution_status == "Non à jour" && $selected_year){
            
            $results = DoctorProfile::where('speciality_id', $speciality_id)->get();

            $doctors = $results;

            $doctors_with_contribution_ids = [];
            

            //dd($doctors);

            foreach ($doctors as $doctor) {
                $doctor_contributions = $doctor->contributions;

                $flag = false;
                foreach ($doctor_contributions as $doctor_contribution) {
                    $doctor_contribution_items = $doctor_contribution->contribution_items->where('year', $selected_year);
                    
                    if ($doctor_contribution_items->count() <= 0 ){
                        $flag = true;
                        array_push($doctors_with_contribution_ids, $doctor_contribution->doctor_id);
                        break 1;
                    }



                    
                }
              
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_contribution_ids)->get();

        }
        
        else if ($contribution_status == "A jour" &&  $selected_year){
            
            $results = DoctorProfile::all();


            $doctors = $results;

            $doctors_with_contribution_ids = [];
            

            //dd($doctors);

            foreach ($doctors as $doctor) {
                $doctor_contributions = $doctor->contributions;

                $flag = false;
                foreach ($doctor_contributions as $doctor_contribution) {
                    $doctor_contribution_items = $doctor_contribution->contribution_items->where('year', $selected_year);
                    
                    if ($doctor_contribution_items->count() > 0 && $doctor_contribution->status == "Payée"){

                        $flag = true;
                        array_push($doctors_with_contribution_ids, $doctor_contribution->doctor_id);
                        break 1;
                    }



                    
                }
              
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_contribution_ids)->get();
            
            

            
        }
        else if ($contribution_status == "Non à jour" && $selected_year){
            $results = DoctorProfile::all();


            $doctors = $results;

            $doctors_with_contribution_ids = [];
            

            //dd($doctors);

            foreach ($doctors as $doctor) {
                $doctor_contributions = $doctor->contributions;

                $flag = false;
                foreach ($doctor_contributions as $doctor_contribution) {
                    $doctor_contribution_items = $doctor_contribution->contribution_items->where('year', $selected_year);
                    
                    if ($doctor_contribution_items->count() <= 0){

                        $flag = true;
                        array_push($doctors_with_contribution_ids, $doctor_contribution->doctor_id);
                        break 1;
                    }



                    
                }
              
            }

            
            $results = DoctorProfile::whereIn('id', $doctors_with_contribution_ids)->get();
        }

        

        return $results;

    }



    function _structure_situation($structure_category_id,$town_id,$neighborhood_id )
    {
        //

        $results = null;
       

        
        // 1 - cas Structure
        
        if ($structure_category_id && $town_id && $neighborhood_id){
            $results = StructureProfile::where('structure_category_id', $structure_category_id)->where('town_id', $town_id)->where('neighborhood_id', $neighborhood_id)->get();
        }
        
        else if ($structure_category_id && $town_id){
            $results = StructureProfile::where('structure_category_id', $structure_category_id)->where('town_id', $town_id)->get();

        }else if ($structure_category_id && $neighborhood_id){
            $results = StructureProfile::where('structure_category_id', $structure_category_id)->where('neighborhood_id', $neighborhood_id)->get();
        }else if ($town_id && $neighborhood_id){
            $results = StructureProfile::where('town_id', $town_id)->where('neighborhood_id', $neighborhood_id)->get();
        }else if ($structure_category_id){
            $results = StructureProfile::where('structure_category_id', $structure_category_id)->get();
            
        }
        else if ($town_id){
            $results = StructureProfile::where('town_id', $town_id)->get();
            
        }

        

        
        


        //dd($request);

        return $results;
    }



    function _statement($start_date,$end_date,$town_id,$neighborhood_id ){

        
            


        // Check if request content the  search terms
        
        // By date.
        if (isset($start_date)  && isset($end_date) && $start_date != null && $end_date != null){

        

            $contributions = Contribution::whereDate('created_at','>=',$start_date)
            ->whereDate('created_at','<=',$end_date)
            ->where('status', "Payée")
            ->get();

        }

        // By date and town.
        if (isset($start_date)  && isset($end_date) && $start_date != null && $end_date != null && isset($town_id) && $town_id != null ){

    
            $contributions = Contribution::whereDate('created_at','>=',$start_date)
            ->whereDate('created_at','<=',$end_date)
            ->where('status', "Payée")
            ->get();

            $doctors = DoctorProfile::where("town_id",$town_id)->get();

            $doctor_ids = [];
            foreach ($doctors as $doctor) {
                array_push($doctor_ids , $doctor->id);
            }
            $contributions->whereIn("doctor_id",$doctor_ids);

        }

        //By date and neighborhood.
        if (isset($start_date)  && isset($end_date) && $start_date != null && $end_date != null  && isset($neighborhood_id) && $neighborhood_id != null ){

            
            
            
            $contributions = Contribution::whereDate('created_at','>=',$start_date)
            ->whereDate('created_at','<=',$end_date)
            ->where('status', "Payée")
            ->get();

            $doctors = DoctorProfile::where("neighborhood_id",$neighborhood_id)->get();

            $doctor_ids = [];
            foreach ($doctors as $doctor) {
                array_push($doctor_ids , $doctor->id);
            }

            $contributions->whereIn("doctor_id",$doctor_ids);

        }

        //By date, town and neighborhood.
        if (isset($start_date)  && isset($end_date) && $start_date != null && $end_date != null && isset($town_id) && $town_id != null && isset($neighborhood_id) && $neighborhood_id != null ){

            
            
            
            $contributions = Contribution::whereDate('created_at','>=',$start_date)
            ->whereDate('created_at','<=',$end_date)
            ->where('status', "Payée")
            ->get();


            $doctors = DoctorProfile::where("neighborhood_id",$neighborhood_id)->get();

            $doctor_ids = [];
            foreach ($doctors as $doctor) {
                array_push($doctor_ids , $doctor->id);
            }

            $contributions->whereIn("doctor_id",$doctor_ids);

        }
       
    

        return $contributions;
    }


    //
    function resize_image($file_name, $directory){
        // Loop images dimensions.
        $image_dimensions = collect(config('global.image_dimensions'));
        
        foreach ($image_dimensions as $key => $value) {
            $sizes = explode("x", $value);
            $width = $sizes[0];
            $height = $sizes[1];

            $img = Image::make(storage_path("app/public/".$directory."/".$file_name))->resize($width, $height);
        
        $img->save(storage_path("app/public/".$directory."/".$value."-".$file_name));
            
        }
    }




    function import_doctor_factory($fullname, $reference){
        try{

                $sex = "Masculin";
                $town_id = Town::first()->id;
               
                $neighborhood_id = Neighborhood::first()->id;
                $is_specialist = "Oui";
                $speciality_id = Speciality::first()->id;
                
                $email = get_current_timestamp() ."@mail.com"  ;
                $phone = get_current_timestamp();
                $year = explode("/", $reference)[1];
                

                //dd($year);
                
            
                $s_fullname = explode(" ", $fullname);
                //dd($s_fullname);

                if (count($s_fullname) >= 3){
                    $last_name = $s_fullname[0] ." ". $s_fullname[1];
                   
                    array_shift($s_fullname);
                    array_shift($s_fullname);
                    $first_name = implode(" ",$s_fullname);
                    
                }
                else{
                    $last_name = $s_fullname[0] ;
                    array_shift($s_fullname);
                    $first_name =  implode(" ",$s_fullname);
                }
                
               

                
        
            

                $new_doctor = array(
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "sex" => $sex,
                    "town_id" => $town_id,
                    "neighborhood_id" => $neighborhood_id,
                    "is_specialist" => $is_specialist,
                    "speciality_id" => $speciality_id,
                    "email" => $email,
                    "phone" => $phone

                );

                //dd($new_doctor);

                // create profile
                $doctor_profile = DoctorProfile::create($new_doctor);

            

                // Add doctor to the doctor order.
                $doctor_order = [
                    "reference" => $reference,
                    "doctor_id" => $doctor_profile->id,
                    "year" => $year,
                    "status" => 'enable',
                    "user_id" => current_user()->id
                ];

                $doctor_order = DoctorOrder::create($doctor_order);


                // create account.
                if ($doctor_profile){
                
                  $doctor_user = create_doctor_account($doctor_profile, $doctor_order->reference, $email, 'Médecin' );
                }
               
            

            return $doctor_profile;

        }catch(QueryException $e){
            $error_code = $e->errorInfo[0];
                 
            if($error_code == 23505){
                
                return back()->withError("Un médecin avec la meme adresse email".' existe déjà.')->withInput();
            }else{
                return back()->withError($e->getMessage())->withInput();
            }
            
        }

        
    }