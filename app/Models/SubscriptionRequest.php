<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Town;
use App\Models\Neighborhood;
use App\Models\Speciality;
use App\Models\Structure;
use App\Models\EloquentStorageAttachment;


class SubscriptionRequest extends Model
{
    use HasFactory;

    protected $fillable = [
    	'sex',
    	'first_name',
    	'last_name',
    	'address',
    	'phone',
    	'street',
    	'door',
    	'email',
    	'town_id',
        'neighborhood_id',
        'is_specialist',
    	'speciality_id',
        'structure_id',
        'service_id',
    	'description',
        'status'
    ];


    protected $attributes = [
        
            'status' => "pending"
        ];

    public function town(){
        return $this->belongsTo(Town::class);
    }

     public function neighborhood(){
        return $this->belongsTo(Neighborhood::class);
    }

    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }

    public function structure_profile(){
        return $this->belongsTo(StructureProfile::class);
    }

    public function attachments()
    {
        return $this->morphMany(EloquentStorageAttachment::class, 'attachable');
    }
}
