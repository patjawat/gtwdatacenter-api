<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->longText('data_json')->nullable();
            $table->String('type')->nullable();
            $table->integer('user_id')->nullable();
            $table->String('username')->nullable();
            $table->String('hospcode')->nullable();
            $table->String('hos_name')->nullable();
            $table->String('ip_gateway')->nullable();
            $table->String('ip_client')->nullable();
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
        Schema::dropIfExists('logs');
    }
}
