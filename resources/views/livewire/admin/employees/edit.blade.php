<section id="basic-form-layouts">
    <div class="content-header row">
        <div class="col-md-2"></div>
        @if (count($errors) > 0)
        <!-- <dive class="col-6">
                <div class="alert alert-danger">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>خطا</strong>
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            </dive> -->
        @include('admin.includes.alerts.error')
        @endif
        @if(session()->has('message'))
        <!-- <dive class="col-12">
                <div class="alert alert-success mb-2" role="alert">
                    <strong>Well done!</strong> You successfully read this important alertmessage.
                </div>
            </dive> -->
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
                    <h4 class="card-title" id="basic-layout-form">تعديل  </h4>
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

                        <form  wire:submit.prevent="update" enctype="multipart/form-data" class="form" name="le_form">
                            <div class="form-body">
                                <!-- <h4 class="form-section"><i class="ft-user"></i> بيانات الوحدة</h4> -->
                                <div class="row">
                                    <!-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput5"> الموظف </label>
                                            <select id="projectinput5" wire:model="status" name="status" class="form-control">
                                                <option value="" selected="" disabled="">اختر الموظف</option>
                                                @foreach ($users as $user)
                                                <option value="{{$user->id}}" {{ $user->id == $user_id ? "selected" : "" }}>{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1">  التاريخ </label>
                                            <input type="date" name="date" id="projectinput1" class="form-control"
                                                placeholder="التاريخ" name="fname" wire:model="date" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput5">حالة الموظف </label>
                                            <select id="projectinput5" wire:model="status" name="status" class="form-control">
                                                <option value="" selected="" disabled="">اختر الحالة</option>
                                                <option value="Present"  {{ $status == 'Present' ? "selected" : "" }}>حاضر</option>
                                                <option value="Absent"  {{ $status == 'Absent' ? "selected" : "" }}>غائب </option>
                                                <option value="Late" {{ $status == 'Late' ? "selected" : "" }}> متأخر </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1"> وقت تسجيل الدخول </label>
                                            <input type="text" name="date" id="projectinput1" class="form-control"
                                                placeholder=" وقت تسجيل الدخول " name="fname" wire:model="check_in" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1"> وقت تسجيل الخروج  </label>
                                            <input type="text" name="date" id="projectinput1" class="form-control"
                                                placeholder="وقت تسجيل الخروج " name="fname" wire:model="check_out" >
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                               
                                
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1" wire:click="closeCreateOredit()">
                                    <i class="ft-x"></i> Cancel
                                </button>
                                <input type="submit" class="btn btn-primary" value="حفظ" />

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