<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    public $incrementing = FALSE;
    protected $appends = ['user_name'];

    public function __construct(array $attributes = [])
    {
        $this->setConnection('staff_db');
        $this->setTable(env('STAFF_DB_TABLE','staff'));
        $this->primaryKey =env('STAFF_DB_TABLE_PK','nCode');
    }

    public function users()
    {
        return $this->setConnection('mysql')->morphMany('App\User','useralbe','type','user_id');
    }

    public function getUserNameAttribute()
    {
        $name_col = env('STAFF_DB_TABLE_NAME_COL','ar_name');
        if(isset($name_col))
            return $this->$name_col;
    }

}
