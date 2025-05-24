<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    protected $table = 'user_answers';

    protected $fillable = [ 'user_id' , 'faq_id' , 'answer_id' ];
}
