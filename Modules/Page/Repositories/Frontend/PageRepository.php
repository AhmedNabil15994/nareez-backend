<?php

namespace Modules\Page\Repositories\Frontend;

use Modules\Page\Entities\Page;
use Hash;
use DB;

class PageRepository
{
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function getAllActive($order = 'id', $sort = 'desc')
    {
        $pages = $this->page->active()->orderBy($order, $sort)->get();
        return $pages;
    }

    public function findBySlug($slug)
    {
        $page = $this->page->AnyTranslation('slug', $slug)->first();
        return $page;
    }

    public function findById($id)
    {
        $page = $this->page->find($id);
        return $page;
    }

    public function getAboutUsPage()
    {
        $page = $this->page->find(setting('other', 'about_us'));

        return $page;
    }

    public function getTermsPage()
    {
        $page = $this->page->find(setting('other', 'terms'));
        return $page;
    }

    public function getPrivacyPage()
    {
        $page = $this->page->find(setting('other', 'privacy_policy'));
        return $page;
    }
    public function getFaqsPage()
    {
        $page = $this->page->find(setting('other', 'faqs'));
        return $page;
    }

    public function checkRouteLocale($model, $slug)
    {
        // if ($model->translate()->where('slug', $slug)->first()->locale != locale()) {
        //     return false;
        // }
        if ($array = $model->getTranslations("slug")) {
            $locale = array_search($slug, $array);

            return $locale == locale();
        }

        return true;
    }
}
