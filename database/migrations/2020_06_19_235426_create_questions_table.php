<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['active', 'inactive', 'pending', 'denied', 'in-revision'])->default('active');
            $table->integer('is_answered')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->enum('language', ['en', 'bn', 'ar'])->default('en');
           // $table->unsignedBigInteger('assign_to')->nullable();
            $table->string('tag')->nullable();
            $table->string('reference')->nullable();
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
        Schema::dropIfExists('questions');
    }
}
