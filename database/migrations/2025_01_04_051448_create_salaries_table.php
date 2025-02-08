<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index('user_id');
            $table->string('month');
            $table->decimal('base_salary', 10, 2); // الراتب الاساسي
            $table->decimal('deductions', 10, 2)->default(0); // الخصومات
            $table->decimal('bonuses', 10, 2)->default(0); // المكافآت
            // $table->decimal('net_salary', 10, 2)->default(0); // الاجمالي
            $table->date('payment_date')->nullable(); // تاريخ الدفع
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
        Schema::dropIfExists('salaries');
    }
}
