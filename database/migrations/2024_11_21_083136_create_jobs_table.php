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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('status')->default('active');
            $table->string('main_job')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('facility');
            $table->string('cost_center')->nullable();
            $table->string('start_date');
            $table->string('rate_of_pay');
            $table->string('pay_frequency');
            $table->string('number_of_hours');
            $table->text('contract_type');
            $table->string('termination_date')->nullable();
            $table->string('contract_returned')->nullable();
            $table->string('jd_returned')->nullable();
            $table->string('dbs_required');
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
        Schema::dropIfExists('user_jobs');
    }
};
