<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_twos', function (Blueprint $table) {
            $table->id();
            $table->string('master_head');
            $table->string('sub_head');
            $table->string('child_one');
            $table->string('child_two');
            $table->string('child_two_code');
            $table->string('opening_balance');
            $table->timestamps();
            $table->softDeletes();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('child_twos');
    }
};
