<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class MonNgonModel extends Model
{
    protected $table='MonNgon';
    public function SanPham(){
        return $this->belongsTo('App\Admin\ProductModel','sanphan_id','id');
    }
}
