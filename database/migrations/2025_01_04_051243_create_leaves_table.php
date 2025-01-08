<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index('user_id'); // معرف الموظف
            $table->string('type')->nullable(); // نوع الإجازة (مرضية، سنوية، طارئة، غير مدفوعة).
            $table->date('start_date')->nullable(); // تاريخ بداية الإجازة
            $table->date('end_date')->nullable(); // تاريخ نهاية الإجازة
            $table->integer('total_days')->nullable(); // إجمالي عدد الأيام
            $table->text('reason')->nullable(); // سبب الإجازة (اختياري)
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending'); // حالة الإجازة
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
        Schema::dropIfExists('leaves');
    }
}
