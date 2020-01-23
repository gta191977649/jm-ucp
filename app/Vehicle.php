<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'user_cars';

    protected $fillable = [
        'SORT_ID', 
        'MODELID', 
        'COLOR1',
        'COLOR2',
        'paintjobid',
        'D_X',
        'D_Y',
        'D_Z',
        'D_ZAng',
        'SPOILER',
        'HOOD',
        'ROOF',
        'SIDESKIRT',
        'LAMPS',
        'EXHAUST',
        'WHEELS',
        'STEREO',
        'HYDRAULICS',
        'FRONT_BUMPER',
        'REAR_BUMPER',
        'VENT_RIGHT',
        'VENT_LEFT',
    ];
}
