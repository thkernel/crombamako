<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function getCurrentControllerName(){
    	$currentController = class_basename(\Route::current()->controller);
    	$currentController = preg_split('/(?=[A-Z])/',$currentController);
    	return $currentController[1];
    }

    function getCurrentActionName(){
    	 $currentAction = class_basename(\Route::currentRouteAction());
        
        $currentAction = explode('@', $currentAction);
        return $currentAction[1];
    }
}
