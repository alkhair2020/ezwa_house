<?php

namespace App\Http\Livewire\Admin\Leaves;

use Livewire\Component;
use App\Leave;
use App\User;
use Livewire\WithPagination;
class LeaveComponent extends Component
{
    public $user_id, $leave_id, $type, $start_date, $end_date, $reason, $status, $data_length;
    
    use WithPagination;
    public $search = '';
    public $isCreate = 0;
    public $isEdit = 0;
    public $isList = 1;
    public $status_filter;
    public function store()
    {
        $this->validateCreate();
       

        $add = new Leave;
        $add->user_id    = $this->user_id;
        $add->type    = $this->type;
        $add->start_date    = $this->start_date;
        $add->end_date    = $this->end_date;
        $add->reason    = $this->reason;
        $add->save();
        session()->flash('message', 'تم الإضافة بنجاح');
        // session()->flash('message', $this->product_id ? 'Product Updated Successfully.' : 'Product Created Successfully.');

        $this->closeCreateOredit();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $edit = Leave::findOrFail($id);
        // $this->user_id = $id;
        $this->leave_id = $id;
        $this->type = $edit->type;
        $this->start_date = $edit->start_date;
        $this->end_date = $edit->end_date;
        $this->status = $edit->status;
        $this->reason = $edit->reason;

        $this->isEdit = true;
        $this->isList = false;
        $this->isDeleted = false;
    }

    public function update()
    {
        $edit = Leave::findOrFail($this->leave_id);
        
        if(isset($this->type)){
            $edit->type    = $this->type;
        }
        if(isset($this->start_date)){
            $edit->start_date    = $this->start_date;
        }
        if(isset($this->end_date)){
            $edit->end_date    = $this->end_date;
        }
        if(isset($this->status)){
            $edit->status    = $this->status;
        }
        if(isset($this->reason)){
            $edit->reason    = $this->reason;
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
        Leave::find($this->attendance_id)->delete();
       
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
            $leaves = Leave::with('users')
                ->whereHas('users', function($query) {
                    $query->where('name', 'like', '%'.$this->search.'%');
                })
                ->paginate($this->data_length);
            
        }elseif($this->status_filter){
            // dd('ss');
            $leaves = Leave::with('users')
                ->where('status', $this->status_filter)
                ->whereHas('users', function($query) {
                    $query->where('name', 'like', '%'.$this->search.'%');
                })
                ->paginate(10);
        }else{
            $leaves = Leave::select('leaves.*')
                    ->join('users', 'leaves.user_id', '=', 'users.id') 
                    ->where('users.name', 'like', '%' . $this->search . '%')
                    ->paginate(10);
            
        }
        $this->data_length=0;
        $this->status_filter='';
        $users = User::get();
        return view('livewire.admin.leaves.leave-component',compact('leaves','users'));
    }
    public function validateCreate()
    {
        $this->validate([
                'user_id'=>'required',
                'type'=>'required',
                'start_date'=>'required',
                // 'check_in'=>'required',
                // 'check_out'=>'required',
            ],
            [
                'user_id.required'=>'الموظف مطلوب',
                'type.required'=>'نوع الاجازة مطلوب',
                'start_date.required'=>'التاريخ مطلوب',
                // 'check_in.required'=>'سعر الاسبوع مطلوب',
                // 'check_out.required'=>'',
              
            ]
        );
    }
}
