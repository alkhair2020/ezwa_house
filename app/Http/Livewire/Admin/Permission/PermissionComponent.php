<?php

namespace App\Http\Livewire\Admin\Permission;

use Livewire\Component;
use App\Leave;
use App\User;
use Livewire\WithPagination;
class PermissionComponent extends Component
{
    
    public $user_id, $leave_id, $type, $start_date, $end_date,$time, $reason, $status, $data_length;
    
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
        $add->type    = "permission";
        $add->start_date    = $this->start_date;
        $add->end_date    = $this->end_date;
        $add->time    = $this->time;
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
        // $this->type = $edit->type;
        $this->start_date = $edit->start_date;
        $this->end_date = $edit->end_date;
        $this->time = $edit->time;
        $this->status = $edit->status;
        

        $this->reason = $edit->reason;
        $this->isEdit = true;
        $this->isList = false;
        $this->isDeleted = false;
    }

    public function update()
    {
        $edit = Leave::findOrFail($this->leave_id);
        
        // if(isset($this->type)){
        //     $edit->type    = $this->type;
        // }
        if(isset($this->start_date)){
            $edit->start_date    = $this->start_date;
        }
        if(isset($this->end_date)){
            $edit->end_date    = $this->end_date;
        }
        if(isset($this->time)){
            $edit->time    = $this->time;
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
        $this->resetInputFields();
    }
    public function closeCreateOredit()
    {
        $this->isCreate = false;
        $this->isEdit = false;
        $this->isList = true;
    }
    private function resetInputFields()
    {
        $this->leave_id = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->time = '';
        $this->status = '';
        $this->reason = '';
    }

    public function render()
    {
        if($this->data_length){
            $leaves = Leave::with('users')->where('type','permission')
                ->whereHas('users', function($query) {
                    $query->where('name', 'like', '%'.$this->search.'%');
                })
                ->paginate($this->data_length);
            
        }elseif($this->status_filter){
            // dd('ss');
            $leaves = Leave::with('users')->where('type','permission')
                ->where('status', $this->status_filter)
                ->whereHas('users', function($query) {
                    $query->where('name', 'like', '%'.$this->search.'%');
                })
                ->paginate(10);
        }else{
            $leaves = Leave::select('leaves.*')
                    ->join('users', 'leaves.user_id', '=', 'users.id') 
                    ->where('leaves.type', 'permission')
                    ->where('users.name', 'like', '%' . $this->search . '%')
                    ->paginate(10);
            
        }
        // dd( $leaves);
        $this->data_length=0;
        $this->status_filter='';
        $users = User::get();
        return view('livewire.admin.permission.permission-component',compact('leaves','users'));
        // return view('livewire.admin.permission.user-permission',compact('leaves','users'));
    }
    public function validateCreate()
    {
        $this->validate([
                'user_id'=>'required',
                'start_date'=>'required',
                // 'check_in'=>'required',
                // 'check_out'=>'required',
            ],
            [
                'user_id.required'=>'الموظف مطلوب',
                'start_date.required'=>'التاريخ مطلوب',
                // 'check_in.required'=>'سعر الاسبوع مطلوب',
                // 'check_out.required'=>'',
              
            ]
        );
    }
}
