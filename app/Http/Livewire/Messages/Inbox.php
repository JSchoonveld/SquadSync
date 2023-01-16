<?php

namespace App\Http\Livewire\Messages;

use App\Enums\MailModeEnum;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Inbox extends Component
{
    public $messages = [];
    public $readMessages = [];
    public $message = null;
    public $mode = null;
    public $recipient;
    public $users = [];
    public $messageTitle;
    public $messageBody;
    public $test = 'test';

    protected $rules = [
        'messageTitle' => 'required|min:6|max:255',
        'messageBody' => 'required|min:6',
        'recipient' => 'required|exists:users,id'
    ];

    public function mount()
    {
        $this->getMessages();
        $this->getTenantUsers();
        $this->mode = MailModeEnum::index()->value;
    }

    public function getTenantUsers()
    {
        $this->users = User::where('id', '!=', Auth::id())->get();
    }

    public function sendMessage()
    {
        $this->validate();

        $message = Message::create([
            'title' => $this->messageTitle,
            'body' => $this->messageBody,
            'sender_id' => Auth::user()->id,
            'tenant_id' => Auth::user()->tenant_id,
            'recipient_id' => $this->recipient,
        ]);
    }

    public function getMessages() {
        $this->messages = Message::where('recipient_id', Auth::user()->id)->whereNull('read_at')->get();
        $this->readMessages = Message::where('recipient_id', Auth::user()->id)->whereNotNull('read_at')->get();
    }

    public function showNewMessageForm() {
        $this->mode = MailModeEnum::create()->value;
    }

    public function setOverview() {
        $this->getMessages();
        $this->mode = MailModeEnum::index()->value;
    }

    public function getSingleMessage($id)
    {
        $this->mode = MailModeEnum::show()->value;
        $this->emit('readMessage');
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
