<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'hospital',
        'name',
        'specialist',
        'designation',
        'email',
        'phone',
        'gender',
        'profile_photo',
        'present_address',
        'chamber_address',
        'doctor_detail',
    ];
}
