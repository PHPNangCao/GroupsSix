<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table='LoaiSanPham';

    public function NhomSanPham(){
        return $this->belongsTo('App\Admin\GroupsModel','nhom_id','id');
    }

}
