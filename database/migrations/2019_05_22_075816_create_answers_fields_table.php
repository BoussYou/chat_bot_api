<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('message_id')->unsigned();
            $table->string('type');
            $table->string('name');
            $table->string('default_value');
            $table->string('key');
            $table->integer('goto_branch_id')->unsigned();

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers_fields');
    }
}
