<?php

namespace Modules\Course\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Course\Entities\Course;
use Modules\Trainer\Entities\Trainer;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;

class CoursesSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::transaction(function () {
            $courses = [
                ' دورة المشاريع الصغيرة',
                ' دورة سر الجمال الأولى',
                ' دورة الشموع',
                'دورة العود والبخور',
                ' دورة منهج العطور الثانية',
                'دورة منهج العطور الثالثه',
                ' دورة فنون الصابون',
                ' دورة self care',
                ' دورة العطور الطبيعيه',
                ' دورة يناير الشامله',
                'دورة انتعاش الصيف الثانيه',
                ' دورة سر الجمال الثانية',
                ' دورة دورة الجمال',
                ' دورة baby care',
                ' دورة ابدا مشروعك',
                ' دورة بيتي مكسبي',
                ' دورة المشاريع 3',
                ' دورة العطور الشاملة',
            ];

            foreach ($courses as $course) {
                $course = Course::create([
                    'is_published' => true,
                    'is_live' => false,
                    'is_certificated' => true,
                    'price' => rand(5, 120),
                    'image' => '/frontend/images/default.png',
                    'class_time' => 2,
                    'trainer_id' => Trainer::whereHas('roles.permissions', function ($query) {
                        $query->where('name', 'trainer_access');
                    })->first()->id,
                    'period' => 2,
                    'description' => ['ar' =>  $course, 'en' =>  $course],
                    'title' => ['ar' =>  $course, 'en' =>  $course],
                    'slug' => [],
                    'requirements' => ['ar' =>  $course, 'en' =>  $course],
                    'level_id' => null,
                    'short_desc' => ['ar' =>  $course, 'en' =>  $course],
                    'extra_attributes' => ['gender' => ['male', 'female']],
                ]);

                $course->categories()->sync(int_to_array(Category::first()->id));
            }

            // $this->call("OthersTableSeeder");
        });
    }
}
