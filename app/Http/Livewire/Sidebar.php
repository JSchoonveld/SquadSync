<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Sidebar extends Component
{
    public $messageCount = 0;

    protected $listeners = ['readMessage' => 'getUnreadMessageCount'];

    public function getUnreadMessageCount()
    {
        $this->test = 'notest';
        $this->messageCount = Message::where('recipient_id', Auth::user()->id)->whereNull('read_at')->get()->count();
    }

    public function boot()
    {
        $this->getUnreadMessageCount();
    }

    public function updated()
    {
        $this->getUnreadMessageCount();
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}
