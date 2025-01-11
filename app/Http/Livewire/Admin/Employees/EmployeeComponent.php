<?php

namespace App\Http\Livewire\Admin\Employees;

use Livewire\Component;
use App\User;
use Livewire\WithPagination;
class EmployeeComponent extends Component
{
    
    public $user_id, $date, $attendance_id, $status, $check_in, $check_out, $data_length;
   
    use WithPagination;
    public $search = '';
    public $isCreate = 0;
    public $isEdit = 0;
    public $isList = 1;
    public $date_filter;
    public $isPrint = 0;
    public function store()
    {
        $this->validateCreate();
       
        $add = new User;
        $add->user_id    = $this->user_id;
        $add->date    = $this->date;
        // $add->status    = $this->status;
        $add->check_in    = $this->check_in;
        $add->check_out    = $this->check_out;
       
        $add->save();
        session()->flash('message', 'تم الإضافة بنجاح');
        // session()->flash('message', $this->product_id ? 'Product Updated Successfully.' : 'Product Created Successfully.');

        $this->closeCreateOredit();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $property = User::findOrFail($id);
        // $this->user_id = $id;
        $this->attendance_id = $id;
        $this->date = $property->date;
        $this->status = $property->status;
        $this->check_in = $property->check_in;
        $this->check_out = $property->check_out;
        $this->isEdit = true;
        $this->isList = false;
        $this->isDeleted = false;
    }
    public function print($id)
    {
        $property = User::findOrFail($id);
        
        // $this->isList = false;
        $this->isPrint = true;
    }

    public function update()
    {
        $edit = User::findOrFail($this->attendance_id);
        
        if(isset($this->date)){
            $edit->date    = $this->date;
        }
        if(isset($this->status)){
            $edit->status    = $this->status;
        }
        if(isset($this->check_in)){
            $edit->check_in    = $this->check_in;
        }
        if(isset($this->check_out)){
            $edit->check_out    = $this->check_out;
        }
       
        $edit->save();

        $this->closeCreateOredit();
        $this->resetInputFields();
        session()->flash('message', 'تم التعديل بنجاح');
    }
    public function gitIdForDelete(int $id)
    {
        $this->attendance_id = $id;
        $this->isDeleted =true;
    }

    public function delete()
    {
        User::find($this->attendance_id)->delete();
       
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

    public function render()
    {
        if($this->data_length){
            $users = User::where('name', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate($this->data_length);
        }else{
            $users = User::where('name', 'like', '%'.$this->search.'%')->paginate(10);
        }
        return view('livewire.admin.employees.employee-component',compact('users'));
    }
    public function validateCreate()
    {
        $this->validate([
                'user_id'=>'required',
                'date'=>'required',
                // 'status'=>'required',
                // 'check_in'=>'required',
                // 'check_out'=>'required',
            ],
            [
                'user_id.required'=>'الموظف مطلوب',
                'date.required'=>'التاريخ مطلوب',
                // 'status.required'=>'سعر اليوم مطلوب',
                // 'check_in.required'=>'سعر الاسبوع مطلوب',
                // 'check_out.required'=>'',
              
            ]
            // session()->flash('error', 'Form submitted error!');
        );
    }
}
