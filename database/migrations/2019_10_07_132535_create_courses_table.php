<?php

use Illuminate\Support\Facades\DB;
use Modules\Trainer\Entities\Trainer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->json('short_desc');
            $table->longText('description');
            $table->longText('requirements')->nullable();
            $table->string('slug');
            $table->text('seo_keywords')->nullable();
            $table->longText('seo_description')->nullable();
            $table->boolean('is_published')->default(false);
            $table->boolean('is_certificated')->default(false);
            $table->string('image');
            $table->string('class_time')->nullable();
            $table->integer('period')->nullable();
            $table->foreignIdFor(Trainer::class)->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->schemalessAttributes('extra_attributes');
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
        Schema::dropIfExists('courses');
    }
}
