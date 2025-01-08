<?php

namespace App\Http\Livewire\Admin\Salaries;

use Livewire\Component;

use App\Salary;

class SalaryReport extends Component
{
    public $month;
    public $year;
    public $salaries;

    public function mount()
    {
        $this->month = now()->format('m');
        $this->year = now()->format('Y');
        $this->loadSalaries();
    }

    public function loadSalaries()
    {
        $this->salaries = Salary::with('users')
            ->where('month', $this->month)
            ->where('payment_date', $this->year)
            ->get();
            // dd($this->year);
    }

    public function render()
    {
        return view('livewire.admin.salaries.salary-report');
    }
}

