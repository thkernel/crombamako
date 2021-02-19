<?php

namespace App\Policies;

use App\Models\StructureStaff;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StructureStaffPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StructureStaff  $structureStaff
     * @return mixed
     */
    public function view(User $user, StructureStaff $structureStaff)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function read(User $user)
    {
        //
        return authorize_resource('read', 'StructureStaff')
                ? Response::allow()
                : Response::deny('Not authorized.');
    }



    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return authorize_resource('create', 'StructureStaff')
                ? Response::allow()
                : Response::deny('Not authorized.');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StructureStaff  $structureStaff
     * @return mixed
     */
    public function update(User $user)
    {
        //
        return authorize_resource('update', 'StructureStaff')
                ? Response::allow()
                : Response::deny('Not authorized.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StructureStaff  $structureStaff
     * @return mixed
     */
    public function delete(User $user)
    {
        //
        return authorize_resource('read', 'StructureStaff')
                ? Response::allow()
                : Response::deny('Not authorized.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StructureStaff  $structureStaff
     * @return mixed
     */
    public function restore(User $user, StructureStaff $structureStaff)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StructureStaff  $structureStaff
     * @return mixed
     */
    public function forceDelete(User $user, StructureStaff $structureStaff)
    {
        //
    }
}
