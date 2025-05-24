<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Course\Entities\Course;
use Modules\Order\Entities\OrderStatus;
use Modules\User\Entities\User;

class CreateCourseEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Course::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreignIdFor(Trainer::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('trainer_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(OrderStatus::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamp('expired_date')->nullable();
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
        Schema::dropIfExists('course_enrollments');
    }
}
