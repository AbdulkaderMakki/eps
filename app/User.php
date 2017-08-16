<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    //
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    //non int incrementing PK
    public $incrementing = false;
    protected $casts = [
        'active' => 'boolean',
    ];

}
