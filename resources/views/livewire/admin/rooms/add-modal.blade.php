<!-- Add Modal -->





<div wire:ignore.self class="modal fade" id="Add_item" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-middle" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">اضافة غرفة   {{$isCreate}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="form-body col-md-6"  >
                            <div class="" style="    border: 1px solid #e7e5e5;">
                                <h4 class="m-05" style="border-right: 2px solid #1bc6fe !important;border-top: 2px solid #1bc6fe;    padding: 4px;">المعلومات الاساسية</h4>
                                <div class="row m-1">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">رقم الغرفة</label>
                                            <input type="number" name="number"  wire:model="number"  wire:model="number" id="numberId" class="form-control" placeholder="اكتب رقم الغرفة"
                                            name="fname">
                                            @error('number')<span id="typeError" class="error-message">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">الطابق</label>
                                            <input type="number" name="floor" wire:model="floor" id="numberId" class="form-control" placeholder="اكتب رقم الطابق"
                                            name="fname">
                                            <span id="numberError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">عدد الغرف</label>
                                            <input type="number" name="rooms"  wire:model="rooms"  id="roomsId" class="form-control" placeholder="اكتب عدد الغرف"
                                            name="fname">
                                            <span id="roomsError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4"> عدد دورات المياة</label>
                                            <input type="number" name="baths"  wire:model="baths"  id="bathsId" class="form-control" placeholder=" عدد الحمامات" >
                                            <span id="bathsError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">عدد الأسٍرة المفردة</label>
                                            <input type="number" name="num_single_bed"  wire:model="num_single_bed"  id="bathsId" class="form-control" placeholder="عدد الأسٍرة المفردة" >
                                            <span id="bathsError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">عدد الأسٍرة المزدوجة</label>
                                            <input type="number" name="num_double_bed"  wire:model="num_double_bed"  id="bathsId" class="form-control" placeholder="عدد الأسٍرة المزدوجة" >
                                            <span id="bathsError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">عدد الخزائن</label>
                                            <input type="number" name="num_locker"  wire:model="num_locker"  id="bathsId" class="form-control" placeholder="عدد الخزائن" >
                                            <span id="bathsError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">عدد التلفزيونات</label>
                                            <input type="number" name="num_TVs"  wire:model="num_TVs"  id="bathsId" class="form-control" placeholder="عدد التلفزيونات" >
                                            <span id="bathsError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">نوع المكيف</label>
                                            <input type="number" name="conditioner_type"  wire:model="conditioner_type"  id="bathsId" class="form-control" placeholder="نوع المكيف" >
                                            <span id="bathsError" class="error-message"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">نوع الغرفة</label>
                                            <input type="number" name="price_id"  wire:model="price_id"  id="bathsId" class="form-control" placeholder="" >
                                            <span id="bathsError" class="error-message"></span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-body col-md-6">
                            <div class="" style="    border: 1px solid #e7e5e5;">
                            <h4 class="m-1" style="border-right: 2px solid #1bc6fe !important;border-top: 2px solid #1bc6fe;    padding: 4px;"> المميزات العامة</h4>
                                <div class="row m-05">
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="internet"  wire:model="internet"  id="radio1">
                                                    <label for="radio1"> انترنت</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="parking"  wire:model="parking"  id="radio1">
                                                    <label for="radio1">مواقف سيارات</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="elevator"  wire:model="elevator"  id="radio1">
                                                    <label for=""> مصعد</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="cleaning_rooms"  wire:model="cleaning_rooms"  id="radio1">
                                                    <label for=""> تنظيف غرف</label>
                                                </div>
                                    </div>
                                    
                                </div>
                            </div><br>
                            <div class="" style="    border: 1px solid #e7e5e5;">
                            <h4 class="m-1" style="border-right: 2px solid #1bc6fe !important;border-top: 2px solid #1bc6fe;    padding: 4px;"> المميزات الخاصة</h4>
                                <div class="row m-05">
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="telephone_directory"  wire:model="telephone_directory"  id="radio1">
                                                    <label for="radio1">دليل الهاتف</label>
                                                </div>
                                       
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="oven"  wire:model="oven"  id="radio1">
                                                    <label for="radio1">فرن</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="newspaper"  wire:model="newspaper"  id="radio1">
                                                    <label for="radio1">الصحيفة</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="microwave"  wire:model="microwave"  id="radio1">
                                                    <label for="radio1">مايكرويف</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="qibla"  wire:model="qibla"  id="radio1">
                                                    <label for="radio1">تحديد القبلة</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="washing_machine"  wire:model="washing_machine"  id="radio1">
                                                    <label for="radio1">غسالة</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="list_restaurant"  wire:model="list_restaurant"  id="radio1">
                                                    <label for="radio1">قائمة المطاعم</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="iron"  wire:model="iron"  id="radio1">
                                                    <label for="radio1"> مكواة</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="fridge"  wire:model="fridge"  id="radio1">
                                                    <label for="radio1"> ثلاجة</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="dining_table"  wire:model="dining_table"  id="radio1">
                                                    <label for="radio1"> طاولة طعام</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="lounge"  wire:model="lounge"  id="radio1">
                                                    <label for="radio1"> صالة</label>
                                                </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                                <div class="skin skin-square">
                                                    <input type="checkbox" value="1" name="kitchen"  wire:model="kitchen"  id="radio1">
                                                    <label for="radio1"> مطبخ</label>
                                                </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="" style="    border: 1px solid #e7e5e5;">
                                <h4 class=" m-05" style="border-right: 2px solid #1bc6fe !important;border-top: 2px solid #1bc6fe;    padding: 4px;">ملاحظات</h4>
                                <div class="row m-1 ">
                                    <div class="col-md-12">
                                        <textarea id="descriptionId" rows="1" class="form-control" name="description"  wire:model="description"  placeholder=""></textarea>
                                        <span id="descriptionError" class="error-message"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
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



