<?php

namespace App\Http\Livewire\Admin\Employees;

use Livewire\Component;
use App\User;
use App\Leave;
use App\UserContract;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
class EmployeeComponent extends Component
{
    
    public $user_id, $name, $email, $password, $phone, $address, $nationality, $marital_status , $qualification , 
           $document_type , $identity_number, $document_issue_date, $place_of_issue,$document_expiry,$data_length;
   
    use WithPagination;
    public $search = '';
    public $isCreate = 0;
    public $isEdit = 0;
    public $isList = 1;
    public $date_filter;
    public $isPrint = 0;
    public $employee=null;
    public $contract=null;

    public $leaves;
    public $permissios;
    public function store()
    {
        // $this->validateCreate();
       
        $add = new User;
        $add->name    = $this->name;
        $add->email    = $this->email;
        if($this->password){
            $add->password = Hash::make($this->password);
        }else{
            $add->password = Hash::make('1234');
        }
        // dd($this->identity_number);
        $add->phone    = $this->phone;
        $add->address    = $this->address;
        $add->nationality    = $this->nationality;
        $add->marital_status    = $this->marital_status;
        $add->qualification    = $this->qualification;
        $add->document_type    = $this->document_type;
        $add->identity_number    = $this->identity_number;
        $add->document_issue_date    = $this->document_issue_date;
        $add->place_of_issue    = $this->place_of_issue;
        $add->document_expiry    = $this->document_expiry;
        $add->type    ='employee';
       
        $add->save();
        session()->flash('message', 'تم الإضافة بنجاح');
        // session()->flash('message', $this->product_id ? 'Product Updated Successfully.' : 'Product Created Successfully.');

        $this->closeCreateOredit();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $edit = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $edit->name;
        $this->email = $edit->email;
        $this->phone = $edit->phone;
        $this->address = $edit->address;
        $this->nationality = $edit->nationality;
        $this->marital_status = $edit->marital_status;
        $this->qualification = $edit->qualification;
        $this->document_type = $edit->document_type;
        $this->identity_number = $edit->identity_number;
        $this->document_issue_date = $edit->document_issue_date;
        $this->place_of_issue = $edit->place_of_issue;  
        $this->document_expiry = $edit->document_expiry;  
        $this->isEdit = true;
        $this->isList = false;
        $this->isDeleted = false;
    }
    public function print($id)
    {
        $this->leaves = Leave::where('type',"!=",'permission')->get();
        $this->permissios = Leave::where('type','permission')->get();
        $this->employee = User::findOrFail($id);
        $this->contract = UserContract::where('user_id',$id)->with('user')->first();
        // dd($this->contract);
        // $this->isList = false;
        $this->isPrint = true;
    }

    public function update()
    {
        $edit = User::findOrFail($this->user_id);
        
        if(isset($this->name)){
            $edit->name    = $this->name;
        }
        if(isset($this->email)){
            $edit->email    = $this->email;
        }
        if(isset($this->phone)){
            $edit->phone    = $this->phone;
        }
        if(isset($this->address)){
            $edit->address    = $this->address;
        }
        if(isset($this->nationality)){
            $edit->nationality    = $this->nationality;
        }
        if(isset($this->marital_status)){
            $edit->marital_status    = $this->marital_status;
        }
        if(isset($this->qualification)){
            $edit->qualification    = $this->qualification;
        }
        if(isset($this->document_type)){
            $edit->document_type    = $this->document_type;
        }
        if(isset($this->identity_number)){
            $edit->identity_number    = $this->identity_number;
        }
        if(isset($this->document_issue_date)){
            $edit->document_issue_date    = $this->document_issue_date;
        }
        if(isset($this->place_of_issue)){
            $edit->place_of_issue    = $this->place_of_issue;
        }
        if(isset($this->document_expiry)){
            $edit->document_expiry    = $this->document_expiry;
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
            $users = User::where('type','employee')->where('name', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate($this->data_length);
        }else{
            $users = User::where('type','employee')->where('name', 'like', '%'.$this->search.'%')->paginate(10);
        }
        // dd($users);
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
