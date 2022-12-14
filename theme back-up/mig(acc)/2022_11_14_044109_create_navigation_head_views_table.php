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
        Schema::create('navigation_head_views', function (Blueprint $table) {
            $table->string('master_head');
            $table->string('sub_head');
            $table->string('child_one');
            $table->string('child_two');
            $table->timestamps();
        });
        DB::table('navigation_head_views')->insert([
            [
                'master_head' => 'Assets',
                'sub_head' => 'Current Assets',
                'child_one' => 'Cash',
                'child_two' => 'Petty Cash',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Assets',
                'sub_head' => 'Current Assets',
                'child_one' => 'Cash',
                'child_two' => 'Main Cash',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Assets',
                'sub_head' => 'Current Assets',
                'child_one' => 'Bank',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Assets',
                'sub_head' => 'Fixed Assets',
                'child_one' => 'land',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Assets',
                'sub_head' => 'Intangible Assets',
                'child_one' => '',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Assets',
                'sub_head' => 'Other Assets',
                'child_one' => '',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Liabilities',
                'sub_head' => 'Current Liabilities',
                'child_one' => '',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Liabilities',
                'sub_head' => 'Long Term Liabilities',
                'child_one' => '',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Liabilities',
                'sub_head' => 'Other Liabilities',
                'child_one' => '',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Capital',
                'sub_head' => 'Capital',
                'child_one' => '',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Capital',
                'sub_head' => 'Provisions',
                'child_one' => '',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Income',
                'sub_head' => 'Operating Income',
                'child_one' => 'Subscription',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Income',
                'sub_head' => 'Operating Income',
                'child_one' => 'Income from Garbage',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Income',
                'sub_head' => 'Non operating Income',
                'child_one' => '',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Income',
                'sub_head' => 'Other Income',
                'child_one' => '',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Income',
                'sub_head' => 'Other Revenue Stamp',
                'child_one' => '',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Expenses',
                'sub_head' => 'Capital Expenses',
                'child_one' => '',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Expenses',
                'sub_head' => 'Revenue Expenses',
                'child_one' => 'Salary',
                'child_two' => 'Staff Salary',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Expenses',
                'sub_head' => 'Revenue Expenses',
                'child_one' => 'Salary',
                'child_two' => 'Night Guard Salary',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Expenses',
                'sub_head' => 'Revenue Expenses',
                'child_one' => 'Electricity Bill',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Expenses',
                'sub_head' => 'Revenue Expenses',
                'child_one' => 'Miscellaneous expense',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Expenses',
                'sub_head' => 'Revenue Expenses',
                'child_one' => 'Rent Expense',
                'child_two' => 'Office Rent',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Expenses',
                'sub_head' => 'Revenue Expenses',
                'child_one' => 'Paint',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Expenses',
                'sub_head' => 'Revenue Expenses',
                'child_one' => 'Stationary Expense',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Expenses',
                'sub_head' => 'Revenue Expenses',
                'child_one' => 'Repair & Maintenance',
                'child_two' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'master_head' => 'Expenses',
                'sub_head' => 'Revenue Expenses',
                'child_one' => 'Clean Expense',
                'child_two' => '',
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
        Schema::dropIfExists('navigation_head_views');
    }
};
