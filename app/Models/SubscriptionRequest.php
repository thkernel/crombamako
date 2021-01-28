<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Locality;
use App\Models\Speciality;
use App\Models\Structure;
use App\Models\EloquentStorageAttachment;


class SubscriptionRequest extends Model
{
    use HasFactory;

    protected $fillable = [
    	'civility',
    	'first_name',
    	'last_name',
    	'address',
    	'phone',
    	'street',
    	'door',
    	'email',
    	'town_id',
        'neighborhood_id',
    	'speciality_id',
    	'speciality_id',
        'structure_id',
    	'description',
        'status'
    ];


    protected $attributes = [
        
            'status' => "pending"
        ];

    public function locality(){
        return $this->belongsTo(Locality::class);
    }

    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }

    public function structure(){
        return $this->belongsTo(Structure::class);
    }

    public function attachments()
    {
        return $this->morphMany(EloquentStorageAttachment::class, 'attachmentable');
    }
}
