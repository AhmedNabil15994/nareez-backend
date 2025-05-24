<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Exam\Entities\Question;

class CreateAddRelationQuestionIdToUserExamAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_exam_answers', function (Blueprint $table) {
            $table->foreignIdFor(Question::class)
            ->after('question_answer_id')
            ->constrained()
            ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_exam_answers', function (Blueprint $table) {
            $table->dropConstrainedForeignId('question_id');
        });
    }
}
