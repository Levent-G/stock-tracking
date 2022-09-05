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
        Schema::create('depo1', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('urunAdi');
            $table->string('image');
            $table->longText('urunAdet');
            $table->longText('urunSeriNo');
            $table->longText('urunBarkod');
            $table->longText('depo');
            $table->integer('status')->default(1)->comment('0:pasif 1:aktif');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('depo2', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('urunAdi');
            $table->string('image');
            $table->longText('urunAdet');
            $table->longText('urunSeriNo');
            $table->longText('urunBarkod');
            $table->longText('depo');
            $table->integer('status')->default(1)->comment('0:pasif 1:aktif');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('depo3', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('urunAdi');
            $table->string('image');
            $table->longText('urunAdet');
            $table->longText('urunSeriNo');
            $table->longText('urunBarkod');
            $table->longText('depo');
            $table->integer('status')->default(1)->comment('0:pasif 1:aktif');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('depo4', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('urunAdi');
            $table->string('image');
            $table->longText('urunAdet');
            $table->longText('urunSeriNo');
            $table->longText('urunBarkod');
            $table->longText('depo');
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
        Schema::dropIfExists('depo1');
    }
};
