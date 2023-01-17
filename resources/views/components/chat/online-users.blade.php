<div class="w-[24.5rem] divide-y divide-slate-400/20 rounded-lg bg-white text-[0.8125rem] leading-5 text-slate-900 shadow-xl shadow-black/5 ring-1 mt-2">
    @forelse ( $users as $user )
        <div class="flex items-center p-3">
            <div class="ml-4 flex-auto">
                <div class="font-medium">{{ $user->name }}</div>
                <div class="mt-1 text-xs">@switch($user->availability_status)
                    @case(App\Models\User::ACTIVE)
                        Online
                        @break;
                    @case(App\Models\User::AWAY)
                        Away
                        @break;
                @endswitch</div>
            </div>
            <a href="javascript:void(0);" data-xid="{{ $user->id }}" class="show-chat inline-flex self-center items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Chat</a>
        </div>
    @empty
        <div class="p-4 text-center">
            <span>No mates are online!</span>
        </div>
    @endforelse
</div>