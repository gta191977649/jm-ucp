<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttachOBJ extends Model
{
    protected $primaryKey = 'UID';
    protected $table = 'user_attachobjs';

    protected $fillable = [
        'UID', 
        'index', 
        'modelid',
        'bone',
        'fOffsetX',
        'fOffsetY',
        'fOffsetZ',
        'fRotX',
        'fRotY',
        'fRotZ',
        'fScaleX',
        'fScaleY',
        'fScaleZ',
        'materialcolor1',
        'materialcolor2',
    ];
}
