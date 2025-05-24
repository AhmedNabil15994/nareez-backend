<?php

return [

    'podcasts' => [
        'datatable' => [
            'created_at' => 'Created At',
            'date_range' => 'Search By Dates',
            'options' => 'Options',
            'status' => 'Status',
            'video_status' => 'Video Status',
            'title' => 'Title',
            'loaded' => 'Loaded',
            'loading' => 'Loading',
            'failed' => 'Failed',
            'not_found' => 'Not Found',
            'audio' => 'audio',
        ],
        'form' => [

            'video_length' => 'Video Length',
            'audio' => 'audio',
            'video' => 'Video',
            'thumb' => 'Video Thumb',
            'restore' => 'Restore from trash',
            'status' => 'Status',
            'tabs' => [
                'advanced' => 'Advanced',
                'categories' => 'Categories',
                'gallery' => 'Gallery',
                'general' => 'General Info.',
                'offline' => 'Offline',
                'seo' => 'SEO',
            ],
            'title' => 'Title',
            'trainers' => 'Trainers',
            'type' => 'In footer',
        ],
        'routes' => [
            'create' => 'Create Podcasts',
            'index' => 'Podcasts',
            'update' => 'Update Podcasts',
        ],
        'validation' => [
            'description' => [
                'required' => 'Please enter the description of Podcasts',
            ],
            'title' => [
                'required' => 'Please enter the title of Podcasts',
                'unique' => 'This title Podcasts  is taken before',
            ],
        ],
    ],

    'clients' => [
        'datatable' => [
            'created_at' => 'Created At',
            'date_range' => 'Search By Dates',
            'options' => 'Options',
            'status' => 'Status',
            'video_status' => 'Video Status',
            'title' => 'Title',
            'loaded' => 'Loaded',
            'loading' => 'Loading',
            'failed' => 'Failed',
            'not_found' => 'Not Found',
            'image' => 'Image',
            'trainer' => 'Trainer',
        ],
        'form' => [
            'trainer' => 'Trainer',
            'image' => 'Image',
            'status' => 'Status',
            'tabs' => [
                'general' => 'General Info.',
            ],
            'title' => 'Title',
            'trainers' => 'Trainers',
            'type' => 'In footer',
        ],
        'routes' => [
            'create' => 'Create Trainers Clients',
            'index' => 'Trainers Clients',
            'update' => 'Update Trainers Clients',
        ],
    ],
];
