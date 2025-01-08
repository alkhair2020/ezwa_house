
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
                    <h4 class="card-title" id="basic-layout-form">إضافة اجازة</h4>
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
                                <!-- <h4 class="form-section"><i class="ft-user"></i>  </h4> -->
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
                                            <label for="projectinput5"> النوع </label>
                                            <select id="projectinput5" wire:model="type" name="status" class="form-control">
                                                <option value="" selected="" >اختر النوع</option>
                                                <option value="Sick"  {{ $status == 'Sick' ? "selected" : "" }}>مرضية</option>
                                                <option value="Annual"  {{ $status == 'Annual' ? "selected" : "" }}>سنوية </option>
                                                <option value="Emergency" {{ $status == 'Emergency' ? "selected" : "" }}> طارئة </option>
                                                <option value="Unpaid" {{ $status == 'Unpaid' ? "selected" : "" }}> غير مدفوعة </option>
                                            </select>
                                            @error('deductions')<span  class="error-message">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1"> تاريخ البداية </label>
                                            <input type="date" wire:model="start_date" class="form-control" placeholder=" تاريخ البداية"  >
                                            @error('start_date')<span  class="error-message">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1"> تاريخ النهاية </label>
                                            <input type="date" wire:model="end_date" class="form-control" placeholder="تاريخ النهاية"  >
                                            @error('end_date')<span  class="error-message">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1"> الخصومات</label>
                                            <textarea wire:model="reason" class="form-control" placeholder="السبب"></textarea>
                                            @error('deductions')<span  class="error-message">{{ $message }}</span>@enderror
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