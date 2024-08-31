<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use App\Client;

class ClientSelect extends Component
{
    use WithPagination;

    public $search = 'ahmed';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $clients = Client::where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return view('livewire.client-select', ['clients' => $clients]);
    }
}