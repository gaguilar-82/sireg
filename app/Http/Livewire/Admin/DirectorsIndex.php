<?php

namespace App\Http\Livewire\Admin;

use App\Models\Director;
use Livewire\Component;
use Livewire\WithPagination;



class DirectorsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    protected $listeners = ['delete'];

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $directors = Director::where('NombreDirector', 'LIKE' , '%' . $this->search . '%')
                    ->orWhere('ApellidoPaternoDirector', 'LIKE' , '%' . $this->search . '%')
                    ->orWhere('ApellidoMaternoDirector', 'LIKE' , '%' . $this->search . '%')
                    ->paginate();

        return view('livewire.admin.directors-index', compact('directors'));
    }

    public function delete(Director $director)
    {
        $director->delete();
    }

}
