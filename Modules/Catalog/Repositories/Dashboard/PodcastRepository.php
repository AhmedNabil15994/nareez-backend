<?php

namespace Modules\Catalog\Repositories\Dashboard;

use Illuminate\Http\Request;
use Modules\Catalog\Entities\Podcast;
use Modules\Core\Repositories\Dashboard\CrudRepository;
use Modules\Core\Traits\RepositorySetterAndGetter;
use Modules\Course\Repositories\Dashboard\CourseVideoApiRepository;

class PodcastRepository extends CrudRepository
{
    use RepositorySetterAndGetter;

    public function __construct()
    {
        parent::__construct(new Podcast());
        $this->fileAttribute = ['thumb' => 'thumb','audio'=> 'audio'];
        $this->video_api = new CourseVideoApiRepository();
    }


    public function prepareData(array $data, Request $request, $is_create = true): array
    {
        $ffprobe    = \FFMpeg\FFProbe::create();
        $duration = $ffprobe->format($request->file('audio'))->get('duration');
        $data['duration'] = $duration;
        return parent::prepareData($data, $request, $is_create);
    }
}
