<?php

namespace Modules\User\Repositories\Frontend;

use Illuminate\Support\Arr;
use Modules\Order\Entities\OrderCourse;
use Modules\User\Entities\User;
use Modules\User\Entities\Thread;
use Modules\User\Entities\Message;
use Modules\Trainer\Entities\Trainer;
use Modules\Trainer\Repositories\Frontend\TrainerRepository;

class MessageRepository
{
    public $model;
    public function __construct()
    {
        $this->model=new Message();
    }

    public function getUserMessages($receiverId)
    {
        $messageSides=[$receiverId,auth()->id()];

        if (!request()->has('default_chat')) {
            $messages=  $this->model->where(
                ['receiver_id' => $messageSides[0],'sender_id'=>$messageSides[1]]
            )->orWhere(
                ['receiver_id'=>$messageSides[1],'sender_id'=>$messageSides[0]]
            )->oldest('id')->get();
        } else {
            $messages =  $this->model->where(
                ['receiver_id'=>$messageSides[1],'sender_id'=>null]
            )->oldest('id')->get();
        }


        return $messages;
    }

    public function create($request)
    {
        $data=$request->validated();
        $sides=[auth()->id(),$data['receiver_id']];

        $thread=Thread::whereNotNull('first_side')
        ->whereNotNull('second_side')
        ->where(function ($query) use ($sides) {
            return $query->where(['first_side'  => $sides[0],'second_side' => $sides[1]])
                         ->orWhere(['first_side'=> $sides[1],'second_side' => $sides[0]]);
        })->first();


        if (!$thread) {
            $thread=Thread::create(['first_side'=>$sides[0],'second_side'=>$sides[1]]);
        }
        $media=Arr::pull($data, 'media');
        $data['sender_id'] = auth()->user()->id;
        $message= $thread->messages()->create($data);
        if ($media) {
            $message->addMedia($media)->toMediaCollection('media');
        }
        return $message;
    }

    public function chatData($receiverId)
    {
        abort_if(!$this->checkUserCanChatWith($receiverId), 404);
        $receiver  = User::find($receiverId) ;
        $messages = $this->getUserMessages($receiverId);
        $oldChats = $this->getUserOldChats();
        return compact('messages', 'receiver', 'oldChats');
    }

    public function getUserOldChats()
    {
        $authID=auth()->id();
        $threads=Thread::oldChatWithOutDefaultThread()
       ->orderBy('updated_at', 'desc')->with(['firstSide','secondSide'])->get();
        return $threads;
    }


    public function checkUserCanChatWith($receiverId)
    {
        if ($receiverId) {
            if (Trainer::find(auth()->id())->can('trainer_access')) {
                return true;
            } else {
                $trainer=Trainer::findOrFail($receiverId);

                return $trainer->student();
            }
        }
        return true;
    }
}
