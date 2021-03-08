<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormFormTranslationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('form__form_translations', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      $table->string('title');
      $table->integer('form_id')->unsigned();
      $table->string('locale')->index();
      $table->unique(['form_id', 'locale']);
      $table->foreign('form_id')->references('id')->on('form__forms')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
    public function down()
    {
      Schema::table('form__form_translations', function (Blueprint $table) {
          $table->dropForeign(['form_id']);
      });
      Schema::dropIfExists('form__form_translations');
    }
}
