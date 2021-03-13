<?php

namespace App\Policies;

use App\Models\DoctorProfile;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class DoctorProfilePolicy
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
     * @param  \App\Models\DoctorProfile  $doctorProfile
     * @return mixed
     */
    public function view(User $user, DoctorProfile $doctorProfile)
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
        return authorize_resource('read', 'DoctorProfile')
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
        return authorize_resource('create', 'DoctorProfile')
                ? Response::allow()
                : Response::deny('Not authorized.');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DoctorProfile  $doctorProfile
     * @return mixed
     */
    public function update(User $user)
    {
        //
        return authorize_resource('update', 'DoctorProfile')
                ? Response::allow()
                : Response::deny('Not authorized.');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DoctorProfile  $doctorProfile
     * @return mixed
     */
    public function delete(User $user)
    {
        //
        return authorize_resource('delete', 'DoctorProfile')
                ? Response::allow()
                : Response::deny('Not authorized.');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DoctorProfile  $doctorProfile
     * @return mixed
     */
    public function restore(User $user, DoctorProfile $doctorProfile)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DoctorProfile  $doctorProfile
     * @return mixed
     */
    public function forceDelete(User $user, DoctorProfile $doctorProfile)
    {
        //
    }
}
