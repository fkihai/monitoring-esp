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
        Schema::create('monitorings', function (Blueprint $table) {
            $table->id();
            $table->string('temp',50);
            $table->string('hum',50);
            $table->string('nh3',50);
            $table->boolean('fan1')->default(false);
            $table->boolean('fan2')->default(false);
            $table->boolean('fan3')->default(false);
            $table->boolean('fan4')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('monitorings');
    }
};
