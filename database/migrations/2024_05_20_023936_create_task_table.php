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
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('client');

            $table->unsignedBigInteger('assignee_id')->nullable();
            $table->foreign('assignee_id')->references('id')->on('assignee');

            $table->unsignedBigInteger('document_request_id');
            $table->foreign('document_request_id')->references('id')->on('document_request');

            $table->unsignedBigInteger('task_type_id')->nullable();
            $table->foreign('task_type_id')->references('id')->on('task_type');

            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('task');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
