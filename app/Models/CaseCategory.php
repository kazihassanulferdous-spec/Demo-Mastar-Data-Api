<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class CaseCategory extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'name',
        'name_bn',
        'order',
        'status',
        'parent_id',
        'created_by'
    ];
}
