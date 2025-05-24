<?php

namespace Modules\Catalog\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\ScopesTrait;
use Modules\Trainer\Entities\Trainer;

class Client extends Model
{
    use  ScopesTrait;

    protected $fillable = ['image','trainer_id','status'];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}
