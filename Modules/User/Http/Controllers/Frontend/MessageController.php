<?php

namespace Modules\User\Http\Controllers\Frontend;

use Modules\User\Entities\Thread;
use Illuminate\Routing\Controller;
use Modules\Area\Http\Requests\Frontend\MessageRequest;
use Modules\User\Repositories\Frontend\MessageRepository;

class MessageController extends Controller
{
    public $messageRepository;
    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }
    public function index()
    {
        $data=$this->messageRepository->chatData(request()->receiver_id);
        $data['defaultChat']=Thread::defaultThread()->first();
        return view('user::frontend.chat.chat', $data);
    }
    public function sendMessage(MessageRequest $request)
    {
        $messages=$this->messageRepository->create($request);
        return back();
    }
}
