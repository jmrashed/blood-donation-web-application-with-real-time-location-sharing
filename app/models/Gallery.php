<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_name',
        'gallery_name',
        'updated_by',
        'updated_at',
        'created_at',
    ];
}
