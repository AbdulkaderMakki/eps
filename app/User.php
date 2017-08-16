<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    //
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    public $incrementing = false; //non int incrementing PK
    protected $casts = [
        'active' => 'boolean',
    ];
    protected $appends = ['user_name'];

    /**
     * Morph to employee||staff
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function useralbe(){
        return $this->morphTo(null,'type','user_id');
    }

    /**
     * get staff information from staff database
     * @param User $user
     * @return STD CLASS
     */
    public function get_staff(User $user){
        $tb = env('STAFF_DB_TABLE','staff');
        $pk = env('STAFF_DB_TABLE_PK','nCode');
        $staff = DB::connection('staff_db')->select("select * from `$tb` where `$tb`.`$pk` = ? and `$tb`.`$pk` is not null",[$user->user_id]);
        return $staff;
    }

    /**
     * get user name from staff or employee
     * @return user_name as attribute
     *
     */
    public function getUserNameAttribute()
    {
        if(isset($this->useralbe->user_name))
            return $this->useralbe->user_name;
    }

}
