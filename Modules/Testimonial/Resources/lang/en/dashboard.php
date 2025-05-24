<?php

return [
    'testimonials' => [
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
            'description'       => 'Description',
            'doctors'           => 'Doctor',
            'image'             => 'Image',
            'meta_description'  => 'Meta Description',
            'meta_keywords'     => 'Meta Keywords',
            'status'            => 'Status',
            'tabs'              => [
                'general'   => 'General Info.',
                'seo'       => 'SEO',
            ],
            'title'             => 'Title',
            'type'              => 'testimonial Type',
            'video'             => 'Video link',
        ],
        'routes'    => [
            'create'    => 'Create testimonials',
            'index'     => 'testimonials',
            'update'    => 'Update testimonial',
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
                'required'  => 'Please enter the title of testimonial',
                'unique'    => 'This title testimonial is taken before',
            ],
            'type_'         => [
                'required'  => 'Please select testimonial type',
            ],
        ],
    ],
];
