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
        Schema::create('sub_heads', function (Blueprint $table) {
            $table->id();
            $table->string('master_head_id');
            $table->string('head_name');
            $table->string('head_code');
            $table->string('opening_balance');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('sub_heads')->insert([
            [
                'master_head_id' => 'Assets',
                'head_name' => 'Current Assets',
                'head_code' => '1100',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head_id' => 'Assets',
                'head_name' => 'Fixed Assets',
                'head_code' => '1200',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head_id' => 'Assets',
                'head_name' => 'Intangible Assets',
                'head_code' => '121212',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head_id' => 'Assets',
                'head_name' => 'Other Assets',
                'head_code' => '1300',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head_id' => 'Liabilities',
                'head_name' => 'Current Liabilities',
                'head_code' => '2100',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head_id' => 'Liabilities',
                'head_name' => 'Long Term Liabilities',
                'head_code' => '2200',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head_id' => 'Liabilities',
                'head_name' => 'Other Liabilities',
                'head_code' => '2300',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head_id' => 'Capital',
                'head_name' => 'Capital',
                'head_code' => '3100',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head_id' => 'Capital',
                'head_name' => 'Provisions',
                'head_code' => '3200',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head_id' => 'Income',
                'head_name' => 'Operating Income',
                'head_code' => '4100',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head_id' => 'Income',
                'head_name' => 'Non operating Income',
                'head_code' => '4200',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head_id' => 'Income',
                'head_name' => 'Other Income',
                'head_code' => '43000',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head_id' => 'Income',
                'head_name' => 'Other Revenue Stamp',
                'head_code' => '4400',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head_id' => 'Expense',
                'head_name' => 'Capital Expenses',
                'head_code' => '5100',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head_id' => 'Expense',
                'head_name' => 'Revenue Expenses',
                'head_code' => '5200',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_heads');
    }
};
