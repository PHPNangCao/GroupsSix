<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class PromotionalModel extends Model
{
    protected $table='QuangCao';

    public function KhuyenMai(){
        return $this->belongsTo('App\Admin\SaleModel','khuyenmai_id','id');
    }

}
