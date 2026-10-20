<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Division;
use App\Models\District;
use App\Models\PoliceStation;
use App\Models\CourtType;
use App\Models\Court;
use App\Models\CaseCategory;
class CaseManagement extends Model
{
    // Use the actual table name in your database
    protected $table = 'case_managements';

    protected $fillable = [
    'trade_union_name',
    'trade_union_name_bn',
    'case_issue_date',
    'case_no_writ_petition_no',
    'trade_union_address',
    'trade_union_address_bn',

    'division_id',
    'district_id',
    'police_station_id',
    'court_type_id',
    'court_id',
    'case_category_id',

    'case_subject',
    'case_subject_bn',
    'background_of_case_file',
    'background_of_case_file_bn',

    'defendant_name',
    'defendant_division_id',
    'defendant_district_id',
    'defendant_police_station_id',
    'defendant_organization_type',

    'status',
];

    protected function casts(): array
    {
        return [
            'case_issue_date' => 'date:Y-m-d',
        ];
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
