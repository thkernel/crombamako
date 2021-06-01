<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitSummaryTeam extends Model
{
    use HasFactory;

    protected $fillable = ['visit_summary_id', 'doctor_id', 'status'];
}
