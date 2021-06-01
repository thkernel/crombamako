<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EloquentStorageAttachment;
use App\Models\Structure;

class VisitSummary extends Model
{
    use HasFactory;

    protected $fillable = ['visit_date',
            'visit_hour',
           	'medical_file',
            'receipt',
            'prescription_book',
            'consultation_register',
            'care_register',
            'birth_register',
            'consultation_and_treatment_office',
            'medical_clinic',
            'surgical_clinic',
            'maternity_clinic',
            'radiology_practice',
            'structure_id',
            'description',
            'waiting_room',
            'toilets_number',
            'hospital_rooms_number',
            'resuscitation_room',
            'doctor_offices_number',
            'examination_rooms_number',
            'kitchen',
            'cloakroom',
            'treatment_rooms_number',
            'sterilization_device',
            'oxygen_source',
            'communication_source',
            'freezer_or_fridge',
            'generator',
            'doctor',
            'nurse',
            'pharmacist',
            'laboratory_assistant',
            'midwife',
            'caregiver',
            'director',
            'secretory',
            'accounting',
            'cleanliness',
            'biomedical_waste_management',
            'data_feedback',
            'security_box',
            'tricolor_bins',
            'general_consultation',
            'specialist_consultation',
            'cpn',
            'labor_room',
            'general_ultrasound',
            'specialized_ultrasound',
            'digestive_endoscopy',
            'surgery_block',
            'radiology_room',
            'biomedical_laboratory',
            'strong_points',
            'weak_points',
            'recommendations',
            'conclusion',
           	'user_id',
            'status',
	        ];

    
   
  


    public function structure(){
        return $this->belongsTo(StructureProfile::class, 'structure_id');
    }

    public function visit_summary_teams(){
        return $this->hasMany(VisitSummaryTeam::class);
    }

    public function eloquent_storage_attachment()
    {
        return $this->morphMany(EloquentStorageAttachment::class, 'attachable');
    }
}
