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
        Schema::create('detail_fakturs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_faktur');
            $table->date('tanggal_keluar');
            $table->foreignId('barang_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('stok_keluar');
            $table->integer('diskon');
            $table->integer('subtotal');
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('detail_fakturs');
    }
};
