<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->date('request_date');
            $table->string('type', 50);
            $table->text('description')->nullable();
            $table->text('evaluation')->nullable();
            $table->text('reject_reason')->nullable();
            $table->enum('status', ['قيد الانتظار', 'تم القبول', 'تم التأجيل', 'تم اكتمال الخدمة']);
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
        Schema::dropIfExists('services');
    }
}
