<?php

namespace Modules\Blog\Repositories\Dashboard;

use Modules\Blog\Entities\Blog;
use Modules\Core\Repositories\Dashboard\CrudRepository;

class BlogRepository extends CrudRepository
{
    public function __construct()
    {
        parent::__construct(Blog::class);
        $this->statusAttribute     = ['status','is_news'];
        $this->fileAttribute       = ['image' => 'image'];
    }
}
