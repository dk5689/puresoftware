<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicalTrial extends Model
{
    use HasFactory;
    protected $table = 'clinical_trial';
    protected $fillable = [
        'first_name', 'date_of_birth', 'migrain_frequency', 'daily_frequency'
    ];
}