<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nationality')->nullable()->after('Status'); // الجنسية
            $table->string('marital_status')->nullable()->after('nationality'); // الحالة الاجتماعية
            $table->string('qualification')->nullable()->after('marital_status'); // المؤهل العلمي
            $table->string('document_type')->nullable()->after('qualification'); // نوع الوثيقة
            $table->string('identity_number')->unique()->nullable()->after('document_type');
            $table->date('document_issue_date')->nullable()->after('identity_number');
            $table->date('document_expiry')->nullable()->after('document_issue_date');; // تاريخ انتهاء الوثيقة
            $table->string('place_of_issue')->nullable()->after('document_expiry'); // مكان الإصدار
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
