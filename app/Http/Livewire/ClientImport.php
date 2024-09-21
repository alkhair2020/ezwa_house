<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Client;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ClientsImport;

class ClientImport extends Component
{
    use WithFileUploads;

    public $file;

    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new ClientsImport, $this->file->path());

        session()->flash('message', 'Clients imported successfully.');
    }

    public function render()
    {
        return view('livewire.client-import');
    }
}
