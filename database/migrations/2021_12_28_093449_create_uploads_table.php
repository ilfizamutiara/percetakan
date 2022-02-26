<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('uploads', function (Blueprint $table) {
                $table->integer('id_upload');
                $table->integer('id_pelanggan');
                $table->integer('id_produk');
                $table->integer('id_percetakan');
                $table->string('name_file');
                $table->string('extension');
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
        Schema::dropIfExists('uploads');
    }
}
