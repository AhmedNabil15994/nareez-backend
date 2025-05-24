<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnStatusToCourseReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_reviews', function (Blueprint $table) {
            $table->boolean('status')->default(0);
            $table->boolean('in_slider')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_reviews', function (Blueprint $table) {
            $table->dropColumn(['status','in_slider']);
        });
    }
}
