<div wire:ignore.self class="modal fade" id="add_client" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-client" role="document" >
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title">اضافة غرفة   </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
            <div class="modal-body">
                <form style="border: 1px solid #e7e5e5;">
                    <div class="row m-01 p-05" style="    border: 1px solid #e7e5e5;">
                        <div class="col-md-12 head-title" > 
                            <h5 class="p-05">بيانات العميل</h5>
                        </div> 
                    </div>
                    <div class="row col-md-12 pt-1" style="">
                        <div class="col-md-2">
                            <label  for="projectinput1">الاسم بالكامل</label>
                        </div>
                        <div class="row col-md-10 " style="margin-left: 0px;margin-right: 0px;">
                            <div class="col-md-3 col-sm-4">
                                <input type="text"  class="form-booking-control" placeholder="الإسم الاول" name="lname">
                            </div>
                            <div class="col-md-3  col-4">
                                <input type="text" class="form-booking-control" placeholder="الإسم الثاني" name="lname">
                            </div>
                            <div class=" col-md-3 col-4">
                                <input type="text" class="form-booking-control" placeholder="الإسم الأوسط" name="lname">
                            </div>
                            <div class=" col-md-3 col-4">
                                <input type="text" class="form-booking-control" placeholder="الإسم الأخير" name="lname">
                            </div>
                        </div>
                    </div> 


                    <div class="row  p-05" style="">
                        <div class="col-md-6">
                            <div class="row m-03">
                                <label class="col-md-4 col-sm-5 col-4 " for="eventRegInput1">نوع العميل</label>
                                <select name="property_type" class="form-client-control col-md-8 col-sm-4 col-4" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                                    <option value="" selected>اختر</option>
                                    <option value="monthly">شهري</option>
                                    <option value="weekly">اسبوعي</option>
                                </select>
                                <span id="count_dayError" class="error-message"></span>
                            </div>
                            <div class="row m-03">
                                <label class="col-md-4 col-sm-4 col-4" for="eventRegInput1">نوع الإثبات</label>
                                <select name="property_type" class="form-client-control col-md-8 col-sm-4 col-4" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                                    <option value="" selected>اختر</option>
                                    <option value="monthly">شهري</option>
                                    <option value="weekly">اسبوعي</option>
                                </select>
                                <span id="count_dayError" class="error-message"></span>
                            </div>
                            <div class="row m-03">
                                <label class="col-md-4 col-sm-4 col-4 " for="eventRegInput1"> مكان الإصدار</label>
                                <input type="text" class="form-client-control col-md-8 col-sm-4 col-4" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                                <span id="count_dayError" class="error-message"></span>
                            </div>
                            <div class="row m-03">
                                <label class="col-md-4 col-sm-4 col-4 label-control" for="eventRegInput1"> تاريخ الميلاد</label>
                                <input type="date" class="form-client-control col-md-4 col-sm-4 col-4" placeholder="ميلادي" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="ميلادي">
                                
                                <input type="date" class="form-client-control col-md-4 col-sm-4 col-4"  placeholder="هجري" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="هجري">
                                <span id="count_dayError" class="error-message"></span>
                            </div>
                            <div class="row m-03">
                                <label class="col-md-4 col-sm-4 col-4 label-control" for="eventRegInput1"> الجنس</label>
                                <select name="property_type" class="form-client-control col-md-8 col-sm-4 col-4" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                                    <option value="" selected>--اختر--</option>
                                    <option value="monthly">شهري</option>
                                    <option value="weekly">اسبوعي</option>
                                </select>
                                <span id="count_dayError" class="error-message"></span>
                            </div>
                            <div class="row m-03">
                                <label class="col-md-4 col-sm-4 col-4 label-control" for="eventRegInput1">مكان العمل</label>
                                <input type="text" class="form-client-control col-md-8 col-sm-4 col-4" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                                <span id="count_dayError" class="error-message"></span>
                            </div>
                            <div class="row m-03">
                                <label class="col-md-4 col-sm-4 col-4 label-control" for="eventRegInput1">التصنيف</label>
                                <select name="property_type" class="form-client-control col-md-8 col-sm-4 col-4" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                                    <option value="" selected>اختر</option>
                                    <option value="monthly">شهري</option>
                                    <option value="weekly">اسبوعي</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="row m-03">
                                <label class="col-md-4 col-sm-5 col-4 " for="eventRegInput1">الجنسية</label>
                                <select name="property_type" class="form-client-control col-md-6 col-sm-4 col-4" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                                    <option value="" selected>اختر</option>
                                    <option value="monthly">شهري</option>
                                    <option value="weekly">اسبوعي</option>
                                </select>
                                <span id="count_dayError" class="error-message"></span>
                            </div>
                            <div class="row m-03">
                                <label class="col-md-4 col-sm-4 col-4" for="eventRegInput1">نسخة البطاقة</label>
                                <select name="property_type" class="form-client-control col-md-6 col-sm-4 col-4" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                                    <option value="" selected>اختر</option>
                                    <option value="monthly">شهري</option>
                                    <option value="weekly">اسبوعي</option>
                                </select>
                                <span id="count_dayError" class="error-message"></span>
                            </div>
                            <div class="row m-03">
                                <label class="col-md-4 col-sm-4 col-4 " for="eventRegInput1">تاريخ الانتهاء</label>
                                <input type="date" class="form-client-control col-md-6 col-sm-7 col-4" placeholder="ميلادي" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="ميلادي">
                                <span id="count_dayError" class="error-message"></span>
                            </div>
                            <div class="row m-03">
                                <label class="col-md-4 col-sm-4 col-4 label-control" for="eventRegInput1">رقم الجوال</label>
                                <input type="text" class="form-client-control col-md-3 col-sm-3 col-4" placeholder="" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="ميلادي">
                                <select name="property_type" class="form-client-control col-md-3 col-sm-4 col-4" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                                    <option value="" selected>--اختر--</option>
                                    <option value="monthly">شهري</option>
                                    <option value="weekly">اسبوعي</option>
                                </select>
                                <span id="count_dayError" class="error-message"></span>
                            </div>
                            <div class="row m-03">
                                <label class="col-md-4 col-sm-4 col-4 label-control" for="eventRegInput1">هاتف العمل</label>
                                <input type="text" class="form-client-control col-md-6 col-sm-4 col-4" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                                <span id="count_dayError" class="error-message"></span>
                            </div>
                            <div class="row m-03">
                                <label class="col-md-4 col-sm-4 col-4 label-control" for="eventRegInput1">البريد الالكتروني</label>
                                <input type="text" class="form-client-control col-md-6 col-sm-4 col-4" data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام">
                                <span id="count_dayError" class="error-message"></span>
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="row p-05">
                        <div class="col-md-2 ">
                            <label  for="projectinput1 ">ملاحظات</label>
                        </div>
                        <div class="col-md-9">
                            <textarea rows="1" class="form-control " data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام"></textarea>
                            <span id="count_dayError" class="error-message"></span>
                        </div>
                    </div>
                    <div class="row p-05">
                        <div class="col-md-2">
                            <label  for="projectinput1">ملاحظات خاصة</label>
                        </div>
                        <div class="col-md-9">
                            <textarea rows="1" class="form-control " data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام"></textarea>
                            <span id="count_dayError" class="error-message"></span>
                        </div>
                    </div>
                    <div class="row p-05">
                        <div class="col-md-2">
                            <label  for="projectinput1">ملاحظات</label>
                        </div>
                        <div class="col-md-9">
                            <textarea rows="1" class="form-control " data-toggle="tooltip" data-trigger="hover" data-placement="top"data-title="عدد الايام"></textarea>
                            <span id="count_dayError" class="error-message"></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-warning mr-1" wire:click="closeCreateOredit()" data-dismiss="modal">
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


<!-- 
<div  wire:ignore.self class="modal fade" id="myModal">
    <div class="modal-dialog modal-middle">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Modal 1</h4>
            </div>
            <div class="modal-body">
                <a data-toggle="modal" href="#myModal2" class="btn btn-primary" wire:click="create()">Launch modallllf</a>
            </div>
            <div class="modal-footer">	<a href="#" data-dismiss="modal" class="btn">Close</a>
	            <a href="#" class="btn btn-primary">Save changes</a>
            </div>
        </div>
    </div>
</div>
<div wire:ignore.self class="modal fade rotate" id="add_clienttt">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Modal 2</h4>
            </div>
            <div class="modal-body">
                <br><a data-toggle="modal" href="#myModal3" class="btn btn-primary">Launch modal</a>
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn">Close</a>
                <a href="#" class="btn btn-primary">Save changes</a>
            </div>
        </div>
    </div>
</div> -->