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
                    <h4 class="card-title" id="basic-layout-form">إضافة</h4>
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
                            <h4 class="form-section"><i class="ft-user"></i>  </h4>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="projectinput5"> الموظف </label>
                                        <select id="projectinput5 " wire:model="user_id" name="status" class="form-control select2">
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
                                        <label for="projectinput1">  التاريخ </label>
                                        <input type="date" name="date" id="projectinput1" class="form-control"
                                            placeholder="التاريخ" name="fname" wire:model="date" >
                                            @error('date')<span  class="error-message">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="projectinput5">حالة الموظف </label>
                                        <select id="projectinput5" wire:model="status" name="status" class="form-control">
                                            <option value="" selected="" >اختر الحالة</option>
                                            <option value="Present"  {{ $status == 'Present' ? "selected" : "" }}>حاضر</option>
                                            <option value="Absent"  {{ $status == 'Absent' ? "selected" : "" }}>غائب </option>
                                            <option value="Late" {{ $status == 'Late' ? "selected" : "" }}> متأخر </option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="projectinput1"> وقت تسجيل الدخول </label>
                                        <input type="time" name="date" id="projectinput1" class="form-control"
                                            placeholder=" وقت تسجيل الدخول " name="fname" wire:model="check_in" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="projectinput1"> وقت تسجيل الخروج  </label>
                                        <input type="time" name="date" id="projectinput1" class="form-control"
                                            placeholder="وقت تسجيل الخروج " name="fname" wire:model="check_out" >
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