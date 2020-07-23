<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class MonNgonModel extends Model
{
    protected $table='MonNgon';
    public function SanPham(){
        return $this->belongsTo('App\Admin\ProductModel','sanpham_id','id');
    }
}
