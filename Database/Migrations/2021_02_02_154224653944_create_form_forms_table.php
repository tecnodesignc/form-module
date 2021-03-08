<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form__forms', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('system_name', 40);
            $table->boolean('active')->default(false);
            $table->text('destination_email')->nullable();
            $table->integer('user_id')->unsigned()->nullable();;
            $table->foreign('user_id')->references('id')->on(config('auth.table', 'users'))->onDelete('cascade');
            $table->text('options')->nullable();
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
        Schema::dropIfExists('form__forms');
    }
}
