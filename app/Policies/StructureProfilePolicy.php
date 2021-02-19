<?php

namespace App\Policies;

use App\Models\StructureProfile;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StructureProfilePolicy
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
     * @param  \App\Models\StructureProfile  $structureProfile
     * @return mixed
     */
    public function view(User $user, StructureProfile $structureProfile)
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
        return authorize_resource('read', 'StructureProfile')
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
        return authorize_resource('create', 'StructureProfile')
                ? Response::allow()
                : Response::deny('Not authorized.');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StructureProfile  $structureProfile
     * @return mixed
     */
    public function update(User $user)
    {
        //
        return authorize_resource('update', 'StructureProfile')
                ? Response::allow()
                : Response::deny('Not authorized.');


    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StructureProfile  $structureProfile
     * @return mixed
     */
    public function delete(User $user)
    {
        //
        return authorize_resource('delete', 'StructureProfile')
                ? Response::allow()
                : Response::deny('Not authorized.');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StructureProfile  $structureProfile
     * @return mixed
     */
    public function restore(User $user, StructureProfile $structureProfile)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StructureProfile  $structureProfile
     * @return mixed
     */
    public function forceDelete(User $user, StructureProfile $structureProfile)
    {
        //
    }
}
