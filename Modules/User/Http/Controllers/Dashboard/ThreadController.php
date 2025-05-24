<?php

namespace Modules\User\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Modules\User\Entities\User;
use Illuminate\Routing\Controller;
use Modules\Core\Traits\Dashboard\CrudDashboardController;
use Modules\User\Entities\Thread;
use Modules\User\Http\Requests\Dashboard\SendMessageRequest;

class ThreadController extends Controller
{
    use CrudDashboardController;


    public function sendMessageForm()
    {
        return view('user::dashboard.threads.send-messages-to-users');
    }
    public function sendMessageStore(SendMessageRequest $request)
    {
        $sendToAll=$request->select_all;
        if ($sendToAll) {
            $users=User::query();
        } else {
            $users=User::whereIn('id', $request->users);
        }

        $users->chunk(
            200,
            function ($chunkUsers) use ($request) {
                foreach ($chunkUsers as $key => $user) {
                    $thread=Thread::whereNull('first_side')->where(['second_side'=>$user->id])->firstOrCreate(
                        ['first_side'=>null, 'second_side'=>$user->id,]
                    );

                    $thread->messages()->create([
                        'sender_id'=>null,
                        'receiver_id'=>$user->id,
                        'message'=>$request->message,
                     ]);
                }
            }
        );
        return $this->createdResponse(true, [true, __('apps::dashboard.messages.created')]);
    }
}
