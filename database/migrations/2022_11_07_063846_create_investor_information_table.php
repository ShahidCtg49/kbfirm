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
        Schema::create('investor_information', function (Blueprint $table) {
            $table->id();
            $table->string('investor_id')->unique();
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('father_name');
            $table->string('contact_no')->unique();
            $table->string('email')->unique();
            $table->string('national_id')->unique();
            $table->string('address')->nullable();
            $table->string('number_shares')->nullable();
            $table->string('nominee_name');
            $table->string('relationship');
            $table->string('joining_date');
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // default
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('investor_information');
    }
};
