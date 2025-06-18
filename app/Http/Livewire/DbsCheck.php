<?php

namespace App\Http\Livewire;

use App\Disclosure;
use Apcp\User;
use Livewire\Component;

class DbsCheck extends Component
{
    public $successMsg;
    public $errorMsg;
    public $colleagues = [];
    
    public function render()
    {
        $disclosure = Disclosure::whereNull('certificate_no')->get();
        $this->colleagues=$disclosure->map->user->filter()->unique('id')->values();
        if ($this->colleagues->isEmpty()) {
            $this->errorMsg = 'No data found.';
        } else {
            $this->successMsg = 'There are ' . $this->colleagues->count() . ' colleagues with pending DBS checks.';
        } 
        return view('livewire.dbs-check');
    }
}
