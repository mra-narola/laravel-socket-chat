<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index() {
        return view('chatroom');
    }

    public function updateOnlineStatus( Request $request ) {
        if ( $request->ajax() ) {
            $user = auth()->user();

            $status = 0;
            switch ($request->availability_status) {
                case 1:
                    $status = User::ACTIVE;
                    break;

                case 0:
                    $status = User::OFFLINE;
                    break;

                case 2:
                    $status = User::AWAY;
                    break;
            }

            $user->availability_status = $status;
            if ( $user->save() ) {
                $this->data = array(
                    'status' => true,
                    'message' => 'User availability status has been updated.',
                );
            } else {
                $this->data = array(
                    'status' => false,
                    'message' => 'Something went wrong, while update user availability status.',
                );
            }
        } else {
            $this->data = array(
                'status' => false,
                'message' => 'Bad request',
            );
        }

        return response()->json($this->data);
    }

    public function getOnlineUsers( Request $request ) {
        if ( $request->ajax() ) {
            $users = User::select(array(
                'id', 'name', 'availability_status',
            ))->where(array(
                array( 'id', '!=', auth()->id() ),
            ))->whereIn('availability_status', array(User::ACTIVE, User::AWAY))->get();

            $this->data = array(
                'users' => $users,
            );

            $view = view('components.chat.online-users', $this->data)->render();

            $response = array(
                'status' => true,
                'data' => array(
                    'view' => $view,
                )
            );

            $this->data = $response;

        } else {
            $this->data = array(
                'status' => false,
                'message' => 'Bad request',
            );
        }

        return response()->json($this->data);
    }

    public function showUserChat( Request $request ) {
        if ( $request->ajax() ) {
            $user = User::select(array(
                'id', 'name', 'availability_status',
            ))->where(array(
                'id' => $request->id, // receiver id
            ))->first();

            $messages = Message::select(array(
                'id', 'sender_id', 'receiver_id', 'message', 'created_at',
            ))->where(array(
                'sender_id' => auth()->id(),
                'receiver_id' => $request->id,
            ))->orWhere(array(
                'sender_id' => $request->id,
                'receiver_id' => auth()->id(),
            ))->oldest()->groupBy('created_at')->get();

            $this->data = array(
                'user' => $user,
                'messages' => $messages,
            );
            $view = view('components.chat.chat-screen', $this->data)->render();

            $this->data = array(
                'status' => true,
                'data' => array(
                    'view' => $view,
                ),
            );
        } else {
            $this->data = array(
                'status' => false,
                'message' => 'Bad request',
            );
        }

        return response()->json($this->data);
    }

    public function loadOldChats( Request $request ) {
        if ( $request->ajax() ) {

        } else {
            $this->data = array(
                'status' => false,
                'message' => 'Bad request',
            );
        }

        return response()->json($this->data);
    }

    public function storeMessage( Request $request ) {
        if ( $request->ajax() ) {
            $message = new Message;
            $message->sender_id = $request->sender_id;
            $message->receiver_id = $request->receiver_id;
            $message->message = $request->message;
            if ( $message->save() ) {
                $user = User::select(array( 'id' ))->where(array( 'id' => $request->receiver_id ))->first();
                $this->data = array(
                    'chat' => $message,
                    'receiverUser' => $user,
                );

                $view = view('components.chat.chat-history', $this->data)->render();

                $this->data = array(
                    'status' => true,
                    'data' => array(
                        'view' => $view,
                        'message' => $message->id,
                    ),
                );
            }
        } else {
            $this->data = array(
                'status' => false,
                'message' => 'Bad request',
            );
        }

        return response()->json($this->data);
    }

    public function showReceiverMessage( Request $request ) {
        if ( $request->ajax() ) {

            $user = User::select(array( 'id' ))->where(array( 'id' => $request->sender_id ))->first();
            $message = Message::find($request->message_id);
            $this->data = array(
                'chat' => $message,
                'receiverUser' => $user,
            );

            $view = view('components.chat.chat-history', $this->data)->render();

            $this->data = array(
                'status' => true,
                'data' => array(
                    'view' => $view,
                ),
            );
        } else {
            $this->data = array(
                'status' => false,
                'message' => 'Bad request',
            );
        }

        return response()->json($this->data);
    }

    public function resetChatScreen( Request $request ) {
        if ( $request->ajax() ) {
            $view = view('components.chat.welcome-screen')->render();

            $this->data = array(
                'status' => true,
                'data' => array(
                    'view' => $view,
                ),
            );
        } else {
            $this->data = array(
                'status' => false,
                'message' => 'Bad request',
            );
        }

        return response()->json($this->data);
    }
}
