<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NhanVien', function (Blueprint $table) {
            $table->id('MaNV');
            $table->string('PasswordNV');
            $table->string('TenNV');
            $table->string('DiachiNV');
            $table->date('NgaysinhNV');
            $table->string('EmailNV');
            $table->string('PhanquyenNV');
            $table->string('ChucvuNV');
            $table->unsignedBigInteger('MaPB');
            $table->foreign('MaPB')->references('MaPB')->on('PhongBan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('NhanVien');
    }
};
