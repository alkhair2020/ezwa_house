<?php

namespace App\Http\Livewire\Admin\UsersContracts;

use Livewire\Component;
use App\UserContract;
use App\User;
use Livewire\WithPagination;
class UsersContracts extends Component
{
    use WithPagination;
    public $contractId, $userId, $type, $employmentSource, $startDate, $endDate,  $data_length;
    // public $isEdit = false;
    public $search = '';
    public $isCreate = 0;
    public $isEdit = 0;
    public $isList = 1;
    public $status_filter;
    protected $rules = [
        'userId' => 'required|exists:users,id',
        'type' => 'required|string|max:255',
        'startDate' => 'required|date',
        'endDate' => 'nullable|date|after_or_equal:contractStartDate',
    ];

    public function render()
    {
        
        if($this->data_length){
            $contracts = UserContract::with('users')
                ->whereHas('users', function($query) {
                    $query->where('name', 'like', '%'.$this->search.'%');
                })
                ->paginate($this->data_length);
            
        }elseif($this->status_filter){
            // dd('ss');
            $contracts = UserContract::with('users')
                ->where('status', $this->status_filter)
                ->whereHas('users', function($query) {
                    $query->where('name', 'like', '%'.$this->search.'%');
                })
                ->paginate(10);
        }else{
            $contracts = UserContract::select('user_contracts.*')
                    ->join('users', 'user_contracts.user_id', '=', 'users.id') 
                    ->where('users.name', 'like', '%' . $this->search . '%')
                    ->paginate(10);
            
        }
        $this->data_length=0;
        $this->status_filter='';
        $users = User::get();
        return view('livewire.admin.users-contracts.users-contracts',compact('contracts','users'));
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
    public function resetForm()
    {
        $this->contract_id = null;
        $this->userId = null;
        $this->type = null;
        $this->employmentSource = null;
        $this->startDate = null;
        $this->endDate = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate();
        UserContract::create([
            'user_id' => $this->userId,
            'type' => $this->type,
            'employment_source' => $this->employmentSource,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
        ]);

        $this->resetForm();
        session()->flash('message', 'تم الإضافة بنجاح');

        $this->closeCreateOredit();
    }

    public function edit($id)
    {
        $contract = UserContract::findOrFail($id);
        $this->contractId = $contract->id;
        $this->userId = $contract->user_id;
        $this->type = $contract->type;
        $this->employmentSource = $contract->employment_source;
        $this->startDate = $contract->start_date;
        $this->endDate = $contract->end_date;
        


        $this->isEdit = true;
        $this->isList = false;
        $this->isDeleted = false;
    }

    public function update()
    {
        $this->validate();
        $contract = UserContract::findOrFail($this->contractId);
        $contract->update([
            'user_id' => $this->userId,
            'type' => $this->type,
            'employment_source' => $this->employmentSource,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
        ]);

        $this->resetForm();
        session()->flash('message', 'Contract updated successfully.');
        $this->closeCreateOredit();
    }

    public function delete($id)
    {
        UserContract::findOrFail($id)->delete();
        session()->flash('message', 'Contract deleted successfully.');
    }
}
