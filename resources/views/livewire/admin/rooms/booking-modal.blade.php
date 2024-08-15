<!-- booking Modal -->
<div wire:ignore.self class="modal fade " id="booking_room" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-middle " role="document" >
        <div class="modal-content {{ $isClient ? 'inactive shadow' : '' }}">
            <div class="modal-header">
                <h5 class="modal-title">إضافة حجز 
                    
                        {{$total}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('store-room')}}" method="POST" 
                    name="le_form"  enctype="multipart/form-data">
                    @csrf
                    <div class="row m-01 p-05" style="    border: 1px solid #e7e5e5;">
                        <div class="col-md-12 head-title" > 
                            <h5 class="p-05"> فترة الحجز </h5>
                        </div>        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="projectinput5"> الإجار</label>
                                <select name="property_type" class="form-booking-control" id="property_typeId" disabled>
                                    <option value="daily" selected>يومي</option>
                                    <option value="monthly">شهري</option>
                                    <option value="weekly">اسبوعي</option>
                                </select>
                                <span id="property_typeError" class="error-message"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="issueinput3">من</label>
                                <input type="date" name="start_date" wire:model="start_date" id="start_dateId" class="form-booking-control"
                                    data-toggle="tooltip" data-trigger="hover" data-placement="top"
                                    data-title="تاريخ الدخول">
                                <span id="start_dateError" class="error-message"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="issueinput3">الى</label>
                                <input type="date" name="start_date" wire:model="end_date" id="start_dateId" class="form-booking-control"
                                    data-toggle="tooltip" data-trigger="hover" data-placement="top"
                                    data-title="تاريخ الخروج">
                                <span id="start_dateError" class="error-message"></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="projectinput5">الايام</label>
                            <input type="number" name="count_day" wire:model="count_day"  min="1"  id="count_dayId" class="form-booking-control" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                            <span id="count_dayError" class="error-message"></span>
                        </div>
                    </div>
                  
                    <div class="row m-01 p-05" style="    border: 1px solid #e7e5e5;">
                        <div class="col-md-12 head-title" > 
                            <h5 class="p-01">الشقة / العميل</h5>
                        </div>        
                        <div class="col-md-4">
                            <div class=" row">
                                <label class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">رقم الغرفة</label>
                                <label class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">204</label>
                            </div>
                            <div class=" row">
                                <label class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">السعر</label>
                                <label class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">280</label>
                            </div>
                            <div class=" row">
                                <label class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">سعر الذروة</label>
                                <label class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">--------</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class=" row">
                                <label class="col-md-3 col-sm-4 col-4 label-control" for="eventRegInput1">العميل</label>
                                <label class="col-md-3 col-sm-4 col-4 label-control" for="eventRegInput1">---------</label>
                                <div class="col-md-4 col-sm-4 col-4">
                                <!-- <a data-toggle="modal" href="#myModal2" class="btn btn-primary" wire:click="create()">Launch modallllf</a> -->
                                    <a data-backdrop="static" data-toggle="modal" data-target="#add_client" wire:click="addClient()">
                                        <i class="la la-plus-circle" style="color: #666EE8;font-size: 27px;"></i>
                                    </a>
                                </div>
                            </div>
                            <div class=" row">
                                <label class="col-md-3 col-sm-4 col-4 label-control" for="eventRegInput1">الشركة</label>
                                <label class="col-md-3 col-sm-4 col-4 label-control" for="eventRegInput1">---------</label>
                                <div class="col-md-4 col-sm-4 col-4">
                                    <a data-backdrop="false" data-toggle="modal" data-target="#Add_item" wire:click="create()">
                                        <i class="la la-plus-circle" style="color: #666EE8;font-size: 27px;"></i>
                                    </a>
                                </div>
                            </div>
                            <div class=" row ">
                                <label class="col-md-3 col-sm-4 col-4 label-control" for="eventRegInput1">المرافقون</label>
                                <input type="text" id="eventRegInput1" class="form-booking-control col-md-3 col-sm-4 col-4" placeholder="name" name="fullname">
                                <div class="col-md-4 col-sm-4 col-4 ">
                                    <a data-backdrop="false" data-toggle="modal" data-target="#Add_item" wire:click="create()">
                                        <i class="la la-plus-circle" style="color: #666EE8;font-size: 27px;"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- <div class="row mt-1">
                                <label class="col-md-3 col-sm-4 col-4 label-control" for="eventRegInput1">  سبب الزيارة</label>
                                <input type="text" id="eventRegInput1" class="form-booking-control col-md-3 col-sm-4 col-4" placeholder="name" name="fullname">
                            </div> -->
                        </div>
                    </div>
                    <div class="row m-01 p-05" style="    border: 1px solid #e7e5e5;">
                        <div class="col-md-12 head-title" > 
                            <h5 class="p-01">المالية</h5>
                        </div>        
                        <div class="col-md-5">
                            <div class="row m-03">
                                <label class="col-md-5 col-sm-5 col-4 label-control" for="eventRegInput1">المقبوضات</label>
                                <select name="property_type" class="form-booking-control col-md-7 col-sm-4 col-4l" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                                    <option value="daily" selected>يومي</option>
                                    <option value="monthly">شهري</option>
                                    <option value="weekly">اسبوعي</option>
                                </select>
                                <!-- <input type="number" name="count_day" wire:model="count_day"  min="1"  id="count_dayId" class="form-booking-control col-md-6 col-sm-4 col-4l" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام"> -->
                                <span id="count_dayError" class="error-message"></span>
                            </div>
                            <div class="row m-03">
                                <label class="col-md-5 col-sm-4 col-4 label-control" for="eventRegInput1">بدل إيجار</label>
                                <select name="property_type" class="form-booking-control col-md-7 col-sm-4 col-4l" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                                    <option value="daily" selected>يومي</option>
                                    <option value="monthly">شهري</option>
                                    <option value="weekly">اسبوعي</option>
                                </select>
                                <span id="count_dayError" class="error-message"></span>
                            </div>
                            <div class="row m-03">
                                <label class="col-md-5 col-sm-4 col-4 label-control" for="eventRegInput1"> الفواتير</label>
                                <select name="property_type" class="form-booking-control col-md-7 col-sm-4 col-4l" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                                    <option value="daily" selected>يومي</option>
                                    <option value="monthly">شهري</option>
                                    <option value="weekly">اسبوعي</option>
                                </select>
                                <span id="count_dayError" class="error-message"></span>
                            </div>
                            <div class="row m-03">
                                <label class="col-md-5 col-sm-4 col-4 label-control" for="eventRegInput1"> الخدمات</label>
                                <select name="property_type" class="form-booking-control col-md-7 col-sm-4 col-4l" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                                    <option value="daily" selected>يومي</option>
                                    <option value="monthly">شهري</option>
                                    <option value="weekly">اسبوعي</option>
                                </select>
                                <span id="count_dayError" class="error-message"></span>
                            </div>
                            <div class="row m-03">
                                <label class="col-md-5 col-sm-4 col-4 label-control" for="eventRegInput1"> الايجار اليومي</label>
                                <input type="number" name="count_day" wire:model="count_day"  min="1"  id="count_dayId" class="form-booking-control col-md-2 col-sm-4 col-4l" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                                <label class="col-md-2 col-sm-4 col-4 label-control" for="eventRegInput1">تغيير</label>
                                <span id="count_dayError" class="error-message"></span>
                            </div>
                            <div class="row m-03">
                                <label class="col-md-5 col-sm-4 col-4 label-control" for="eventRegInput1"> نوع الخصم</label>
                                <select name="property_type" class="form-booking-control col-md-7 col-sm-4 col-4l" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                                    <option value="daily" selected>يومي</option>
                                    <option value="monthly">شهري</option>
                                    <option value="weekly">اسبوعي</option>
                                </select>
                                <span id="count_dayError" class="error-message"></span>
                            </div>
                            <div class="row m-03">
                                <label class="col-md-5 col-sm-4 col-4 label-control" for="eventRegInput1"> مبلغ الخصم</label>
                                <input type="number" name="count_day" wire:model="count_day"  min="1"  id="count_dayId" class="form-booking-control col-md-2 col-sm-4 col-4l" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                                &nbsp;
                                <input type="number" name="count_day" wire:model="count_day"  min="1"  id="count_dayId" class="form-booking-control col-md-2 col-sm-4 col-4l" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                                <label class="col-md-2 col-sm-4 col-4 label-control" for="eventRegInput1">تغيير</label>
                                <span id="count_dayError" class="error-message"></span>
                            </div>
                            <div class="row m-03">
                                <label class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">الضرائب</label>
                                <label class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">21.23</label>
                            </div>
                            
                        </div>
                        <div class="col-md-2">
                            <div class="row mt-05">
                                <div class="col-md-1 col-sm-4 col-4">
                                    <a data-backdrop="false" data-toggle="modal" data-target="#Add_item" wire:click="create()">
                                        <i class="la la-plus-circle" style="color: #666EE8;font-size: 27px;"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row mt-05">
                                <div class="col-md-1 col-sm-4 col-4">
                                    <a data-backdrop="false" data-toggle="modal" data-target="#Add_item" wire:click="create()">
                                        <i class="la la-plus-circle" style="color: #666EE8;font-size: 27px;"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row mt-05">
                                <div class="col-md-1 col-sm-4 col-4">
                                    <a data-backdrop="false" data-toggle="modal" data-target="#Add_item" wire:click="create()">
                                        <i class="la la-plus-circle" style="color: #666EE8;font-size: 27px;"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row mt-05">
                                <div class="col-md-1 col-sm-4 col-4">
                                    <a data-backdrop="false" data-toggle="modal" data-target="#Add_item" wire:click="create()">
                                        <i class="la la-plus-circle" style="color: #666EE8;font-size: 27px;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-05">
                            <div class=" row">
                                <h5 class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1"> المقبوض</h5>
                                <label class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">0</label>
                            </div>
                            <div class=" row">
                                <h5 class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">بدل الإيجار</h5>
                                <label class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">0</label>
                            </div>
                            <div class=" row">
                                <h5 class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">التأمين</h5>
                                <label class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">0</label>
                            </div>
                            <div class=" row">
                                <h5 class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">التكلفة الكلية</h5>
                                <label class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">118.77</label>
                            </div>
                            <div class=" row">
                                <h5 class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">التكلفة بعد الخصم</h5>
                                <label class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">118.77</label>
                            </div>
                            <div class=" row">
                                <h5 class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">التكلفة النهائية</h5>
                                <label class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">118.77</label>
                            </div>
                            <div class=" row">
                                <h5 class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">الرصيد  </h5>
                                <label class="col-md-6 col-sm-4 col-4 label-control" for="eventRegInput1">{{$total}}</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-actions">
                    <button type="button" class="btn btn-warning mr-1 " wire:click="closeCreateOredit()" data-dismiss="modal">
                            <i class="ft-x"></i> قفل
                        </button>
                        <input type="submit" class="btn btn-primary" wire:click.prevent="store()" value="حفظ"  />
                    </div>
                    <!-- <button type="submit" class=" btn btn-primary float-right"> حفظ </button> -->
                </form>
            </div>
        </div>
    </div>
</div>
