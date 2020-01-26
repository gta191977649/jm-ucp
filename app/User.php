<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
Use App\Vehicle;

class User extends Authenticatable
{
    protected $primaryKey = 'UID';

    protected $table = 'users';
    
    use Notifiable;

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


    public function vehicles()
    {
        return $this->hasMany('App\Vehicle','UID','UID');
    }
    public function objs()
    {
        return $this->hasMany('App\OBJ','UID','UID');
    }
    public function attachObjects()
    {
        return $this->hasMany('App\AttachOBJ','UID','UID');
    }

    public function logs() {
        return $this->hasMany('App\UserLog','UID','UID');
    }
}
