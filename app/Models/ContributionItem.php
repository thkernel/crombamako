<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContributionItem extends Model
{
    use HasFactory;

    protected $fillable = ['contribution_id', 'year', 'amount'];

    public function contribution(){
        return $this->belongsTo(Contribution::class);
    }
}
