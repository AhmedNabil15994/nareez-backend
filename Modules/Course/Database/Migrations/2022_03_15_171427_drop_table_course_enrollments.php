<?php

use Modules\User\Entities\User;
use Modules\Course\Entities\Course;
use Illuminate\Support\Facades\Schema;
use Modules\Order\Entities\OrderStatus;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTableCourseEnrollments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('course_enrollments');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('course_enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Course::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignIdFor(OrderStatus::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamp('expired_date')->nullable();
            $table->timestamps();
        });
    }
}
