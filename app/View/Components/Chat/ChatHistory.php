<?php

namespace App\View\Components\Chat;

use App\Models\Message;
use App\Models\User;
use Illuminate\View\Component;

class ChatHistory extends Component
{
    /**
     * The message data.
     *
     * @var App\Models\Message
     */
    public $chat;

    /**
     * The receiver user.
     *
     * @var App\Models\User
     */
    public $receiverUser;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( Message $chat, User $receiverUser )
    {
        $this->chat = $chat;
        $this->receiverUser = $receiverUser;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.chat.chat-history');
    }
}
