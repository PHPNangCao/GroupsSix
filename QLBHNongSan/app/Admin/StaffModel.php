<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class StaffModel extends Model
{
    protected $table='NhanVien';
    
    public function User(){
        return $this->belongsTo('App\Admin\UserModel','user_id','id');
    }
}
