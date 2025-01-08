<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index('user_id');
            $table->date('date'); // تاريخ الحضور
            $table->enum('status', ['Present', 'Absent', 'Late'])->default('Present'); // لتحديد حالة الموظف (حاضر، غائب، متأخر).
            $table->string('check_in')->nullable(); // وقت تسجيل الدخول (إن وجد)
            $table->string('check_out')->nullable(); // وقت تسجيل الخروج (إن وجد).
          
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
        Schema::dropIfExists('attendances');
    }
}
