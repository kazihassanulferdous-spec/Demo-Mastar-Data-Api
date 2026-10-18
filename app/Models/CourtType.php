<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class CourtType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_bn',
        'order',
    ];
}
