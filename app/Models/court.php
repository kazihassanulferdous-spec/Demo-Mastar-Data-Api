<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\CourtType;
use App\Models\Division;
use App\Models\District;
class court extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'name_bn',
    'status',
    'court_type_id',
    'division_id',
    'district_id',
    'created_by',
];
    protected $casts = [
        'status' => 'boolean',
    ];
        public function courtType()
    {
        return $this->belongsTo(CourtType::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
