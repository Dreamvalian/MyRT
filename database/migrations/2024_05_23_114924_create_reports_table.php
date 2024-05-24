<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('report', function (Blueprint $table) {
            $table->bigIncrements('report_id');
            $table->string('type_report');
            $table->string('title');
            $table->string('description');
            $table->date('date_start');
            $table->date('date_end');
            $table->string('picture');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
