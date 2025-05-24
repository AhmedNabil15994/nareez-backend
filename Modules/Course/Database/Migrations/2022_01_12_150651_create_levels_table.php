<?php

use Modules\Exam\Entities\Exam;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->text('title', );
            $table->longText('short_desc');
            $table->longText('desc');
            $table->foreignId('start_exam')->nullable()->constrained('exams', 'id')->nullOnDelete();
            $table->foreignId('end_exam')->nullable()->constrained('exams', 'id')->nullOnDelete();
            $table->longText('requirements')->nullable();
            $table->boolean('require_start_exam')->default(false);
            $table->boolean('require_end_exam')->default(false);
            $table->boolean('paid')->default(false);
            $table->decimal('price')->default(0.000);
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
        Schema::dropIfExists('levels');
    }
}
