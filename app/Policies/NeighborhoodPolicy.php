<?php

namespace App\Policies;

use App\Models\Neighborhood;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NeighborhoodPolicy
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
     * @param  \App\Models\Neighborhood  $neighborhood
     * @return mixed
     */
    public function view(User $user, Neighborhood $neighborhood)
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
        return authorize_resource('read', 'Neighborhood')
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
        return authorize_resource('create', 'Neighborhood')
                ? Response::allow()
                : Response::deny('Not authorized.');


    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Neighborhood  $neighborhood
     * @return mixed
     */
    public function update(User $user)
    {
        //
        return authorize_resource('update', 'Neighborhood')
                ? Response::allow()
                : Response::deny('Not authorized.');


    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Neighborhood  $neighborhood
     * @return mixed
     */
    public function delete(User $user)
    {
        //
        return authorize_resource('delete', 'Neighborhood')
                ? Response::allow()
                : Response::deny('Not authorized.');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Neighborhood  $neighborhood
     * @return mixed
     */
    public function restore(User $user, Neighborhood $neighborhood)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Neighborhood  $neighborhood
     * @return mixed
     */
    public function forceDelete(User $user, Neighborhood $neighborhood)
    {
        //
    }
}
