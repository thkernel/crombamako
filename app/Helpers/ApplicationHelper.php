<?php
	use App\Models\ActivityLog;
	use App\Models\SubscriptionRequest;
	use App\Models\User;
	use App\Models\Profile;
	use App\Models\StructureCategory;
	use App\Models\EloquentStorageBlob;
	use App\Models\EloquentStorangeAttachment;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Str;
	use Carbon\Carbon;
	use Illuminate\Support\Facades\DB;


	function current_user(){
		$user = auth()->user();
		return $user;
	}

	function format_date($date, $format){
		return Carbon::parse($date)->format($format);
	}



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

	/* Used to storage files */

	function eloquent_storage_service($record, $request, $allowedfileExtension, $fileInputName, $storage_directory){
		
		if ($record){
            if($request->hasFile($fileInputName)){
                
                $files = $request->file($fileInputName);

                
                foreach($files as $file){
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
                        $blob->filename = $original_filename;
                        $blob->content_type = $content_type;
                        $blob->metadata = $meta_data;
                        $blob->byte_size = $byte_size;
                        $blob->checksum = $checksum;
                        $blob->save();

                        //dd($blob);

                       	
                        $attachment = $blob->eloquent_storage_attachment()->create(["name" => $filename, 
                            "attachmentable_id" => $record->id,
                            "attachmentable_type" => class_basename(get_class($record))
                             ]);

                            /*

                             $attachment = new EloquentStorangeAttachment;
                             $attachment->eloquent_storage_blob_id = $blob->id;
                             $attachment->name = $filename;

                            $attachment = $record->eloquent_storage_attachments()->save();
                            */

                        if ($attachment){
                            $file->store(storage_path($storage_directory));
                            
                        }

                        
                    }
                }
            }
        }

	}

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

	function doctor_factory(SubscriptionRequest $subscription_request){
		$doctor = DB::table('roles')->whereName('medecin')->get()[0];

		// generate login and password
		$login = strtolower($subscription_request->last_name.'_'.Str::random(4));
		$password = Str::random(8);

		//create user account
		$user = new User;
		$user->login = $login;
		$user->password = $password;
		$user->email = $subscription_request->email;
		$user->role_id = $doctor->id;
		$user->save();

		if ($user){
			// create profile
			$profile = new Profile;
			$profile->civility = $subscription_request->civility ;
			$profile->first_name = $subscription_request->first_name ;
			$profile->last_name = $subscription_request->last_name ;
			$profile->address = $subscription_request->address ;
			$profile->phone = $subscription_request->phone ;
			$profile->locality_id = $subscription_request->locality_id ;
			$profile->speciality_id = $subscription_request->speciality_id ;
			$profile->structure_id = $subscription_request->structure_id ;
			$profile->user_id = $user->id ;
			$profile->save();

			if ($profile){
				send_mail();
			}

			// send auth infos to user.
		}

		// change subscription request status to valided

		$subscription_request->status = "valided";
		$subscription_request->update();
		
		
	}

	function send_mail(){

	}
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
        return '<img src="images/avatar-missing.png" class="wd-80 rounded-circle" alt="">';

    }
    
    else{
        return '<img src="images/avatar-missing.png" class="wd-80 rounded-circle" alt="">';
         
    }


}
 
  
