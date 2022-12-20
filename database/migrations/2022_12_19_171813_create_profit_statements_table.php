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
        Schema::create('profit_statements', function (Blueprint $table) {
            $table->id();
            $table->string('investor_id')->nullable();
            $table->string('is_csr')->nullable();
            $table->string('number_shares')->nullable();
            $table->string('director_profit')->nullable();
            $table->string('profit')->nullable();
            $table->date('dec_date')->nullable();
            $table->year('profit_year')->nullable();
            $table->string('status')->default(0);
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
        Schema::dropIfExists('profit_statements');
    }
};
