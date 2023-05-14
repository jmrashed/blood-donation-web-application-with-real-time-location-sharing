<?php

namespace App\Models;

use App\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Upazila extends Model
{
    use HasFactory;

    protected $fillable = ['district_row_id', 'upazila_name', 'upazila_name_bn'];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_row_id');
    }
}
