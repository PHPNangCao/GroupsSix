<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr; 

class LotOrderModel extends Model
{
    protected $table='LoHang';

    // const STATUS_PUBLIC = 1;
    // const STATUS_PRIATE = 0;
    // protected $status = [
    //     1 => [
    //         'name' => 'Public',
    //         'class' => ''
    //     ],
    //     0 => [
    //         'name' => 'Private',
    //         'class' => ''
    //     ]
    // ];

    // public function getStatus(){
    //     return $array = Arr::dot($this->status, $this->tinhtrang, 'N\A');
        
    // }

    public function SanPham(){
        return $this->belongsTo('App\Admin\ProductModel','sanpham_id','id');
    }

    public function NhaCungCap(){
        return $this->belongsTo('App\Admin\SupplierModel','nhacungcap_id','id');
    }


}
