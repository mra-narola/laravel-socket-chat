<div class="flex justify-between items-center">
    <h4>
        <span id="active_username" class="text-lg font-bold">{{ $user->name }}</span>
        <small id="online_status" class="text-xs">
            @switch($user->availability_status)
                @case(App\Models\User::ACTIVE):
                    <span class="text-green-700">Active</span>
                @break;

                @case(App\Models\User::AWAY):
                    <span class="text-yellow-700">Away</span>
                @break;
            @endswitch
        </small>
    </h4>

    <div class="mr-3">
        {{-- <a href="javascript:void(0);" class="minimize-chat lowercase hover:text-indigo-500">Minimize</a> --}}
        {{-- <span>|</span> --}}
        <a href="javascript:void(0);" class="close-chat lowercase hover:text-indigo-500">Close</a>
    </div>
</div>

<hr class="md:border-b-1 border-indigo-400" />

<input type="hidden" name="receiver_id" id="receiver_id" value="{{ $user->id }}" />
<div class="min-h-96 h-96 p-3 overflow-x-auto" id="chat-history-wrapper">
    @foreach( $messages as $message )
        <x-chat.chat-history :chat="$message" :receiverUser="$user" />
    @endforeach
</div>

<div class="flex flex-column">
    <x-textarea style="resize: none;" id="message" class="block mt-1 w-full" placeholder="Write a message..." name="message" required autofocus />
    
    <a id="btn-send-message" class="pointer-events-none opacity-60 btn-send-message inline-flex self-center items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3" href="javascript:void(0);">
        <img src="{{ asset('assets/images/email-send.png') }}" />
    </a>
</div>
