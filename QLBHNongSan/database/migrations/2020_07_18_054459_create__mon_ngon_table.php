<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonNgonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MonNgon', function (Blueprint $table) {
            $table->id();
            $table->string('tieude');
            $table->string('tomtat');
            $table->text('noidung');
            $table->integer('luotxem');
            $table->string('anh');
            $table->boolean('trangthai');

            $table->unsignedBigInteger('sanpham_id');
            $table->foreign('sanpham_id')->references('id')->on('SanPham');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MonNgon');
    }
}
