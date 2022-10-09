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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->datetime('datetime');
            $table->string('employee_cpf')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->timestamps();

            $table->foreign('employee_cpf')->references('cpf')->on('employees')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('client_id')->references('id')->on('clients')->nullOnDelete();
            $table->foreign('service_id')->references('id')->on('services')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
