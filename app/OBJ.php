<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OBJ extends Model
{
    protected $primaryKey = 'UID';
    protected $table = 'user_objects';

    protected $fillable = [
        'UID', 
        'Slot_ID', 
        'OID',
        'X',
        'Y',
        'Z',
        'RX',
        'RY',
        'RZ',
        'WID',
        'TEXT',
        'FontName',
        'FontSize',
        'FontAssign',
        'FontBold',
        'MarterialIdx',
        'MarterialSize',
        'TEXT_CON',
        'FONTCOLOR',
        'BACKCOCLOR',
        'Taken',
    ];
}
