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
        Schema::create('disclosures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('dbs_level');
            $table->string('date_requested');
            $table->string('date_on_certificate')->nullable();
            $table->string('certificate_no')->nullable();
            $table->string('paid_liberata')->nullable();
            $table->string('reimbursed_candidate')->nullable();
            $table->string('invoice_sent')->nullable();
            $table->text('contract_type');
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
        Schema::dropIfExists('user_disclosures');
    }
};
