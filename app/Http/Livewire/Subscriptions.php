<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Subscriptions extends Component
{
    public string $priceMode = "monthly";
    public bool $auth = false;

    public function render()
    {
        return view('livewire.subscriptions');
    }
}
