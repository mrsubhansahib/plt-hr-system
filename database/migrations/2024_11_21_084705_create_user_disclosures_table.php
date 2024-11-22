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
        Schema::create('user_disclosures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('dbs_evel');
            $table->string('date_equested');
            $table->string('date_on_certificate');
            $table->string('certificate_no');
            $table->string('paid_liberata');
            $table->string('reimbursed_candidate');
            $table->string('invoice_sent');
            $table->text('contract_type');
            $table->text('notes');

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
        Schema::dropIfExists('user_disclosures');
    }
};
