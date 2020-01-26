<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    //
    protected $primaryKey = 'KEY';
    protected $table = 'user_ip';

    protected $fillable = [
        'UID',
        'LoginTime',
        'DisTime',
        'IP',
    ];
}
