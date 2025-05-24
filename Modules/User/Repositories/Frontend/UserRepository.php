<?php

namespace Modules\User\Repositories\Frontend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Core\Traits\Attachment\Attachment;
use Modules\Faq\Repositories\Dashboard\FaqRepository as Faq;

class UserRepository
{
    private $answer;
    private $user;



    public function __construct(User $user, Faq $faq)
    {
        $this->user = $user;
        $this->faqs =  $faq->getAllActive('id', 'asc');
    }




    public function updateProfile($request)
    {
        DB::beginTransaction();

        $user = $this->user->find(auth()->id());

        try {
            $user->update([
                'name'   => $request['name'],
                'email'  => $request['email'],
                'mobile' => $request['mobile'],
                'country_code' => $request['country_code'],
                'extra'  => $request['extra'],
            ]);

            $this->handleFileNormal($user, $request, true);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updatePassword($request)
    {
        DB::beginTransaction();

        $user = $this->user->find(auth()->id());

        try {
            $user->update([
                'password' => Hash::make($request['password']),
            ]);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }


    public function handleFileNormal($model, Request $request, bool $deleteBeforeUpdate=false)
    {
        if ($request->file('image')) {
            if ($deleteBeforeUpdate == true) {
                Attachment::deleteAttachment($model->image);
            }
            Attachment::addAttachment($request->file('image'), $model->getTable(), $model, 'image');
        }
    }
}
