<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('batch_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('body');
            $table->enum('language', ['en', 'bn', 'ar'])->default('en');
            $table->text('reference')->nullable();
            $table->enum('status', ['active', 'inactive', 'pending', 'denied', 'in-revision'])->default('pending');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('category_id');
            $table->string('tag')->nullable();
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
        Schema::dropIfExists('answers');
    }
}
