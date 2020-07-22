<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'User';

    public function LoaiNguoiDung(){
        return $this->belongsTo('App\Admin\KindOfUserModel','loainguoidung_id','id');
    }
}
