<?php

namespace App\Http\Livewire\Admin\Properties;

use Livewire\Component;
use App\Property;
use Livewire\WithPagination;
class PropertyList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public  $type, $number, $price_day,$price_week,$price_month,$percentage,$rooms,$baths,$address,$status,$tax_number,$description, $property_id , $data_length;
    public $search = '';
    public $isCreate = 0;
    public $isEdit = 0;
    public $isList = 1;
    
    public function render()
    {
        if(!$this->data_length){
            $properties = Property::where('number', 'like', '%'.$this->search.'%')->paginate(10);
       }else{
           $properties = Property::where('number', 'like', '%'.$this->search.'%')->paginate($this->data_length);
       }
       return view('livewire.admin.properties.property-list', ['properties' => $properties]);
       
    }
   
    public function store()
    {
        $this->validateCreate();
       
        $add = new Property;
        $add->type    = $this->type;
        $add->number    = $this->number;
        $add->rooms    = $this->rooms;
        $add->baths    = $this->baths;
        $add->price_day    = $this->price_day;
        $add->price_week    = $this->price_week;
        $add->price_month    = $this->price_month;
        $add->address    = $this->address;
        $add->description    = $this->description;
        $add->tax_number    = $this->tax_number;
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
        $this->isList = false;
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
    public function gitIdForDelete(int $id)
    {
        $this->property_id = $id;
        $this->isDeleted =true;
    }

    public function delete()
    {
        Property::find($this->property_id)->delete();
       
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
        $this->property_id = '';
        $this->type = '';
        $this->number = '';
        $this->price_day = '';
        $this->price_week = '';
        $this->price_month = '';
        $this->percentage = '';
        $this->rooms = '';
        $this->baths = '';
        $this->address = '';
        $this->status = '';
        $this->tax_number = '';
        $this->description = '';
    }

    public function validateCreate()
    {
        $this->validate([
            'type'=>'required',
            'number'=>'required',
            'price_day'=>'required',
            'price_week'=>'required',
            'price_month'=>'required',
            // 'percentage'=>'required',
            'rooms'=>'required',
            'baths'=>'required',
            ],
            [
                'type.required'=>'يرجى ادخال نوع العقار',
                'number.required'=>'يجب ادخال رقم العقار',
                'price_day.required'=>'سعر اليوم مطلوب',
                'price_week.required'=>'سعر الاسبوع مطلوب',
                'price_month.required'=>'سعر الشهر مطلوب',
                // 'percentage.required'=>'عدد الغرف مطلوب',
                'rooms.required'=>'عدد الغرف مطلوب',
                'baths.required'=>'عدد دورات المياة مطلوب',
            ]
            // session()->flash('error', 'Form submitted error!');
        );
    }
}
