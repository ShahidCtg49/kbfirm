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
        Schema::create('investor_payments', function (Blueprint $table) {
            $table->id();
            $table->string('investor_id');
            $table->string('name');
            $table->string('date');
            $table->string('book_no');
            $table->string('receipt_no');
            $table->string('picture');
            $table->string('particulars');
            $table->string('payment_method');
            $table->string('collection_for_month');
            $table->string('amount');
            $table->string('per_share_amount')->nullable();
            $table->string('total_deposits')->nullable();
            $table->string('dues')->nullable();
            $table->string('advance')->nullable();

             // default
             $table->boolean('account_status')->default(1)->nullable();
             $table->unsignedBigInteger('created_by')->index()->default(1);
             $table->unsignedBigInteger('updated_by')->index()->nullable();
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
        Schema::dropIfExists('investor_payments');
    }
};
