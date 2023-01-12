<?php

namespace App\Http\Livewire\Messages;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Inbox extends Component
{
    public $messages = [];
    public $readMessages = [];
    public $message = null;
    public $overview = true;
    public $test = 'test';

    public function mount()
    {
        $this->getMessages();
    }

    public function getMessages() {
        $this->messages = Message::where('recipient_id', Auth::user()->id)->whereNull('read_at')->get();
        $this->readMessages = Message::where('recipient_id', Auth::user()->id)->whereNotNull('read_at')->get();
    }

    public function setOverview() {
        $this->getMessages();
        $this->overview = true;
    }

    public function getSingleMessage($id)
    {
        $this->overview = false;
        $message = Message::find($id);
        $message->read_at = now();
        $message->save();
        $this->message = $message;
    }

    public function render()
    {
        return view('livewire.messages.inbox');
    }
}
