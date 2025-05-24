<?php

namespace Modules\About\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\About\Entities\AboutType;
use Modules\Apps\Entities\About;

class AboutSeederTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $this->loadStaticPages();
    }

    public function getTransTitle($title)
    {
        return ['ar'=>$title,'en'=>$title];
    }






    public function loadStaticPages(): void
    {
        $baseBody =['ar'=>'محتوي الصفحة فارغ حاليا','en'=>'محتوي الصفحة فارغ حاليا'];
        $defaultImage='https://via.placeholder.com/150';
        $data = [
            [
                'key'   => AboutType::ABOUT,
                'title' => $this->getTransTitle('تعرف على مركز الرائد'),
                'desc'  => $baseBody,
                'image'  => $defaultImage,
                'order'  => 1,
                'status'  => 1,
            ],
            [
                'key'   => AboutType::WHY,
                'title' =>$this->getTransTitle('لماذا مركز الرائد'),
                'desc'  => $baseBody,
                'image'  => $defaultImage,
                'order'  => 2,
                'status'  => 1,
            ],
            [
                'key'   => AboutType::Target,
                'title' => $this->getTransTitle('الاهداف'),
                'desc'  => $baseBody,
                'image'  =>$defaultImage,
                'order'  => 3,
                'status'  => 1,
            ],
            [
                'key'   => AboutType::Testimonials,
                'title' => $this->getTransTitle(' آراء الطلاب و الطالبات الخريجين'),
                'desc'  =>null,
                'image'  =>null,
                'order'  => 4,
                'status'  => 1,
            ],

        ];
        collect($data)->each(fn ($i) => AboutType::updateOrCreate(['key' => $i['key']], $i));
        echo 'home section types Created Successfully'.PHP_EOL;
    }
}
