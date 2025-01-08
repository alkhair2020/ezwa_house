<?php

namespace App\Http\Livewire\Admin\Leaves;

use Livewire\Component;
use App\Leave;
class LeaveReport extends Component
{
    public $status = 'Pending';
    public $leaves;

    public function mount()
    {
        $this->loadLeaves();
    }

    public function loadLeaves()
    {
        $this->leaves = Leave::with('users')
            ->where('status', $this->status)
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.leaves.leave-report');
    }
   
}
