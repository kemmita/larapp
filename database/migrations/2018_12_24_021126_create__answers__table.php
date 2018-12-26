<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            //Foreign key must match the model spelling, hence "question" as the Model is name Question but appears in the db as questions
            $table->integer('question_id')->unsigned();
            $table->text('content');
            $table->timestamps();

            //foreign key deceleration uses questions and not question as used above
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::table('answers', function (Blueprint $table){
           $table->dropForeign('answers_question_id_foreign');
        });
        Schema::dropIfExists('answers');
    }
}
