<?php

return [

    'podcasts' => [
        'datatable' => [

            'failed' => 'فشل علية الرفع',
            'created_at' => 'تاريخ الآنشاء',
            'date_range' => 'البحث بالتواريخ',
            'options' => 'الخيارات',
            'status' => 'الحالة',
            'video_status' => 'حالة الفيديو',
            'title' => 'العنوان',
            'loaded' => 'تم التحميل',
            'loading' => 'يتم المعالجة',
            'not_found' => 'خطأ في التحميل',
            'audio' => 'التسجيل',
        ],
        'form' => [
            'audio' => 'التسجيل',
            'video_length' => 'مدة الفيديو',
            'video' => ' الفيديو',
            'image' => 'الصورة',
            'thumb' => 'صورة الفيديو',
            'restore' => 'استرجاع من الحذف',
            'status' => 'الحالة',
            'tabs' => [
                'advanced' => 'متقدم',
                'categories' => 'الاقسام',
                'gallery' => 'معرض الصور',
                'general' => 'بيانات عامة',
                'offline' => 'اوفلاين',
                'seo' => 'SEO',
            ],
            'title' => 'عنوان الصفحة',
        ],
        'routes' => [
            'create' => 'اضافة التسجيلات الصوتية',
            'index' => 'التسجيلات الصوتية',
            'update' => 'تعديل تسجيل',
        ],
        'validation' => [
            'description' => [
                'required' => 'من فضلك ادخل وصف الفيديو',
            ],
            'title' => [
                'required' => 'من فضلك ادخل عنوان الفيديو',
                'unique' => 'هذا العنوان تم ادخالة من قبل',
            ],
        ],
    ],

    'clients' => [
        'datatable' => [

            'failed' => 'فشل علية الرفع',
            'created_at' => 'تاريخ الآنشاء',
            'date_range' => 'البحث بالتواريخ',
            'options' => 'الخيارات',
            'status' => 'الحالة',
            'video_status' => 'حالة الفيديو',
            'loaded' => 'تم التحميل',
            'loading' => 'يتم المعالجة',
            'not_found' => 'خطأ في التحميل',
            'trainer' => 'المدرب',
        ],
        'form' => [
            'trainer' => 'المدرب',
            'image' => 'الصورة',
            'status' => 'الحالة',
            'tabs' => [
                'general' => 'بيانات عامة',
            ],
        ],
        'routes' => [
            'create' => 'اضافة عملاء المدربين',
            'index' => 'عملاء المدربين',
            'update' => 'تعديل عميل',
        ],
    ],
];
