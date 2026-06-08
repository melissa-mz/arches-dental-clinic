<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('appointments', function (Blueprint $table) {
        $table->id();
        $table->string('patient_name');
        $table->string('patient_firstname');
        $table->string('patient_phone');
        $table->integer('age')->nullable();
        $table->string('service');
        $table->date('date');
        $table->time('time');
        $table->enum('status', ['en_attente', 'confirme', 'annule'])->default('en_attente');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
