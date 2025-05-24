<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Exam\Entities\QuestionAnswer;
use Modules\Exam\Entities\UserExam;

class CreateUserExamAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_exam_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(UserExam::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(QuestionAnswer::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('degree')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('user_exam_answers');
    }
}
