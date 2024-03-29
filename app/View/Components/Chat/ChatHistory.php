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
     * For load more chats flag
     * 
     * @var bool
     */
    public $isLastMessage;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( Message $chat, User $receiverUser, bool $isLastMessage )
    {
        $this->chat = $chat;
        $this->receiverUser = $receiverUser;
        $this->isLastMessage = $isLastMessage;
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
