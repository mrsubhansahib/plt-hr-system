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
        Schema::create('capabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('on_capability_procedure')->nullable();
            $table->string('stage')->nullable();
            $table->string('date')->nullable();
            $table->string('outcome')->nullable();
            $table->string('warning_issued_type')->nullable();
            $table->string('review_date')->nullable();
            $table->text('notes')->nullable();


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
        Schema::dropIfExists('user_capablities');
    }
};
