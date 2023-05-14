<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppsCountry extends Model
{
    use HasFactory;

    // Fillable fields
    protected $fillable = [
        'country_code',
        'country_name',
    ];

}
