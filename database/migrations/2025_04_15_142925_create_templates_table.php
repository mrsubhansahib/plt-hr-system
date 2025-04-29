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
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content'); // contains the dynamic placeholders
            $table->boolean('personal_info')->default(false);
            $table->boolean('job_info')->default(false);
            $table->boolean('disclosure_info')->default(false);
            $table->boolean('sickness_info')->default(false);
            $table->boolean('capability_info')->default(false);
            $table->boolean('disciplinary_info')->default(false);
            $table->boolean('lateness_info')->default(false);
            $table->boolean('training_info')->default(false);
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
        Schema::dropIfExists('templates');
    }
};
