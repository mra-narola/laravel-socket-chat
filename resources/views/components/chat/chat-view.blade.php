@forelse( $messages as $message )
    <x-chat.chat-history :chat="$message" :isLastMessage="$loop->index == 0" :receiverUser="$user" />
@empty
    <div class="pt-4 flex flex-col justify-start" id="greeting-message-wrapper">
        <div class="rounded-lg bg-white text-slate-900 shadow-xl shadow-black/5 ring-1 p-3 flex flex-col text-center">
            <span class="text-normal">Send your first <i class="text-indigo-900 font-bold">Hey!</i> message to {{ $user->name }}.</span>
        </div>
    </div>
@endforelse
