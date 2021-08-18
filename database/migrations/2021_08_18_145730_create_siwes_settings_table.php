<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiwesSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siwes_settings', function (Blueprint $table) {
            $table->id();
            $table->enum('siwes_start', ['Yes', 'No'])->default('No');
            $table->date('siwes_start_date')->nullable();
            $table->enum('siwes_end', ['Yes', 'No'])->default('No');
            $table->date('siwes_end_date')->nullable();
            $table->enum('supervisor_assigned', ['Yes', 'No'])->default('No');
            $table->date('supervisor_assigned_date')->nullable();
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
        Schema::dropIfExists('siwes_settings');
    }
}
