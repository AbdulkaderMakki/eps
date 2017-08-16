<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $table = 'employee';
    public $incrementing = FALSE;
    public $timestamps = FALSE;

    protected $appends = ['user_name'];

    public function users()
    {
        return $this->morphMany('App\User','useralbe','type','user_id');
    }

    public function getUserNameAttribute()
    {
        return $this->name;
    }

}
