<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');  
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade');  
            $table->string('module_name'); 
            $table->unsignedBigInteger('module_id'); 
            $table->text('notes');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_notes');
    }
};
