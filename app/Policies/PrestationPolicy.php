<?php

namespace App\Policies;

use App\Models\Prestation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PrestationPolicy
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
     * @param  \App\Models\Prestation  $prestation
     * @return mixed
     */
    public function view(User $user, Prestation $prestation)
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
        return authorize_resource('read', 'Prestation')
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
        return authorize_resource('create', 'Prestation')
                ? Response::allow()
                : Response::deny('Not authorized.');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prestation  $prestation
     * @return mixed
     */
    public function update(User $user)
    {
        //
        return authorize_resource('update', 'Prestation')
                ? Response::allow()
                : Response::deny('Not authorized.');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prestation  $prestation
     * @return mixed
     */
    public function delete(User $user)
    {
        //
        return authorize_resource('delete', 'Prestation')
                ? Response::allow()
                : Response::deny('Not authorized.');


    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prestation  $prestation
     * @return mixed
     */
    public function restore(User $user, Prestation $prestation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prestation  $prestation
     * @return mixed
     */
    public function forceDelete(User $user, Prestation $prestation)
    {
        //
    }
}
