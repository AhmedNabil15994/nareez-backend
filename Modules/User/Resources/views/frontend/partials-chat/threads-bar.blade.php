    @foreach($oldChats as $chat )
    @php
    $user=$chat->first_side==auth()->id()?$chat->secondSide:$chat->firstSide;
    @endphp
    <div
        class="item d-flex align-items-center justify-content-between bg-white {{$user->id==request()->receiver_id?'active':''  }}">
        <div class="left-side">
            <div class="img-block">
                <img class="img-fluid"
                    src="{{ asset($user->image) }}"
                    alt="" />
            </div>
            <h4>
                <a href="{{ route('frontend.message.index',['receiver_id'=>$user->id]) }}">
                    {!! $user->nameWithMembership() !!}
                </a>
            </h4>
        </div>
        <div class="right-side">
            <span class="status online"></span>
            <p class="date">{{ optional($chat->updated_at)->diffForHumans() }}</p>
        </div>
    </div>
    @endforeach

