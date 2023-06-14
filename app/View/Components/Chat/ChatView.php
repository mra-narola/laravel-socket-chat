<?php

namespace App\View\Components\Chat;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class ChatView extends Component
{
    /**
     * The message collection
     * 
     * @var Illuminate\Database\Eloquent\Collection
     */
    public $messages;

    /**
     * The receiver user.
     *
     * @var App\Models\User
     */
    public $user;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( Collection $messages, User $user )
    {
        $this->messages = $messages;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.chat.chat-view');
    }
}
