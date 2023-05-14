<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'gallery_id',
        'photo_name',
        'updated_by',
        'updated_at',
        'created_at',
    ];
}
