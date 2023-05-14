<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloodgroup extends Model
{
    use HasFactory;
       // Fillable fields
       protected $fillable = [
        'bloodgroup_name',
        'sort_order',
        'created_datetime',
    ];
}
