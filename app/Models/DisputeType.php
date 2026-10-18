<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisputeType extends Model
{
    protected $fillable = [
    'name',
    'name_bn',
    'order',
    'status',
    'created_by'
];
}
