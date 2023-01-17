<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Chatroom!
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="flex flex-wrap justify-between">
            <div class="w-9/12 px-3 overflow-hidden shadow-sm">
                <div class="p-6 bg-white border border-gray-300 rounded-lg chat-screen min-h-36 h-96" id="chat-screen">
                    <x-chat.welcome-screen />
                </div>
            </div>

            <div class="w-3/12 px-4 overflow-hidden shadow-sm">
                <div class="p-6 bg-white border border-gray-300 rounded-lg overflow-x-auto min-h-36 h-96 ">
                    <h4 class="text-lg">Online Mates!</h4>
                    <hr class="border border-gray-200">
                    <div class="online-user-list" id="online-user-list"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.3/socket.io.js"></script>
    <script type="text/javascript">
        let UPDATE_ONLINE_STATUS = '{{ route('update-online-status') }}';
        let GET_ONLINE_USERS = '{{ route('get-online-users') }}';
        let SHOW_USER_CHAT = '{{ route('show-user-chat') }}';
        let STORE_MESSAGES = '{{ route('store-message') }}';
        let SHOW_RECEIVER_MESSAGE = '{{ route('show-receiver-message') }}';
        let RESET_CHAT_SCREEN = '{{ route('reset-chat-screen') }}';
    </script>
    <script src="{{ asset('assets/custom/js/chat.min.js') }}"></script>
</x-app-layout>
