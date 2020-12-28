<?php
	

	function current_user(){
		$user = auth()->user();
		return $user;
	}



	function sidebar_menu(){

		if (!empty(current_user())){
			if (current_user()->role->name == "superuser"){
				$view = view("layouts/partials/dashboard/navs/_superuser-nav");
				return $view;
			}
		}

 
	}
	

