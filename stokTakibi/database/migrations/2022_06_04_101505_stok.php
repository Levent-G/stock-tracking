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
        Schema::create('stok', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('urunAdi');
            $table->string('image');
            $table->longText('urunAdet');
            $table->longText('urunSeriNo');
            $table->longText('urunBarkod');
            $table->longText('firmaAdi');
            $table->string('maliyet');
            $table->date('SatinAlinmaTarihi', 'Y-m-d H:i:s');
            $table->integer('status')->default(1)->comment('0:pasif 1:aktif');
            $table->string('slug');
            $table->softDeletes();
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
        //
    }
};
