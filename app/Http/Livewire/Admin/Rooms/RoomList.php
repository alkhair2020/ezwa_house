<?php

namespace App\Http\Livewire\Admin\Rooms;

use Livewire\Component;
use App\Property;
use App\Price;
use Livewire\WithPagination;
use Illuminate\Support\Carbon as Carbon;
class RoomList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public  $type, $number,$rooms,$baths,$floor,$num_single_bed,$num_double_bed,$num_locker,$num_TVs,$conditioner_type,$price_id,$internet,$parking,$elevator,$cleaning_rooms,$telephone_directory,$newspaper,
            $qibla,$list_restaurant,$fridge,$lounge,$oven,$microwave,$washing_machine,$iron,$dining_table,$kitchen,$description,$status, $property_id , $data_length;
    public $search = '';
    public $isCreate = 0;
    public $isEdit = 0;
    public $isClient=0;

    public $start_date;
    public $end_date;
    Public $count_day=1;
    public $total =0;
    public $price=0;
    
    

    public function render()
    {
        
        if(!$this->data_length){
            $properties = Property::where('type',"room")->where('number', 'like', '%'.$this->search.'%')->paginate(10);
        }else{
           $properties = Property::where('type',"room")->where('number', 'like', '%'.$this->search.'%')->paginate($this->data_length);
        }
       return view('livewire.admin.rooms.room-list', ['properties' => $properties]);
    }
    public function mount()
    {
        $this->start_date=Carbon::now()->format('Y-m-d');
        $this->end_date=Carbon::tomorrow()->format('Y-m-d');

    }
    public function store()
    {
        $this->validateCreate();
        $add = new Property;
        $add->type    = $this->type;
        
        $add->type    ='room';
        $add->number    = $this->number;
        $add->rooms    = $this->rooms;
        $add->baths    = $this->baths;
        $add->floor    = $this->floor;
        $add->num_single_bed    = $this->num_single_bed;
        $add->num_double_bed    = $this->num_double_bed;
        $add->num_locker    = $this->num_locker;
        $add->num_TVs    = $this->num_TVs;
        $add->conditioner_type    = $this->conditioner_type;
        $add->price_id     = $this->price_id;
        $add->internet    = $this->internet;
        $add->parking    = $this->parking;
        $add->elevator    = $this->elevator;
        $add->cleaning_rooms    = $this->cleaning_rooms;
        $add->telephone_directory    = $this->telephone_directory;
        $add->newspaper    = $this->newspaper;
        $add->qibla    = $this->qibla;
        $add->list_restaurant    = $this->list_restaurant;
        $add->fridge    = $this->fridge;
        $add->lounge    = $this->lounge;
        $add->oven    = $this->oven;
        $add->microwave    = $this->microwave;
        $add->washing_machine    = $this->washing_machine;
        $add->iron    = $this->iron;
        $add->dining_table    = $this->dining_table;
        $add->kitchen    = $this->kitchen;
        $add->description    = $this->description;

        $add->save();
        session()->flash('message', 'تم الإضافة بنجاح');
        // session()->flash('message', $this->product_id ? 'Product Updated Successfully.' : 'Product Created Successfully.');

        $this->closeCreateOredit();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        
        $property = Property::findOrFail($id);
        $this->property_id = $id;
        $this->type = $property->type;
        $this->number = $property->number;
        $this->price_day = $property->price_day;
        $this->price_week = $property->price_week;
        $this->price_month = $property->price_month;
        $this->percentage = $property->percentage;
        $this->rooms = $property->rooms;
        $this->baths = $property->baths;
        $this->address = $property->address;
        $this->status = $property->status;
        $this->tax_number = $property->tax_number;
        $this->description = $property->description;


        $this->isEdit = true;
        $this->isDeleted = false;
    }

    public function update()
    {
        $edit = Property::findOrFail($this->property_id);
        if(isset($this->type)){
            $edit->type    = $this->type;
        }
        if(isset($this->number)){
            $edit->number    = $this->number;
        }
        if(isset($this->rooms)){
            $edit->rooms    = $this->rooms;
        }
        if(isset($this->baths)){
            $edit->baths    = $this->baths;
        }
        if(isset($this->price_day)){
            $edit->price_day    = $this->price_day;
        }
        if(isset($this->price_week)){
            $edit->price_week    = $this->price_week;
        }
        if(isset($this->price_month)){
            $edit->price_month    = $this->price_month;
        }
        
        if(isset($this->percentage)){
            $edit->percentage    = $this->percentage;
        }
        if(isset($this->address)){
            $edit->address    = $this->address;
        }
        if(isset($this->description)){
            $edit->description    = $this->description;
        }
        if(isset($this->status)){
            $edit->status    = $this->status;
        }
        if(isset($this->tax_number)){
            $edit->tax_number    = $this->tax_number;
        }
        $edit->save();

        $this->closeCreateOredit();
        $this->resetInputFields();
        session()->flash('message', 'تم التعديل بنجاح');
    }
    
    public function addClient()
    {
        $this->isClient = true;
    }
    public function gitItemId(int $id)
    {
        $property = Property::findOrFail($id);
        $prices = Price::findOrFail($property->price_id);
        $this->price = $prices->price;
        $this->total = $prices->price;
        $this->property_id = $id;
        $this->isDeleted =true;
    }
    public function updatedCountDay($value)
    {
        
        $this->total = $this->price * $value;
        $today_date=Carbon::now()->format('Y-m-d');
        $today_time=Carbon::now()->format('h:i A');
        if($this->start_date==$today_date){
            // dd('sss');
            $now = Carbon::parse($this->start_date.''.$today_time); 
            // إذا دخل النزيل قبل الساعة 6 صباحًا، يغادر عند الساعة 12 ظهرًا في اليوم الثاني
            if ($now->hour < 6) {
                $endDate = $now->copy()->addDays($value - 1)->setTime(12, 0, 0);
                $this->end_date =$endDate->format('Y-m-d');
            }else{
                
                $endDate= $now->copy()->addDays($value)->setTime(12, 0, 0);
                // dd($endDate->format('Y-m-d'));
                $this->end_date =$endDate->format('Y-m-d');
            }
        }else{
            $now = Carbon::parse($this->start_date);
            $endDate = $now->copy()->addDays($value)->setTime(12, 0, 0);
            $this->end_date =$endDate->format('Y-m-d');
        }
    }
    public function updatedEndDate($value)
    {
        if($this->start_date==$this->end_date){
            $start = Carbon::parse($this->start_date);
            $end = Carbon::parse($this->end_date);
            $this->count_day =1;
            $this->total = $this->price * $this->count_day;
        }else{
            $start = Carbon::parse($this->start_date);
            $end = Carbon::parse($this->end_date);
            $this->count_day = $end->diffInDays($start);
            $this->total = $this->price * $this->count_day;
        }  
    }
    public function updatedStartDate($value)
    {
        $today_date=Carbon::now()->format('Y-m-d');
        $today_time=Carbon::now()->format('h:i A');
        // dd($today_time);
        if($this->start_date==$today_date){
            $now = Carbon::parse($this->start_date.''.$today_time); 
            if ($now->hour < 6) {
                $endDate = $now->copy()->addDays()->subDay(1)->setTime(12, 0, 0);
                $this->end_date =$endDate->format('Y-m-d');
            }else{
                $endDate= $now->copy()->addDays()->setTime(12, 0, 0);
                $this->end_date =$endDate->format('Y-m-d');
            }
        }else{
            $now = Carbon::parse($this->start_date);
            $endDate = $now->copy()->addDays()->setTime(12, 0, 0);
            $this->end_date =$endDate->format('Y-m-d');
        }
        $this->count_day =1;
        $this->total = $this->price * $this->count_day;
    }
    public function delete()
    {
        Property::find($this->property_id)->delete();
        session()->flash('message', 'تم الحذف بنجاح');
    }
    
    public function create()
    {
        $this->isCreate = true;
    }

    public function closeCreateOredit()
    {
        $this->isCreate = false;
        $this->isEdit = false;
    }
    private function resetInputFields()
    {
        $this->property_id = '';
        $this->type = '';
        $this->number = '';
        $this->rooms = '';
        $this->baths = '';
        $this->address = '';
        $this->status = '';
        $this->description = '';
    }

    public function validateCreate()
    {
        $this->validate([
            'number'=>'required',
            'rooms'=>'required',
            'baths'=>'required',
        ],
        [
            'number.required'=>'يجب ادخال رقم العقار',
            'rooms.required'=>'عدد الغرف مطلوب',
            'baths.required'=>'عدد دورات المياة مطلوب',
        ]
            // session()->flash('error', 'Form submitted error!');
        );
    }
}
