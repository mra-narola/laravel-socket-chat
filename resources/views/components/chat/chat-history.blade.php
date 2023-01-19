@if ( $receiverUser->id == $chat->receiver_id )
    <div class="pt-4 flex flex-col justify-end text-right">
        <div class="rounded-lg bg-white text-slate-900 shadow-xl shadow-black/5 ring-1 p-3 flex flex-col self-end max-w-4xl">
            <span class="text-normal text-left">{!! $chat->message !!}</span>
            <div class="text-right">
                <span class="text-xxs bg-gray-800 py-1 px-2 text-white rounded">{{ date('d M, Y h:i', strtotime($chat->created_at)) }}</span>
            </div>
        </div>
    </div>
@else
    <div class="pt-4 flex flex-col justify-start">
        <span class="font-medium text-sm font-semibold">{{ $chat->selfUser->name }}</span>
        <div class="rounded-lg bg-white text-slate-900 shadow-xl shadow-black/5 ring-1 p-3 flex flex-col self-start max-w-4xl">
            <span class="text-normal">{!! $chat->message !!}</span>
            <div class="text-right">
                <span class="text-xxs bg-gray-800 py-1 px-2 text-white rounded">{{ date('d M, Y h:i', strtotime($chat->created_at)) }}</span>
            </div>
        </div>
    </div>
@endif