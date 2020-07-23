<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class SaleProductModel extends Model
{
    protected $table='SanPhamKhuyenMai';

    public function SanPham(){
        return $this->belongsTo('App\Admin\ProductModel','sanpham_id','id');
    }

    public function KhuyenMai(){
        return $this->belongsTo('App\Admin\SaleModel','khuyenmai_id','id');
    }
}
