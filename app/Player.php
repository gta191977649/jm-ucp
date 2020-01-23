<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'users';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'NAME', 
        'PASSWORD', 
        'ADMIN',
        'MONEY',
        'SCORE',
        'IP',
        'GPCI',
        'BANSTIME',
        'BAN',
        'FOREVERBAN',
        'X',
        'Y',
        'Z',
        'INT',
        'ACTIVED',
        'RegTime',
        'LastLogin',
        'OnlineTime',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'PASSWORD'
    ];
}
