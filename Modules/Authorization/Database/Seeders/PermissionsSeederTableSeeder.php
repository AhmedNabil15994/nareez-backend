<?php

namespace Modules\Authorization\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Authorization\Entities\Permission;

class PermissionsSeederTableSeeder extends Seeder
{
    private $permissions = [
        'dashboard_access' => [
            'routes' => 'dashboard.home',
            'category' => 'access',
            'title_en' => 'Dashboard access',
            'title_ar' => 'عرض لوحة التحكم',
        ],
        'trainer_access' => [
            'routes' => '',
            'category' => 'access trainer dashboard',
            'title_en' => 'trainer dashboard access',
            'title_ar' => '  عرض لوحة التحكم المدرب',
        ],
        'statistics_access' => [
            'routes' => '',
            'category' => 'access statistics',
            'title_en' => 'Show Statistics',
            'title_ar' => ' عرض الاحصائيات',
        ],
        'show_roles' => [
            'routes' => '',
            'category' => 'roles',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_roles' => [
            'routes' => '',
            'category' => 'roles',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_roles' => [
            'routes' => '',
            'category' => 'roles',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_roles' => [
            'routes' => '',
            'category' => 'roles',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],

        'show_users' => [
            'routes' => '',
            'category' => 'users',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_users' => [
            'routes' => '',
            'category' => 'users',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_users' => [
            'routes' => '',
            'category' => 'users',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_users' => [
            'routes' => '',
            'category' => 'users',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_admins' => [
            'routes' => '',
            'category' => 'admins',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_admins' => [
            'routes' => '',
            'category' => 'admins',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_admins' => [
            'routes' => '',
            'category' => 'admins',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_admins' => [
            'routes' => '',
            'category' => 'admins',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_trainers' => [
            'routes' => '',
            'category' => 'trainers',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_trainers' => [
            'routes' => '',
            'category' => 'trainers',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_trainers' => [
            'routes' => '',
            'category' => 'trainers',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_trainers' => [
            'routes' => '',
            'category' => 'trainers',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'add_faqs' => [
            'routes' => 'dashboard.faqs.create,dashboard.faqs.store',
            'category' => 'faqs',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_faqs' => [
            'routes' => 'dashboard.faqs.edit,dashboard.faqs.update',
            'category' => 'faqs',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_faqs' => [
            'routes' => 'dashboard.faqs.deletes,dashboard.faqs.destroy',
            'category' => 'faqs',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_reviewquestions' => [
            'routes' => 'dashboard.reviewquestions.index,dashboard.reviewquestions.datatable,dashboard.reviewquestions.show',
            'category' => 'reviewquestions',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_reviewquestions' => [
            'routes' => 'dashboard.reviewquestions.create,dashboard.reviewquestions.store',
            'category' => 'reviewquestions',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_reviewquestions' => [
            'routes' => 'dashboard.reviewquestions.edit,dashboard.reviewquestions.update',
            'category' => 'reviewquestions',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_reviewquestions' => [
            'routes' => 'dashboard.reviewquestions.deletes,dashboard.reviewquestions.destroy',
            'category' => 'reviewquestions',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_reviewquestions' => [
            'routes' => 'dashboard.reviewquestions.index,dashboard.reviewquestions.datatable,dashboard.reviewquestions.show',
            'category' => 'reviewquestions',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_blogs' => [
            'routes' => 'dashboard.blogs.create,dashboard.blogs.store',
            'category' => 'blogs',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_blogs' => [
            'routes' => 'dashboard.blogs.edit,dashboard.blogs.update',
            'category' => 'blogs',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_blogs' => [
            'routes' => 'dashboard.blogs.deletes,dashboard.blogs.destroy',
            'category' => 'blogs',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_blogs' => [
            'routes' => 'dashboard.blogs.index,dashboard.blogs.datatable,dashboard.blogs.show',
            'category' => 'blogs',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],

        'add_podcasts' => [
            'routes' => 'dashboard.podcasts.create,dashboard.podcasts.store',
            'category' => 'podcasts',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_podcasts' => [
            'routes' => 'dashboard.podcasts.edit,dashboard.podcasts.update',
            'category' => 'podcasts',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_podcasts' => [
            'routes' => 'dashboard.podcasts.deletes,dashboard.podcasts.destroy',
            'category' => 'podcasts',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_podcasts' => [
            'routes' => 'dashboard.podcasts.index,dashboard.podcasts.datatable,dashboard.podcasts.show',
            'category' => 'podcasts',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],

        'add_clients' => [
            'routes' => 'dashboard.clients.create,dashboard.clients.store',
            'category' => 'clients',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_clients' => [
            'routes' => 'dashboard.clients.edit,dashboard.clients.update',
            'category' => 'clients',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_clients' => [
            'routes' => 'dashboard.clients.deletes,dashboard.clients.destroy',
            'category' => 'clients',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_clients' => [
            'routes' => 'dashboard.clients.index,dashboard.clients.datatable,dashboard.clients.show',
            'category' => 'clients',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],

        'add_categories' => [
            'routes' => 'dashboard.categories.create,dashboard.categories.store',
            'category' => 'categories',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_categories' => [
            'routes' => 'dashboard.categories.edit,dashboard.categories.update',
            'category' => 'categories',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_categories' => [
            'routes' => 'dashboard.categories.deletes,dashboard.categories.destroy',
            'category' => 'categories',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_categories' => [
            'routes' => 'dashboard.categories.index,dashboard.categories.datatable,dashboard.categories.show',
            'category' => 'categories',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_services' => [
            'routes' => 'dashboard.services.create,dashboard.services.store',
            'category' => 'services',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_services' => [
            'routes' => 'dashboard.services.edit,dashboard.services.update',
            'category' => 'services',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_services' => [
            'routes' => 'dashboard.services.deletes,dashboard.services.destroy',
            'category' => 'services',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_services' => [
            'routes' => 'dashboard.services.index,dashboard.services.datatable,dashboard.services.show',
            'category' => 'services',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_courses' => [
            'routes' => 'dashboard.courses.create,dashboard.courses.store',
            'category' => 'courses',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_courses' => [
            'routes' => 'dashboard.courses.edit,dashboard.courses.update',
            'category' => 'courses',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_courses' => [
            'routes' => 'dashboard.courses.deletes,dashboard.courses.destroy',
            'category' => 'courses',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_courses' => [
            'routes' => 'dashboard.courses.index,dashboard.courses.datatable,dashboard.courses.show',
            'category' => 'courses',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_meetings' => [
            'routes' => 'dashboard.meetings.create,dashboard.meetings.store',
            'category' => 'meetings',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_meetings' => [
            'routes' => 'dashboard.meetings.edit,dashboard.meetings.update',
            'category' => 'meetings',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_meetings' => [
            'routes' => 'dashboard.meetings.deletes,dashboard.meetings.destroy',
            'category' => 'meetings',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_meetings' => [
            'routes' => 'dashboard.meetings.index,dashboard.meetings.datatable,dashboard.meetings.show',
            'category' => 'meetings',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_videos' => [
            'routes' => 'dashboard.videos.create,dashboard.videos.store',
            'category' => 'videos',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_videos' => [
            'routes' => 'dashboard.videos.edit,dashboard.videos.update',
            'category' => 'videos',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_videos' => [
            'routes' => 'dashboard.videos.deletes,dashboard.videos.destroy',
            'category' => 'videos',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_videos' => [
            'routes' => 'dashboard.videos.index,dashboard.videos.datatable,dashboard.videos.show',
            'category' => 'videos',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_lessons' => [
            'routes' => 'dashboard.lessons.create,dashboard.lessons.store',
            'category' => 'lessons',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_lessons' => [
            'routes' => 'dashboard.lessons.edit,dashboard.lessons.update',
            'category' => 'lessons',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_lessons' => [
            'routes' => 'dashboard.lessons.deletes,dashboard.lessons.destroy',
            'category' => 'lessons',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_lessons' => [
            'routes' => 'dashboard.lessons.index,dashboard.lessons.datatable,dashboard.lessons.show',
            'category' => 'lessons',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],

        'add_lessoncontents' => [
            'routes' => 'dashboard.lessoncontents.create,dashboard.lessoncontents.store',
            'category' => 'lessoncontents',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_lessoncontents' => [
            'routes' => 'dashboard.lessoncontents.edit,dashboard.lessoncontents.update',
            'category' => 'lessoncontents',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_lessoncontents' => [
            'routes' => 'dashboard.lessoncontents.deletes,dashboard.lessoncontents.destroy',
            'category' => 'lessoncontents',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_lessoncontents' => [
            'routes' => 'dashboard.lessoncontents.index,dashboard.lessoncontents.datatable,dashboard.lessoncontents.show',
            'category' => 'lessoncontents',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_levels' => [
            'routes' => 'dashboard.levels.create,dashboard.levels.store',
            'category' => 'levels',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_levels' => [
            'routes' => 'dashboard.levels.edit,dashboard.levels.update',
            'category' => 'levels',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_levels' => [
            'routes' => 'dashboard.levels.deletes,dashboard.levels.destroy',
            'category' => 'levels',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_levels' => [
            'routes' => 'dashboard.levels.index,dashboard.levels.datatable,dashboard.levels.show',
            'category' => 'levels',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_exams' => [
            'routes' => 'dashboard.exams.create,dashboard.exams.store',
            'category' => 'exams',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_exams' => [
            'routes' => 'dashboard.exams.edit,dashboard.exams.update',
            'category' => 'exams',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_exams' => [
            'routes' => 'dashboard.exams.deletes,dashboard.exams.destroy',
            'category' => 'exams',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_exams' => [
            'routes' => 'dashboard.exams.index,dashboard.exams.datatable,dashboard.exams.show',
            'category' => 'exams',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_questions' => [
            'routes' => 'dashboard.questions.create,dashboard.questions.store',
            'category' => 'questions',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_questions' => [
            'routes' => 'dashboard.questions.edit,dashboard.questions.update',
            'category' => 'questions',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_questions' => [
            'routes' => 'dashboard.questions.deletes,dashboard.questions.destroy',
            'category' => 'questions',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_questions' => [
            'routes' => 'dashboard.questions.index,dashboard.questions.datatable,dashboard.questions.show',
            'category' => 'questions',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_medical_profiles' => [
            'routes' => 'dashboard.medical_profiles.create,dashboard.medical_profiles.store',
            'category' => 'medical_profiles',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_medical_profiles' => [
            'routes' => 'dashboard.medical_profiles.edit,dashboard.medical_profiles.update',
            'category' => 'medical_profiles',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_medical_profiles' => [
            'routes' => 'dashboard.medical_profiles.deletes,dashboard.medical_profiles.destroy',
            'category' => 'medical_profiles',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_medical_profiles' => [
            'routes' => 'dashboard.medical_profiles.index,dashboard.medical_profiles.datatable,dashboard.medical_profiles.show',
            'category' => 'medical_profiles',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_orders' => [
            'routes' => 'dashboard.orders.create,dashboard.orders.store',
            'category' => 'orders',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_orders' => [
            'routes' => 'dashboard.orders.edit,dashboard.orders.update',
            'category' => 'orders',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_orders' => [
            'routes' => 'dashboard.orders.deletes,dashboard.orders.destroy',
            'category' => 'orders',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_orders' => [
            'routes' => 'dashboard.orders.index,dashboard.orders.datatable,dashboard.orders.show',
            'category' => 'orders',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_order_statuses' => [
            'routes' => 'dashboard.order_statuses.create,dashboard.order_statuses.store',
            'category' => 'order_statuses',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_order_statuses' => [
            'routes' => 'dashboard.order_statuses.edit,dashboard.order_statuses.update',
            'category' => 'order_statuses',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_order_statuses' => [
            'routes' => 'dashboard.order_statuses.deletes,dashboard.order_statuses.destroy',
            'category' => 'order_statuses',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_order_statuses' => [
            'routes' => 'dashboard.order_statuses.index,dashboard.order_statuses.datatable,dashboard.order_statuses.show',
            'category' => 'order_statuses',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_sliders' => [
            'routes' => 'dashboard.sliders.create,dashboard.sliders.store',
            'category' => 'sliders',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_sliders' => [
            'routes' => 'dashboard.sliders.edit,dashboard.sliders.update',
            'category' => 'sliders',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_sliders' => [
            'routes' => 'dashboard.sliders.deletes,dashboard.sliders.destroy',
            'category' => 'sliders',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_sliders' => [
            'routes' => 'dashboard.sliders.index,dashboard.sliders.datatable,dashboard.sliders.show',
            'category' => 'sliders',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_subscribe' => [
            'routes' => 'dashboard.subscribe.create,dashboard.subscribe.store',
            'category' => 'subscribe',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_subscribe' => [
            'routes' => 'dashboard.subscribe.edit,dashboard.subscribe.update',
            'category' => 'subscribe',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_subscribe' => [
            'routes' => 'dashboard.subscribe.deletes,dashboard.subscribe.destroy',
            'category' => 'subscribe',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_subscribe' => [
            'routes' => 'dashboard.subscribe.index,dashboard.subscribe.datatable,dashboard.subscribe.show',
            'category' => 'subscribe',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_testimonials' => [
            'routes' => 'dashboard.testimonials.create,dashboard.testimonials.store',
            'category' => 'testimonials',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_testimonials' => [
            'routes' => 'dashboard.testimonials.edit,dashboard.testimonials.update',
            'category' => 'testimonials',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_testimonials' => [
            'routes' => 'dashboard.testimonials.deletes,dashboard.testimonials.destroy',
            'category' => 'testimonials',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_testimonials' => [
            'routes' => 'dashboard.testimonials.index,dashboard.testimonials.datatable,dashboard.testimonials.show',
            'category' => 'testimonials',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],


        'show_pages' => [
            'routes' => '',
            'category' => 'pages',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_pages' => [
            'routes' => '',
            'category' => 'pages',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_pages' => [
            'routes' => '',
            'category' => 'pages',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_pages' => [
            'routes' => '',
            'category' => 'pages',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'edit_settings' => [
            'routes' => '',
            'category' => 'settings',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'show_settings' => [
            'routes' => '',
            'category' => 'settings',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],

        'show_telescope' => [
            'routes' => 'dashboard.telescope.index,dashboard.telescope.datatable,dashboard.telescope.show',
            'category' => 'telescope',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],

        'add_cities' => [
            'routes' => 'dashboard.cities.create,dashboard.cities.store',
            'category' => 'cities',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_cities' => [
            'routes' => 'dashboard.cities.edit,dashboard.cities.update',
            'category' => 'cities',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_cities' => [
            'routes' => 'dashboard.cities.deletes,dashboard.cities.destroy',
            'category' => 'cities',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_cities' => [
            'routes' => 'dashboard.cities.index,dashboard.cities.datatable,dashboard.cities.show',
            'category' => 'cities',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],

        'add_states' => [
            'routes' => 'dashboard.states.create,dashboard.states.store',
            'category' => 'states',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_states' => [
            'routes' => 'dashboard.states.edit,dashboard.states.update',
            'category' => 'states',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_states' => [
            'routes' => 'dashboard.states.deletes,dashboard.states.destroy',
            'category' => 'states',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_states' => [
            'routes' => 'dashboard.states.index,dashboard.states.datatable,dashboard.states.show',
            'category' => 'states',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_countries' => [
            'routes' => 'dashboard.countries.create,dashboard.countries.store',
            'category' => 'countries',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_countries' => [
            'routes' => 'dashboard.countries.edit,dashboard.countries.update',
            'category' => 'countries',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_countries' => [
            'routes' => 'dashboard.countries.deletes,dashboard.countries.destroy',
            'category' => 'countries',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],

        'show_countries' => [
            'routes' => 'dashboard.countries.index,dashboard.countries.datatable,dashboard.countries.show',
            'category' => 'countries',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'add_homepage_sections' => [
            'routes' => 'dashboard.homepage_sections.create,dashboard.homepage_sections.store',
            'category' => 'homepage_sections',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_homepage_sections' => [
            'routes' => 'dashboard.homepage_sections.edit,dashboard.homepage_sections.update',
            'category' => 'homepage_sections',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_homepage_sections' => [
            'routes' => 'dashboard.homepage_sections.deletes,dashboard.homepage_sections.destroy',
            'category' => 'homepage_sections',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],

        'show_homepage_sections' => [
            'routes' => 'dashboard.homepage_sections.index,dashboard.homepage_sections.datatable,dashboard.homepage_sections.show',
            'category' => 'homepage_sections',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],

        'add_homepage_section_types' => [
            'routes' => 'dashboard.homepage_section_types.create,dashboard.homepage_section_types.store',
            'category' => 'homepage_section_types',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_homepage_section_types' => [
            'routes' => 'dashboard.homepage_section_types.edit,dashboard.homepage_section_types.update',
            'category' => 'homepage_section_types',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_homepage_section_types' => [
            'routes' => 'dashboard.homepage_section_types.deletes,dashboard.homepage_section_types.destroy',
            'category' => 'homepage_section_types',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],

        'show_homepage_section_types' => [
            'routes' => 'dashboard.homepage_section_types.index,dashboard.homepage_section_types.datatable,dashboard.homepage_section_types.show',
            'category' => 'homepage_section_types',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],

        // 'edit_about_types' => [
        //     'routes' => 'dashboard.about_types.edit,dashboard.about_types.update',
        //     'category' => 'about_types',
        //     'title_en' => 'Edit',
        //     'title_ar' => 'تعديل',
        // ],
        // 'delete_about_types' => [
        //     'routes' => 'dashboard.about_types.deletes,dashboard.about_types.destroy',
        //     'category' => 'about_types',
        //     'title_en' => 'Delete',
        //     'title_ar' => 'حذف',
        // ],

        // 'show_about_types' => [
        //     'routes' => 'dashboard.about_types.index,dashboard.about_types.datatable,dashboard.about_types.show',
        //     'category' => 'about_types',
        //     'title_en' => 'Show',
        //     'title_ar' => 'عرض',
        // ],


        // 'add_abouts' => [
        //     'routes' => 'dashboard.abouts.create,dashboard.abouts.store',
        //     'category' => 'abouts',
        //     'title_en' => 'Add',
        //     'title_ar' => 'إضافة',
        // ],

        // 'edit_abouts' => [
        //     'routes' => 'dashboard.abouts.edit,dashboard.abouts.update',
        //     'category' => 'abouts',
        //     'title_en' => 'Edit',
        //     'title_ar' => 'تعديل',
        // ],
        // 'delete_abouts' => [
        //     'routes' => 'dashboard.abouts.deletes,dashboard.abouts.destroy',
        //     'category' => 'abouts',
        //     'title_en' => 'Delete',
        //     'title_ar' => 'حذف',
        // ],

        // 'show_abouts' => [
        //     'routes' => 'dashboard.abouts.index,dashboard.abouts.datatable,dashboard.abouts.show',
        //     'category' => 'abouts',
        //     'title_en' => 'Show',
        //     'title_ar' => 'عرض',
        // ],

        'show_applies' => [
            'routes' => 'dashboard.applies.index,dashboard.applies.datatable,dashboard.applies.show',
            'category' => 'applies',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'delete_applies' => [
            'routes' => 'dashboard.applies.deletes,dashboard.applies.destroy',
            'category' => 'applies',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_serviceapplies' => [
            'routes' => 'dashboard.serviceapplies.index,dashboard.serviceapplies.datatable,dashboard.serviceapplies.show',
            'category' => 'serviceapplies',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'delete_serviceapplies' => [
            'routes' => 'dashboard.serviceapplies.deletes,dashboard.serviceapplies.destroy',
            'category' => 'serviceapplies',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],

        'add_memberships' => [
            'routes' => 'dashboard.memberships.create,dashboard.memberships.store',
            'category' => 'memberships',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_memberships' => [
            'routes' => 'dashboard.memberships.edit,dashboard.memberships.update',
            'category' => 'memberships',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_memberships' => [
            'routes' => 'dashboard.memberships.deletes,dashboard.memberships.destroy',
            'category' => 'memberships',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_memberships' => [
            'routes' => 'dashboard.memberships.index,dashboard.memberships.datatable,dashboard.memberships.show',
            'category' => 'memberships',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],





        'add_apphomes' => [
            'routes' => 'dashboard.apphomes.create,dashboard.apphomes.store',
            'category' => 'apphomes',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'edit_apphomes' => [
            'routes' => 'dashboard.apphomes.edit,dashboard.apphomes.update',
            'category' => 'apphomes',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_apphomes' => [
            'routes' => 'dashboard.apphomes.deletes,dashboard.apphomes.destroy',
            'category' => 'apphomes',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],
        'show_apphomes' => [
            'routes' => 'dashboard.apphomes.index,dashboard.apphomes.datatable,dashboard.apphomes.show',
            'category' => 'apphomes',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],







        'show_coursereviews' => [
            'routes' => 'dashboard.coursereviews.index,dashboard.coursereviews.datatable,dashboard.coursereviews.show',
            'category' => 'coursereviews',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],
        'edit_coursereviews' => [
            'routes' => 'dashboard.coursereviews.edit,dashboard.coursereviews.update',
            'category' => 'coursereviews',
            'title_en' => 'Edit',
            'title_ar' => 'تعديل',
        ],
        'delete_coursereviews' => [
            'routes' => 'dashboard.coursereviews.deletes,dashboard.coursereviews.destroy',
            'category' => 'coursereviews',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],

        'show_threads' => [
            'routes' => 'dashboard.threads.index,dashboard.threads.datatable,dashboard.threads.show',
            'category' => 'threads',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],

        'delete_threads' => [
            'routes' => 'dashboard.threads.deletes,dashboard.threads.destroy',
            'category' => 'threads',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],

        'add_threads' => [
            'routes' => 'dashboard.threads.create,dashboard.threads.store',
            'category' => 'threads',
            'title_en' => 'Add',
            'title_ar' => 'إضافة',
        ],
        'show_userexams' => [
            'routes' => 'dashboard.userexams.index,dashboard.userexams.datatable,dashboard.userexams.show',
            'category' => 'userexams',
            'title_en' => 'Show',
            'title_ar' => 'عرض',
        ],

        'delete_userexams' => [
            'routes' => 'dashboard.userexams.deletes,dashboard.userexams.destroy',
            'category' => 'userexams',
            'title_en' => 'Delete',
            'title_ar' => 'حذف',
        ],



    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->permissions as $name => $per_data) {
            $perm = Permission::firstOrCreate(['name' => $name], [
                'name'         => $name,
                'category'     => $per_data['category'],
                'guard_name'   => 'web',
                'routes'       => $per_data['routes'],
                'display_name' => ['en' => $per_data['title_en'], 'ar' => $per_data['title_ar']]
            ]);
        }
    }
}
