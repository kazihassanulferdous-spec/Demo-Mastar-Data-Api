<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Division;
use App\Models\District;
class Organization extends Model
{
    protected $fillable = [
        'name',
        'name_bn',
        'order',
        'division_id',
        'district_id',
        'address',
        'address_bn',
        'phone',
        'email',
        'website',
    ];
    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
