<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class Chat extends Component
{
    public User $user;

    public $message = '';

    public function render()
    {
        // logic grup
        // return view('livewire.chat', [
        //     'messages' => Message::where('form_user_id', auth()->id())
        //         ->orWhere('form_user_id', $this->user->id)
        //         ->orWhere('to_user_id', auth()->id())
        //         ->orWhere('to_user_id', $this->user->id)
        //         ->get(),
        // ]);
        return view('livewire.chat', [
            'messages' => Message::where(function ($query) {
                $query->where('form_user_id', auth()->id())
                    ->where('to_user_id', $this->user->id);
            })->orWhere(function ($query) {
                $query->where('form_user_id', $this->user->id)
                    ->where('to_user_id', auth()->id());
            })->orderBy('created_at')->get(),
        ]);
    }
    public function sendMessage()
    {
        Message::create([
            'form_user_id' =>  auth()->id(),
            'to_user_id' => $this->user->id,
            'message' => $this->message,
        ]);
        $this->reset('message');
    }

    // Livewire component
    public function deleteMessage($messageId)
    {
        $message = Message::find($messageId);

        if ($message) {
            $message->delete();
        }
    }
}
