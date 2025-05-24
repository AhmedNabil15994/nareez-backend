<?php

return [
    'services'  => [
        'datatable' => [
            'created_at'    => 'تاريخ الآنشاء',
            'date_range'    => 'البحث بالتواريخ',
            'image'         => 'العنوان',
            'options'       => 'الخيارات',
            'status'        => 'الحالة',
            'title'         => 'العنوان',
        ],
        'form'      => [
            'clinic'            => 'كلينك',
            'color'             => 'لون الثيم',
            'description'       => 'الوصف',
            'doctors'           => 'الدكتور',
            'image'             => 'الصورة',
            'link'              => 'رابط الصفحة',
            'meta_description'  => 'Meta Description',
            'meta_keywords'     => 'Meta Keywords',
            'status'            => 'الحالة',
            'tabs'              => [
                'general'   => 'بيانات عامة',
                'seo'       => 'SEO',
            ],
            'title'             => 'عنوان المقال',
            'type'              => 'نوع المقال',
            'video'             => 'رابط الفيديو',
        ],
        'routes'    => [
            'create'    => 'اضافة الخدمات',
            'index'     => 'الخدمات',
            'update'    => 'تعديل الخدمه',
        ],
        'validation'=> [
            'clinic_id'     => [
                'required'  => 'من فضلك اختر عيادة',
            ],
            'description'   => [
                'required'  => 'من فضلك ادخل الوصف',
            ],
            'doctor_id'     => [
                'required'  => 'من فضلك اختر دكتور',
            ],
            'title'         => [
                'required'  => 'من فضلك ادخل عنوان المقال',
                'unique'    => 'هذا العنوان تم ادخالة من قبل',
            ],
            'type_'         => [
                'required'  => 'من فضلك اختر نوع المقال',
            ],
        ],
    ],

      'serviceapplies'  => [
        'datatable' => [
            'created_at'    => 'تاريخ الآنشاء',
            'date_range'    => 'البحث بالتواريخ',
            'email'         => 'البريد الالكتروني',
            'desc'          => 'الوصف',
            'service'       => 'الخدمه',
            'image'         => 'الصورة الشخصية',
            'mobile'        => 'الهاتف',
            'name'          => 'الاسم',
            'options'       => 'الخيارات',
            'file'          => 'الملف',
        ],
        'index'     => [
            'title' => 'طلبات الخدمات',
        ],
        'routes'=>[
            'index'=>' طلبات الخدمات ',
        ]

    ],
];
