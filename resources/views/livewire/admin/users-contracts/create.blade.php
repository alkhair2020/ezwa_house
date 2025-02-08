
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
                    <h4 class="card-title" id="basic-layout-form">إضافة عقد</h4>
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput5"> الموظف </label>
                                            <select id="projectinput5 " wire:model="userId"  class="form-control select2">
                                                <option value="" selected="" >اختر الموظف</option>
                                                @foreach ($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')<span  class="error-message">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="contractType">نوع العقد</label>
                                            <input type="text" wire:model="type" id="contractType" class="form-control">
                                            @error('contractType') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="contractType">مصدر التوظيف</label>
                                            <input type="text" wire:model="employmentSource" id="contractType" class="form-control">
                                            @error('employmentSource') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1"> تاريخ البداية </label>
                                            <input type="date" wire:model="startDate" class="form-control" placeholder=" تاريخ البداية"  >
                                            @error('startDate')<span  class="error-message">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1"> تاريخ النهاية </label>
                                            <input type="date" wire:model="endDate" class="form-control" placeholder="تاريخ النهاية"  >
                                            @error('endDate')<span  class="error-message">{{ $message }}</span>@enderror
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