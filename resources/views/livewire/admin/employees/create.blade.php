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
                                            <label for="projectinput1">  الاسم </label>
                                            <input type="text" name="name" id="projectinput1" class="form-control" placeholder="الاسم" name="name" wire:model="name" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1">  اليريد الالكتروني </label>
                                            <input type="text" name="email" id="projectinput1" class="form-control" placeholder=" اليريد الالكتروني " name="fname" wire:model="email" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1"> كلمة المرور </label>
                                            <input type="text" name="password" id="projectinput1" class="form-control" placeholder=" كلمة المرور " name="fname" wire:model="password" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1"> رقم الجوال </label>
                                            <input type="text" name="phone" id="projectinput1" class="form-control"
                                                placeholder=" رقم الجوال " name="fname" wire:model="phone" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1"> العنوان </label>
                                            <input type="text" name="address" id="projectinput1" class="form-control"
                                                placeholder=" العنوان " name="fname" wire:model="address" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1"> الجنسية </label>
                                            <input type="text" name="nationality" id="projectinput1" class="form-control"
                                                placeholder=" الجنسية " name="fname" wire:model="nationality" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1"> الحالة الاجتماعية </label>
                                            <input type="text" name="date" id="projectinput1" class="form-control"
                                                placeholder="  الحالة الاجتماعية  " name="fname" wire:model="marital_status" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1"> المؤهل العلمي </label>
                                            <input type="text" name="date" id="projectinput1" class="form-control"
                                                placeholder=" المؤهل العلمي " name="fname" wire:model="qualification" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1"> نوع الهوية </label>
                                            <!-- <input type="text" name="date" id="projectinput1" class="form-control"
                                                placeholder="  نوع الهوية  " name="fname" wire:model="document_type" > -->
                                                <select name="document_type" class="form-control" id="typeId">
                                                    <option value="" selected="" disabled="">اختر نوع الهوية</option>
                                                    <option value="national identity" {{ $document_type == 'national identity' ? "selected" : "" }}>هوية وطنية</option>
                                                    <option value="accommodation" {{ $document_type == 'accommodation' ? "selected" : "" }}>إقامة</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1"> رقم الهوية </label>
                                            <input type="number"  id="projectinput1" class="form-control"
                                                placeholder=" رقم الهوية  " name="fname" wire:model="identity_number" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1"> تاريخ الإصدار  </label>
                                            <input type="date" name="date" id="projectinput1" class="form-control"
                                                placeholder="  تاريخ الإصدار  " name="fname" wire:model="document_issue_date" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput1"> تاريخ الانتهاء </label>
                                            <input type="date" name="date" id="projectinput1" class="form-control"
                                                placeholder=" تاريخ الانتهاء  " name="fname" wire:model="document_expiry" >
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