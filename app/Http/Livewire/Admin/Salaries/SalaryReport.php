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


<?php

namespace App\Http\Livewire\Admin\Salaries;

use Livewire\Component;
use App\Salary;
use Livewire\WithPagination;
use App\User;
class SalaryComponent extends Component
{
    public $user_id, $salary_id , $base_salary, $bonuses, $deductions, $month, $payment_date;
   

    use WithPagination;
    public $isCreate = 0;
    public $isEdit = 0;
    public $isList = 1;
    public $search = '';
    public $data_length;
    public $month_filter;
    public $year;
    public function render()
    {
        
        if($this->data_length){
            $salaries = Salary::select('salaries.*')
            ->join('users', 'salaries.user_id', '=', 'users.id')
            ->where('users.name', 'like', '%' . $this->search . '%') 
            ->paginate($this->data_length);
            // $attendances = Attendance::with('users')->where('', 'like', '%'.$this->search.'%')->paginate(10);
        }if($this->month_filter && $this->year){
            $salaries = Salary::select('salaries.*')
            ->join('users', 'salaries.user_id', '=', 'users.id')
            ->where('users.name', 'like', '%' . $this->search . '%')
            ->where('month', $this->month_filter)
            ->whereYear('created_at', $year)
            ->paginate(10);
        }if($this->month_filter){
            
            $salaries = Salary::select('salaries.*')
            ->join('users', 'salaries.user_id', '=', 'users.id') 
            ->where('users.name', 'like', '%' . $this->search . '%')
            ->where('month', $this->month_filter)
            ->paginate(10);
        }if($this->year){
            $salaries = Salary::select('salaries.*')
            ->join('users', 'salaries.user_id', '=', 'users.id') 
            ->where('users.name', 'like', '%' . $this->search . '%') 
            ->whereYear('created_at', $this->year)
            ->paginate(10);
        }else{
            $salaries = Salary::select('salaries.*')
                        ->join('users', 'salaries.user_id', '=', 'users.id') 
                        ->where('users.name', 'like', '%' . $this->search . '%') 
                        ->paginate(10);
            // $salaries = Salary::select('salaries.*')
            // ->join('users', 'salaries.user_id', '=', 'users.id') 
            // ->where('users.name', 'like', '%' . $this->search . '%')
            // ->where('month', $this->month_filter)
            // ->paginate(10);
           
            // $attendances = Attendance::with('users')->where('number', 'like', '%'.$this->search.'%')->paginate($this->data_length);
       }
    //    dd($salaries);
        // $salaries = Salary::with('users')->paginate(10);
        $users = User::get();
        return view('livewire.admin.salaries.salary-component',compact('salaries','users'));
    }
    public function store()
    {
        $this->validateCreate();
        // dd($this->base_salary + $this->bonuses - $this->deductions);
        $add = new Salary;
        $add->user_id    = $this->user_id;
        $add->base_salary    = $this->base_salary;
        $add->bonuses    = $this->bonuses ?? 0;
        $add->deductions    = $this->deductions ?? 0;
        // $add->net_salary    = $this->base_salary + $this->bonuses - $this->deductions;
        $add->month    = $this->month;
        $add->payment_date    = $this->payment_date;
       
        $add->save();
        session()->flash('message', 'تم الإضافة بنجاح');
        // session()->flash('message', $this->product_id ? 'Product Updated Successfully.' : 'Product Created Successfully.');

        $this->closeCreateOredit();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $edit = Salary::findOrFail($id);
        $this->attendance_id = $id;
        $this->base_salary = $edit->base_salary;
        $this->bonuses = $edit->bonuses;
        $this->deductions = $edit->deductions;
        $this->month = $edit->month;
        $this->payment_date = $edit->payment_date;

        $this->isEdit = true;
        $this->isList = false;
        $this->isDeleted = false;
    }

    public function update()
    {
        $edit = Salary::findOrFail($this->attendance_id);
        
        if(isset($this->base_salary)){
            $edit->base_salary    = $this->base_salary;
        }
        if(isset($this->bonuses)){
            $edit->bonuses    = $this->bonuses;
        }
        if(isset($this->deductions)){
            $edit->deductions    = $this->deductions;
        }
        if(isset($this->month)){
            $edit->month    = $this->month;
        }
        if(isset($this->payment_date)){
            $edit->payment_date    = $this->payment_date;
        }
       
        $edit->save();

        $this->closeCreateOredit();
        $this->resetInputFields();
        session()->flash('message', 'تم التعديل بنجاح');
    }
    public function gitIdForDelete(int $id)
    {
        $this->salary_id = $id;
        $this->isDeleted =true;
    }

    public function delete()
    {
        Salary::find($this->salary_id)->delete();
       
        session()->flash('message', 'تم الحذف بنجاح');
    }
    public function create()
    {
        $this->openCreate();
    }
    public function openCreate()
    {
        $this->isCreate = true;
        $this->isList = false;
    }
    public function closeCreateOredit()
    {
        $this->isCreate = false;
        $this->isEdit = false;
        $this->isList = true;
    }
    private function resetInputFields()
    {
        $this->attendance_id = '';
        $this->date = '';
        $this->status = '';
        $this->check_in = '';
        $this->check_out = '';
    }

   
    public function validateCreate()
    {
        $this->validate([
                'user_id'=>'required',
                'base_salary'=>'required',
                'month'=>'required',
                'payment_date'=>'required',
            ],
            [
                'user_id.required'=>'الموظف مطلوب',
                'base_salary.required'=>'الراتب الاساسي مطلوب ',
                'month.required'=>'الشهر مطلوب',
                'payment_date.required'=>'تاريخ الدفع مطلوب',
              
            ]
            // session()->flash('error', 'Form submitted error!');
        );
    }












}
