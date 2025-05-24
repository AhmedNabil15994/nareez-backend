<?php

namespace Modules\Apps\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Apps\Entities\HomepageSectionType;

class HomepageSectionTypeSeederTableSeeder extends Seeder
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
                'key'   => HomepageSectionType::ABOUT,
                'title' => $this->getTransTitle('About Edutain'),
                'desc'  => $baseBody,
                'image'  => $defaultImage,
                'order'  => 1,
                'status'  => 1,
            ],
            [
                'key'   => HomepageSectionType::WHY,
                'title' =>$this->getTransTitle('Why you choose Edutain ?'),
                'desc'  => $baseBody,
                'image'  => $defaultImage,
                'order'  => 2,
                'status'  => 1,
            ],
            [
                'key'   => HomepageSectionType::IELTS,
                'title' => $this->getTransTitle('IELTS preparation courses'),
                'desc'  => $baseBody,
                'image'  =>$defaultImage,
                'order'  => 3,
                'status'  => 1,
            ],
            [
                'key'   => HomepageSectionType::TEST,
                'title' => $this->getTransTitle('Test <br>  Your Level'),
                'desc'  =>null,
                'image'  =>null,
                'order'  => 4,
                'status'  => 1,
            ],
            [
                'key'   => HomepageSectionType::HOW,
                'title' => $this->getTransTitle('Test <br>  Your Level'),
                'desc'  =>null,
                'image'  =>null,
                'order'  => 4,
                'status'  => 1,
            ],

        ];
        collect($data)->each(fn ($i) => HomepageSectionType::firstOrCreate(['key'=>$i['key']],$i));
        echo 'home section types Created Successfully'.PHP_EOL;
    }
}
