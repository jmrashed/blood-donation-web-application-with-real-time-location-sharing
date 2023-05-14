<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    protected $fillable = [
        'link_url',
        'link_name',
        'link_target',
        'link_image',
        'post_id',
    ];

}
