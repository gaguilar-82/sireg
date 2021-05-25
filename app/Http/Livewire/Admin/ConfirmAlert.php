<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Director;




class ConfirmAlert extends Component
{

    public $director;

    public function render()
    {
        return view('livewire.admin.confirm-alert');
    }

    public function destroy($director)
    {
        Director::find($director)->delete();
    }
}
