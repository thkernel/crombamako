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
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Str;
	use Carbon\Carbon;
	use Illuminate\Support\Facades\DB;

    use Illuminate\Container\Container;
    //use File;
    use Illuminate\Support\Facades\File;

    use Illuminate\Auth\Events\Registered;

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

                            
                            // create blob
                            $blob = new EloquentStorageBlob;
                            $blob->key = $key;
                            $blob->filename = $current_timestamp."_".$original_filename;
                            $blob->content_type = $content_type;
                            $blob->metadata = $meta_data;
                            $blob->byte_size = $byte_size;
                            $blob->checksum = $checksum;
                            $blob->save();



                            

                            $attachment = $record->attachment()->create([
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
                
                return back()->withError("Un médecin avec la meme adresse email".' existe déjà.')->withInput();
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
            $login = explode("°", $doctor_order_reference)[1];
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




function structure_logo($structure, $alt_tag, $class_name){
    $pharmacy = StructureCategory::where('name', strtolower("Pharmacie"));
    $cabinet_medical = StructureCategory::where('name', strtolower("Cabinet médical"));
    $clinique = StructureCategory::where('name', strtolower("Clinique"));
    $polyclinique = StructureCategory::where('name', strtolower("Polyclinique"));

      
    if  ($structure->logo){
        return '<img src="/images/post-missing.jpg"  alt="">';

    }
    
    else{
        return '<img src="/images/post-missing.jpg"  alt="">';
         
    }


}

function post_thumbnail($post, $alt_tag, $class_name){
    
    

      
    if  ($post->attachment){
        
        //dd(asset("storage/app/public/posts/".$post->attachment->blob->filename));
        return "<img src=". asset("storage/posts/".$post->attachment->blob->filename) .">";

    }
    
    else{
        return '<img src="/images/post-missing.jpg"  alt="">';
         
    }


}

function opportunity_thumbnail($opportunity, $alt_tag, $class_name){
    
    

      
    if  ($opportunity->attachment){
        
        return "<img src=". asset("storage/opportunities/".$opportunity->attachment->blob->filename) .">";

    }
    
    else{
        return '<img src="/images/post-missing.jpg"  alt="">';
         
    }


}



function doctor_avatar($doctor, $alt_tag, $class_name){
   
      
    if  ($doctor->avatar()){
        return '<img src="/images/avatar-missing.png"  class="" alt="">';

    }
    
    else{
        return '<img src="/images/avatar-missing.png"  class="" alt="">';
         
    }


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
                $reference = "N°0". $sn ."/". Carbon::parse(date('Y-m-d H:i:s'))->format("y") . "/D";

            }else{
                $sn = $last_doctor_order->id + 1;
                $reference = "N°00". $sn  ."/". Carbon::parse(date('Y-m-d H:i:s'))->format("y") . "/D";
            }
            
        }
        else if ($str_size == 2 ){

            if ($id == 99){
                $sn = $last_doctor_order->id + 1;

                $reference = "N°". $sn ."/". Carbon::parse(date('Y-m-d H:i:s'))->format("y") . "/D";

            }else{
                $sn = $last_doctor_order->id + 1;
                $reference = "N°0". $sn ."/". Carbon::parse(date('Y-m-d H:i:s'))->format("y") . "/D";
            }
            
        }
        else if ($str_size >= 3 ){
            if ($id >= 999){
                $sn = $last_doctor_order->id + 1;
                $reference = "N°". $sn ."/". Carbon::parse(date('Y-m-d H:i:s'))->format("y") . "/D";

            }else{
                $sn = $last_doctor_order->id + 1;
                $reference = "N°". $sn ."/". Carbon::parse(date('Y-m-d H:i:s'))->format("y") . "/D";

            }
            
        }
        

    }else{

        $reference = "N°00". 1 ."/". Carbon::parse(date('Y-m-d H:i:s'))->format("y") . "/D";
        
    }

    return $reference;
}
  
