<?php

namespace Modules\Apps\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasTranslations;
use Modules\Apps\Entities\HomepageSection;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HomepageSectionType extends Model
{
    use HasTranslations ;

    public $timestamps = false;

    protected $fillable = [
        'key', 'title', 'desc', 'order', 'image','status','link'];

    public $translatable  = ['title','desc'];

    public const ABOUT = 'about';

    public const WHY = 'why';

    public const IELTS  = 'ielts';

    public const TEST  = 'test-your-level';

    public const HOW  = 'how-to-use-site';

    protected $primaryKey = 'key';

    protected $keyType = 'string';

    /**
     * Get all of the homepageSections for the HomepageSectionType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function homepageSections(): HasMany
    {
        return $this->hasMany(HomepageSection::class, 'type', 'key');
    }
}
