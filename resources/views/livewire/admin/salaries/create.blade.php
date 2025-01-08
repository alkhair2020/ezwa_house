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
                    <h4 class="card-title" id="basic-layout-form"> إضافة مرتب</h4>
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
                                <!-- <h4 class="form-section"><i class="ft-user"></i> بيانات الوحدة</h4> -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput5"> الموظف </label>
                                            <select id="projectinput5 " wire:model="user_id"  class="form-control select2">
                                                <option value="" selected="" >اختر الموظف</option>
                                                @foreach ($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')<span  class="error-message">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1">  الراتب الأساسي </label>
                                            <input type="number" wire:model="base_salary" class="form-control" placeholder="الراتب الأساسي"  >
                                            @error('base_salary')<span  class="error-message">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1"> المكافآت </label>
                                            <input type="number" wire:model="bonuses" class="form-control" placeholder="المكافآت"  >
                                            @error('bonuses')<span  class="error-message">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1"> الخصومات</label>
                                            <input type="number" wire:model="deductions" class="form-control" placeholder="الخصومات">
                                            @error('deductions')<span  class="error-message">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput5"> الشهر </label>
                                            <select id="projectinput5 " wire:model="month" class="form-control select2">
                                                <option value="" selected="" >اختر الشهر</option>
                                                @foreach (range(1, 12) as $m)
                                                <option value="{{ sprintf('%02d', $m) }}">{{ date('F', mktime(0, 0, 0, $m, 10)) }}</option>
                                                @endforeach
                                            </select>
                                            @error('month')<span  class="error-message">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1"> تاريخ الدفع</label>
                                            <input type="date" wire:model="payment_date" class="form-control" placeholder="تاريخ الدفع">
                                            @error('payment_date')<span  class="error-message">{{ $message }}</span>@enderror
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