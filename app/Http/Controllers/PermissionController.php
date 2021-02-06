<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\PermissionItem;
use App\Models\Role;
use App\Models\User;
use App\Models\Feature;
use Illuminate\Http\Request;
use App\Policies\Response;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $permissions =  Permission::orderBy('id', 'desc')->paginate(10)->setPath('permissions');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("permissions.index", compact(['permissions']) );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $permission = new Permission;
        $features = Feature::all();

        
        $role = Role::where('name', 'administrateur')->first();

        $users =  User::where('role_id', $role->id )->get();
        $actions = config('global.abilities');
        //dd($actions);

        //dd($models);
        return view('permissions.create', compact(['permission', 'users', 'features', 'actions']));

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
        //$request['user_id'] = current_user()->id;
        $request->validate([
            'user_id' => 'required',
            'feature_id' => 'required',

        ]);

        $permission_items = $request['action_names'];
        //dd($permission_items);
        $request['status'] = "enable";

        $permission = Permission::create($request->all());

        // Create permission items.

        if ($permission && $permission_items){
            foreach($permission_items as $permission_item){
                $item = [
                    "permission_id" => $permission->id,
                    "action_name" => $permission_item,
                    "status" => "enable"
                ];
                
                PermissionItem::create($item);
            }
        }

   
        return redirect()->route('permissions.index')
            ->with('success','Permission created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
        
        $features = Feature::all();

        
        $role = Role::where('name', 'administrateur')->first();

        $users =  User::where('role_id', $role->id )->get();
        $actions = config('global.abilities');
        //dd($actions);

        //dd($models);
        return view('permissions.edit', compact(['permission', 'users', 'features', 'actions']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //


        if ($request->user()->cannot('update', Permission::class)) {
            abort(403);
        }


        $request->validate([
            'user_id' => 'required',
            'feature_id' => 'required',

        ]);

        $permission_items = $request['action_names'];
       

        $permission->update($request->all());

        // Create permission items.

        if ($permission && $permission_items){
            // delete all items before.
            PermissionItem::where('permission_id', $permission->id)->delete();

            foreach($permission_items as $permission_item){
                $item = [
                    "permission_id" => $permission->id,
                    "action_name" => $permission_item,
                    "status" => "enable"
                ];
                
                PermissionItem::create($item);
            }
        }

   
        return redirect()->route('permissions.index')
            ->with('success','Permission updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Permission::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}
