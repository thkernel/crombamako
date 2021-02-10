<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Role;
use App\Models\Opportunity;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'login',
        'email',
        'role_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userable()
    {
        return $this->morphTo();
    }
    

    public function role(){
        return $this->belongsTo(Role::class);
    }

    

    public function opportunities(){
        return $this->hasMany(Opportunity::class);
    }

    public function permissions(){
        return $this->hasMany(Permission::class);
    }

    public function isSuperUser() {
       return $this->role->name === 'superuser';
    }


    public function isAdmin() {
       return $this->role->name === 'administrateur';
    }

    public function isDoctor() {
       return $this->role->name === 'Médecin';
    }

    public function isUser() {
       return $this->role->name === 'user';
    }


}
