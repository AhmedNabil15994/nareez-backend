<?php

namespace Modules\About\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AboutType extends Model
{
    use HasTranslations ;

    public $timestamps = false;

    protected $fillable = [
        'key', 'title', 'desc', 'order', 'image','status'];

    public $translatable  = ['title','desc'];

    public const ABOUT = 'about-us';

    public const WHY = 'why-us';

    public const Target = 'target';
    public const Testimonials = 'testimonials';

    protected $primaryKey = 'key';

    protected $keyType = 'string';

    /**
     * Get all of the About for the AboutType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sections(): HasMany
    {
        return $this->hasMany(About::class, 'type', 'key');
    }
}
