<section id="basic-form-layouts">
    <div class="content-header row">
        <div class="col-md-2"></div>
       
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if(session()->has('message'))
            @include('admin.includes.alerts.success')
        @endif
        
        <div class="col-md-2"></div>
    </div>
    <div class="row match-height">
        <div class="col-md-2">
            
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">وحدة جديدة</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                    
                    <form class="form"  enctype="multipart/form-data">
                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-user"></i> بيانات الوحدة</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput5">نوع الوحدة</label>
                                        <select id="typeId" name="type" wire:model="type" class="form-control">
                                            <option value="" selected="" disabled="">اختر نوع الوحدة</option>
                                            <option value="apartment">شقة</option>
                                            <!-- <option value="house">منزل</option> -->
                                            <option value="room">غرفة</option>
                                            <!-- <option value="basement">بدروم</option> -->
                                        </select>
                                        @error('type')<span id="typeError" wire:model="type" class="error-message">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput1">رقم الوحدة</label>
                                        <input type="number" name="number" wire:model="number" id="numberId" class="form-control" placeholder="اكتب رقم الوحدة"
                                        name="fname">
                                        @error('number')<span id="typeError" class="error-message">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput4">سعر اليوم</label>
                                        <input type="number" name="price_day" wire:model="price_day" id="price_dayId" class="form-control" placeholder="سعر اليوم" >
                                        @error('price_day')<span id="typeError" class="error-message">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput4">سعر الاسبوع</label>
                                        <input type="number" name="price_week" wire:model="price_week" id="price_weekId" class="form-control" placeholder="سعر الاسبوع" >
                                        @error('price_week')<span id="typeError" class="error-message">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput4">سعر الشهر</label>
                                        <input type="number" name="price_month" wire:model="price_month" id="price_monthId" class="form-control" placeholder="سعر الشهر" >
                                        @error('price_month')<span id="typeError" class="error-message">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput1">عدد الغرف</label>
                                        <input type="number" name="rooms" wire:model="rooms" id="roomsId" class="form-control" placeholder="اكتب عدد الغرف"
                                        name="fname">
                                        @error('rooms')<span id="typeError" class="error-message">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput4"> عدد الحمامات</label>
                                        <input type="number" name="baths" wire:model="baths" id="bathsId" class="form-control" placeholder=" عدد الحمامات" >
                                        @error('baths')<span id="typeError" class="error-message">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput4">عنوان الوحدة</label>
                                        <input type="text" name="address" wire:model="address" id="addressId" class="form-control" placeholder="عنوان العقار" >
                                        @error('address')<span id="typeError" class="error-message">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput5">حالة العقار</label>
                                        <select id="projectinput5" name="status" class="form-control">
                                            <option value="none" selected="" disabled="">اختر الحالة</option>
                                            <option value="rented">مؤجر</option>
                                            <option value="maintenance">صيانة </option>
                                            <option value="notclean"> غير نظيف </option>
                                            <option value="waiting"> إنتظار تسجيل الدخول </option>
                                            <option value="exit"> خروج اليوم </option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput4"> الرقم الضريبي </label>
                                        <input type="number" name="tax_number" wire:model="tax_number" id="tax_numberId" class="form-control" placeholder="الرقم الضريبي" >
                                        @error('tax_number')<span id="typeError" class="error-message">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput8">ملاحظات /وصف</label>
                                        <textarea id="descriptionId" rows="1" wire:model="description" class="form-control" name="description" placeholder="اكتب وصف عن العقار"></textarea>
                                        @error('description')<span id="typeError" class="error-message">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="button" class="btn btn-warning mr-1" wire:click="closeCreateOredit()">
                                <i class="ft-x"></i> Cancel
                            </button>
                            <input type="submit" class="btn btn-primary" wire:click.prevent="store()" value="حفظ" />
                               
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            
        </div>
    </div>

</section>



<style>
    .error-message {
        color: #cb4b4b;
    }
</style>