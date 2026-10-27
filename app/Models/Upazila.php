<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\District;
class Upazila extends Model
{
    protected $fillable = [
        'name',
        'order',
        'district_id',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
