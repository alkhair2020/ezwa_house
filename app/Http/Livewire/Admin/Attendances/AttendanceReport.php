<?php

namespace App\Http\Livewire\Admin\Attendances;

use Livewire\Component;
use App\Attendance;
use Carbon\Carbon;

class AttendanceReport extends Component
{
    public $date;
    public $month;
    public $attendances;

    public function mount()
    {
        $this->date = Carbon::today()->toDateString(); // تاريخ اليوم
        $this->month = Carbon::today()->format('Y-m'); // الشهر الحالي
        $this->loadDailyReport();
    }

    public function loadDailyReport()
    {
       
        $this->attendances = Attendance::with('users')
            ->whereDate('date', $this->date)
            ->get();
    }

    public function loadMonthlyReport()
    {
        
        $this->attendances = Attendance::with('users')
            ->whereMonth('date', Carbon::parse($this->month)->month)
            ->whereYear('date', Carbon::parse($this->month)->year)
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.attendances.attendance-report');
    }
}
