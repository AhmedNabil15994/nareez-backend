<?php

return [
    'services'  => [
        'datatable' => [
            'created_at'    => 'Created At',
            'date_range'    => 'Search By Dates',
            'image'         => 'Image',
            'options'       => 'Options',
            'status'        => 'Status',
            'title'         => 'Title',
        ],
        'form'      => [
            'clinic'            => 'Clinic',
            'color'             => 'Color Theme',
            'description'       => 'Description',
            'doctors'           => 'Doctor',
            'image'             => 'Image',
            'link'              => 'Link Page',
            'meta_description'  => 'Meta Description',
            'meta_keywords'     => 'Meta Keywords',
            'status'            => 'Status',
            'tabs'              => [
                'general'   => 'General Info.',
                'seo'       => 'SEO',
            ],
            'title'             => 'Title',
            'type'              => 'service Type',
            'video'             => 'Video link',
        ],
        'routes'    => [
            'create'    => 'Create services',
            'index'     => 'services',
            'update'    => 'Update service',
        ],
        'validation'=> [
            'clinic_id'     => [
                'required'  => 'Please select clinic',
            ],
            'description'   => [
                'required'  => 'Please enter the description',
            ],
            'doctor_id'     => [
                'required'  => 'Please select doctor',
            ],
            'title'         => [
                'required'  => 'Please enter the title of service',
                'unique'    => 'This title service is taken before',
            ],
            'type_'         => [
                'required'  => 'Please select service type',
            ],
        ],
    ],

     'serviceapplies'  => [
        'datatable' => [
            'created_at'    => 'Created At',
            'date_range'    => 'Search By Dates',
            'email'         => 'Email',
            'image'         => 'Image',
            'mobile'        => 'Mobile',
            'name'          => 'Name',
            'desc'          => 'description',
            'service'       => 'Service',
            'options'       => 'Options',
            'file'          => 'file',
        ],
        'index'     => [
            'title' => 'Asks For Service (Writing & Translation)',
        ],
        'routes'=>[
            'index' =>'Asks For Service (Writing & Translation)'
        ]


    ],
];
