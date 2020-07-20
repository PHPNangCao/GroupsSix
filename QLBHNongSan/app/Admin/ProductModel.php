<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'SanPham';

    public function LoaiSanPham(){
        return $this->belongsTo('App\Admin\CategoryModel','loaisanpham_id','id');
    }

    public function DonViTinh(){
        return $this->belongsTo('App\Admin\UnitModel','donvitinh_id','id');
    }

}
