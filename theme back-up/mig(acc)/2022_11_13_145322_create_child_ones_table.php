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
        Schema::create('child_ones', function (Blueprint $table) {
            $table->id();
            $table->string('master_head');
            $table->string('sub_head_id');
            $table->string('head_name');
            $table->string('head_code');
            $table->string('opening_balance');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('child_ones')->insert([
            [
                'master_head' => 'Assets',
                'sub_head_id' => 'Current Assets',
                'head_name' => 'Cash',
                'head_code' => '11001',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Assets',
                'sub_head_id' => 'Current Assets',
                'head_name' => 'Bank',
                'head_code' => '11002',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Assets',
                'sub_head_id' => 'Fixed Assets',
                'head_name' => 'land',
                'head_code' => '12001',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Assets',
                'sub_head_id' => 'Intangible Assets',
                'head_name' => '',
                'head_code' => '',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Assets',
                'sub_head_id' => 'Other Assets',
                'head_name' => '',
                'head_code' => '',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Liabilities',
                'sub_head_id' => 'Current Liabilities',
                'head_name' => '',
                'head_code' => '',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Liabilities',
                'sub_head_id' => 'Long Term Liabilities',
                'head_name' => '',
                'head_code' => '',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Liabilities',
                'sub_head_id' => 'Other Liabilities',
                'head_name' => '',
                'head_code' => '',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Capital',
                'sub_head_id' => 'Capital',
                'head_name' => '',
                'head_code' => '',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Capital',
                'sub_head_id' => 'Provisions',
                'head_name' => '',
                'head_code' => '',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Income',
                'sub_head_id' => 'Operating Income',
                'head_name' => 'Subscription',
                'head_code' => '41001',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Income',
                'sub_head_id' => 'Operating Income',
                'head_name' => 'Income from Garbage',
                'head_code' => '41002',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Income',
                'sub_head_id' => 'Non operating Income',
                'head_name' => '',
                'head_code' => '',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Income',
                'sub_head_id' => 'Other Income',
                'head_name' => '',
                'head_code' => '',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Income',
                'sub_head_id' => 'Other Revenue Stamp',
                'head_name' => '',
                'head_code' => '',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Expenses',
                'sub_head_id' => 'Capital Expenses',
                'head_name' => '',
                'head_code' => '',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Expenses',
                'sub_head_id' => 'Revenue Expenses',
                'head_name' => 'Salary',
                'head_code' => '52001',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Expenses',
                'sub_head_id' => 'Revenue Expenses',
                'head_name' => 'Electricity Bill',
                'head_code' => '52002',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Expenses',
                'sub_head_id' => 'Revenue Expenses',
                'head_name' => 'Miscellaneous expense',
                'head_code' => '52003',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Expenses',
                'sub_head_id' => 'Revenue Expenses',
                'head_name' => 'Rent Expense',
                'head_code' => '52004',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Expenses',
                'sub_head_id' => 'Revenue Expenses',
                'head_name' => 'Paint',
                'head_code' => '52005',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Expenses',
                'sub_head_id' => 'Revenue Expenses',
                'head_name' => 'Stationary Expense',
                'head_code' => '52006',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Expenses',
                'sub_head_id' => 'Revenue Expenses',
                'head_name' => 'Repair & Maintenance',
                'head_code' => '52007',
                'opening_balance' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Expenses',
                'sub_head_id' => 'Revenue Expenses',
                'head_name' => 'Clean Expense',
                'head_code' => '52007',
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
        Schema::dropIfExists('child_ones');
    }
};
