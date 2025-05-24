<?php

return [
    'answers'   => [
        'form'  => [
            'title' => 'عنوان الاجابة',
        ],
    ],
    'faqs'      => [
        'datatable' => [
            'created_at'    => 'تاريخ الآنشاء',
            'date_range'    => 'البحث بالتواريخ',
            'options'       => 'الخيارات',
            'status'        => 'الحالة',
            'title'         => 'العنوان',
        ],
        'form'      => [
            'restore'           => 'استرجاع من الحذف',
            'status'            => 'الحالة',
            'tabs'              => [
                'general'   => 'بيانات عامة',
            ],
            'desc'             => ' الاجابه',
            'title'             => ' السؤال',
        ],
        'routes'    => [
            'create'    => 'اضافة الاسئلة',
            'index'     => 'الاسئلة',
            'update'    => 'تعديل السؤال',
        ],
        'validation'=> [
            'description'   => [
                'required'  => 'من فضلك ادخل وصف السؤال',
            ],
            'title'         => [
                'required'  => 'من فضلك ادخل عنوان السؤال',
                'unique'    => 'هذا العنوان تم ادخالة من قبل',
            ],
        ],
    ],
];
