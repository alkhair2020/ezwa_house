@extends('layout.admin_main')
@section('content')
<!-- Scroll - horizontal table -->
<!-- Multi-column ordering table -->
<section id="multi-column">
    <div class="content-header row">
        @if(session()->has('message'))
        <!-- <dive class="col-12">
                <div class="alert alert-success mb-2" role="alert">
                    <strong>Well done!</strong> You successfully read this important alertmessage.
                </div>
            </dive> -->
            @include('admin.includes.alerts.success')
        @endif
        
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="col-md-12 col-12">
            <div class="dropdown float-md-right">
                <a href="{{route('clients.create')}}" class="btn btn-primary float-right mb-2"> عقد جديد</a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">العملاء / العقود</h4>
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
                    <div class="card-body card-dashboard">
                        <table class="table table-striped table-bordered multi-ordering">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الموظف</th>
                                    <th>اسم العميل</th>
                                    <th> الهوية</th>
                                    <th> رقم الهاتف</th>
                                    <th>رقم العقار</th>
                                    <th>بداية العقد</th>
                                    <th>نهاية العقد</th>
                                    <th>السعر</th>
                                    <th>الخصم</th>
                                    <th>الاجمالي</th>
                                    <th>التأمين</th>
                                    <th>حالة العقد</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as  $key =>$client)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$client->users->name}}</td>
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->id_number}}</td>
                                    <?php 
                                        $phone="966".$client->phone;
                                        // $whatsappUrl = "https://api.whatsapp.com/send?phone={$phone}&text=ضيفنا الكريم نشعركم بموعد خروجكم وعند الرغبه في التجديد";
                                        $whatsappUrl = "https://api.whatsapp.com/send?phone={$phone}&text=ضيفنا الكريم نشعركم بموعد انتهاء العقد  الموافق
                                         ( $client->end_date)
                                         وفي حال  رغبتكم  بالتجديد الرجاء اشعارنا قبل تاريخ الخروج  بـــ24 ساعه";
                                    ?>
                                    <td><a href="{{$whatsappUrl}}" class="float" target="_blank">{{$client->phone}}</a></td>
                                    <td>{{$client->properties->number}}</td>
                                    <td>{{$client->start_date}}</td>
                                    <td>{{$client->end_date}}</td>
                                    <td>{{$client->property_price}}</td>
                                    <td>{{$client->discount}}</td>
                                    <td>{{$client->total}}</td>
                                    <td>
                                        @if($client->receipts)
                                            {{$client->receipts->amount}}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>
                                        @if($client->status==1)
                                            ساري
                                        @elseif($client->status==2)
                                            ساري(مجدد)   
                                        @else
                                        منتهي 
                                        @endif
                                    </td>


                                    <td>
                                        @can('client-print')
                                        <a class="btn btn-sm bg-success-light"
                                            href="{{ url('admin/clients/print', $client->id) }}">
                                            <button type="button" class="btn btn-icon btn-info mr-1"><i
                                                    class="la la-print"></i></button>
                                        </a>
                                        @endcan

                                        @can('receipt-print')
                                            @if($client->receipts)
                                                @if($client->status ==1)
                                                    <a class="btn btn-sm bg-success-light"
                                                        href="{{ url('admin/receipts/print', $client->receipts->id) }}">
                                                        <button type="button" class="btn btn-icon btn-secondary mr-1"> قبض</button>
                                                    </a>
                                                @else
                                                   <a class="btn btn-sm bg-success-light"href="#">
                                                        <button type="button" class="btn btn-icon btn-secondary mr-1"> قبض</button>
                                                    </a>
                                                @endif
                                            @else
                                                <a class="btn btn-sm bg-success-light" data-toggle="modal" data-catid="{{ $client->id }}"  data-target="#create_receipts">
                                                    <button type="button" class="btn btn-icon btn-secondary mr-1"> قبض</button>
                                                </a>
                                            @endif
                                        @endcan

                                        @can('client-renew')
                                            <a class="" data-toggle="modal"
                                                    data-catid="{{ $client->id }}" 
                                                    data-target="#client_renew">
                                                    <button type="button" class="btn btn-icon btn-primary">تجديد</button>
                                            </a>
                                        @endcan
                                        <a class="btn btn-sm bg-success-light"
                                            href="{{ url('admin/clients/receipt/form', $client->id) }}">
                                            <button type="button" class="btn btn-icon btn-info mr-1">نموذج</button>
                                        </a>
                                        @can('expense-print')
                                        @if($client->expenses)
                                        <a class="btn btn-sm bg-success-light"
                                            href="{{ url('admin/expenses/print', $client->expenses->id) }}">
                                            <button type="button" class="btn btn-icon btn-light mr-1">
                                               صرف
                                            </button>
                                        </a>
                                        @else
                                        <a class="btn btn-sm bg-success-light" data-toggle="modal"
                                            data-catid="{{ $client->id }}" data-insuranceid="{{ $client->receipts ? $client->receipts->amount : 0 }}"
                                            data-target="#create_expenses">
                                            <!-- <a  class="btn btn-sm bg-success-light" href="{{ url('admin/clients/receipts', $client->id) }}"> -->
                                            <button type="button" class="btn btn-icon btn-light mr-1" style="background: #DADADA;">
                                                صرف
                                            </button>
                                        </a>
                                        @endif
                                        @endcan
                                        <!-- <a  class="btn btn-sm bg-success-light"
                                            href="{{ url('admin/clients/expenses', $client->id) }}">
                                            <button type="button" class="btn btn-icon btn-light mr-1"><i class="la la-plug"></i></button>
                                        </a> -->
                                        @can('client-edit')
                                        <a class="btn btn-sm bg-success-light"
                                            href="{{ route('clients.edit', $client->id) }}">
                                            <button type="button" class="btn btn-icon btn-success mr-1"><i
                                                    class="la la-edit"></i></button>
                                        </a>
                                        @endcan
                                        @can('client-delete')
                                        <a data-toggle="modal" data-catid="{{ $client->id }}"  data-target="#delete"
                                            class="delete-course">
                                            <button type="button" class="btn btn-icon btn-danger mr-1"><i
                                                    class="la la-trash"></i></button>
                                        </a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="create_expenses" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">اضافة سند صرف</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('expenses.store')}}" method="POST" name="le_form"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="client_id" id="cat_id">
                        <div class="row form-row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label> المبلغ</label>
                                    <input type="text" name="amount" class="form-control" id="amount_id">
                                    <!-- <input type="hidden" name="insurance" id="insurance_id"> -->
                                    <span id="amountError" class="error-message"></span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>العامل المشيك على الغرفة</label>
                                    <input type="text" name="worker_checked" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>عامل النظافة </label>
                                    <input type="text" name="cleaner" class="form-control">
                                </div>
                            </div>
                           
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>ملاحظة </label>
                                    <input type="text" name="notes" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <h5>
                                    <strong>كارت الباب</strong>
                                    <span class="required">*</span>
                                    </h5>
                                    <div class="controls">
                                        <div class="skin skin-square">
                                            <input type="radio" value="1" name="status_door_card" required id="radio1">
                                            <label for="radio1">استلمت</label>
                                        </div>
                                        <div class="skin skin-square">
                                            <input type="radio" value="0" name="status_door_card" id="radio2">
                                            <label for="radio2">لم استلم</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"
                            onclick="return Validateallinput()">حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="create_receipts" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">اضافة تأمين</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('receipts.store')}}" method="POST" name="le_form"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="client_id" id="cat_id">
                        <div class="row form-row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label> المبلغ</label>
                                    <input type="text" name="amount" class="form-control" id="amount_id">
                                    <!-- <input type="hidden" name="insurance" id="insurance_id"> -->
                                    <span id="amountError" class="error-message"></span>
                                </div>
                            </div>
                            
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"
                            >حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="client_renew" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تجديد العقد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('client.renew')}}" method="POST" name="le_form"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="client_id" id="cat_id">
                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput5">نوع الإجار</label>
                                    <select name="property_type" class="form-control" id="property_typeId">
                                        <option value="" selected="" disabled="">اختر نوع الإجار</option>
                                        <option value="monthly">شهري</option>
                                        <option value="weekly">اسبوعي</option>
                                        <option value="daily">يومي</option>
                                    </select>
                                    <span id="property_typeError" class="error-message"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput5">عدد (كم يوم  / كم اسبوع / كم شهر ) </label>
                                    <input type="number" name="count_day" id="count_dayId" class="form-control"
                                        data-toggle="tooltip" data-trigger="hover" data-placement="top"
                                        data-title="Date Fixed">
                                    <span id="count_dayError" class="error-message"></span>
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="issueinput3">بداية تاريخ العقد</label>
                                    <input type="date" name="start_date" id="start_dateId" class="form-control"
                                        data-toggle="tooltip" data-trigger="hover" data-placement="top"
                                        data-title="Date Opened">
                                    <span id="start_dateError" class="error-message"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="issueinput3">بداية الوقت للعقد</label>
                                    <input type="time" name="time" id="timeId" class="form-control"
                                        data-toggle="tooltip" data-trigger="hover" data-placement="top"
                                        data-title="Date Opened">
                                    <span id="timeError" class="error-message"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput5">طريقة الدفع</label>
                                    <select name="payment_way" class="form-control" id="payment_wayId">
                                        <option value="" selected="" disabled="">اختر طريقة الدفع</option>
                                        <option value="bank transfer">تحويل بنكي</option>
                                        <option value="network">شبكة</option>
                                        <option value="cash">نقدي</option>
                                    </select>
                                    <span id="payment_wayError" class="error-message"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1">الخصم</label>
                                    <input type="number" name="discount" id="discountId" class="form-control" 
                                        placeholder="الخصم" name="fname">
                                    <span id="discountError" class="error-message"></span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"
                            onclick="return ValidateRenew()">حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <div class="modal fade" id="delete" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2">
                        <h4 class="modal-title">حذف</h4>
                        <p class="mb-4">هل انت متأكد من حذف هذا العنصر ؟</p>
                        <div class="row text-center">
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-2">
                                <form method="post" action="{{route('clients.destroy','test')}}">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" id="cat_id">
                                    <button type="submit" class="btn btn-danger ">حذف </button>
                                </form>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">إلغاء</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('js/app.js')}}"></script>
<script>
    $('#create_receipts').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)

        var cat_id = button.data('catid')
        var modal = $(this)
        modal.find('.modal-body #cat_id').val(cat_id);
    })
    $('#client_renew').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)

        var cat_id = button.data('catid')
        var modal = $(this)
        modal.find('.modal-body #cat_id').val(cat_id);
    })
    $('#create_expenses').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)

        var cat_id = button.data('catid')
        var insuranceid = button.data('insuranceid')
        var modal = $(this)
        modal.find('.modal-body #cat_id').val(cat_id);
        modal.find('.modal-body #insurance_id').val(insuranceid);
    })

    $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var cat_id = button.data('catid')
        var modal = $(this)
        modal.find('.modal-body #cat_id').val(cat_id);
    })
</script>

<script>
    function ValidateRenew() {
        var count_dayId = document.getElementById("count_dayId");
        var count_dayError = document.getElementById("count_dayError");

        var start_dateId = document.getElementById("start_dateId");
        var start_dateError = document.getElementById("start_dateError");

        var timeId = document.getElementById("timeId");
        var timeIdError = document.getElementById("timeError");

        var property_typeId = document.getElementById("property_typeId");
        var property_typeError = document.getElementById("property_typeError");

        var payment_wayId = document.getElementById("payment_wayId");
        var payment_wayError = document.getElementById("payment_wayError");
        if (property_typeId.value == "") {
            property_typeError.innerHTML = "اختر نوع الايجار";
            return false;
        }
        property_typeError.innerHTML = "";

        if (count_dayId.value == "") {
            count_dayError.innerHTML = "اكتب العدد";
            return false;
        }
        count_dayError.innerHTML = "";
        
        if (property_typeId.value == "monthly") {
            if (count_dayId.value >12) {
                count_dayError.innerHTML = "نوع الايجار شهري لا يمكن كتابة اكثر من 12";
                return false;
            }
        }
        count_dayError.innerHTML = "";

        // var inputValue = Number(inputElement.value);
        if (property_typeId.value == "weekly") {
            if (count_dayId.value >4) {
                count_dayError.innerHTML = "نوع الايجار اسبوعي لا يمكن كتابة اكثر من 4";
                return false;
            }
        }
        count_dayError.innerHTML = "";

        if (property_typeId.value == "daily") {
            if (count_dayId.value >30) {
                count_dayError.innerHTML = "نوع الايجار يومي لا يمكن كتابة اكثر من 30";
                return false;
            }
        }
        count_dayError.innerHTML = "";

        if (start_dateId.value == "") {
            start_dateError.innerHTML = "حدد تاريخ بداية العقد";
            return false;
        }
        start_dateError.innerHTML = "";

        if (timeId.value == "") {
            timeError.innerHTML = "حدد وقت الدخول ومسائي ام صباحي";
            return false;
        }
        timeError.innerHTML = "";

        if (payment_wayId.value == "") {
            payment_wayError.innerHTML = "حدد  طريقة الدفع";
            return false;
        }
        payment_wayError.innerHTML = "";

    }
    function Validateallinput() {
        var amount_id = document.getElementById("amount_id");
        var amountError = document.getElementById("amountError");
        var insurance_id = document.getElementById("insurance_id");
        if (amount_id.value == "") {
            amountError.innerHTML = "اكتب المبلغ";
            return false;
        }
        amountError.innerHTML = "";
        if (amount_id.value > insurance_id.value) {
            amountError.innerHTML = "خطأ في المبلغ المصروف";
            return false;
        }
        amountError.innerHTML = "";
    }
</script>
<script>
    function redirectToWhatsApp(phone,date) {
        // Your phone number in international format
        var phoneNumber = "1234567890";
        // Pre-filled message
        
        var message = "مرحباً، أود ان احيطكم علماً انه سوف يتم انتهاء العقد ${phone} ، اذا كنتم ترغبون  تجديد العقد التوجه للاستقبال";
        // Encode the message to be URL-safe
        var encodedMessage = encodeURIComponent(message);
        // WhatsApp URL
        var whatsappUrl = "https://api.whatsapp.com/send?phone=" + phone + "&text=" + encodedMessage;
        // Redirect to WhatsApp
        window.location.href = whatsappUrl;
    }
</script>
<style>
    .btn-sm,
    .btn-group-sm>.btn {
        padding: 0.1rem 0.1rem !important;
    }

    .table th,
    .table td {
        padding: 0.75rem 1rem;
        text-align: center
    }
    .error-message {
        color: #cb4b4b;
    }
</style>

@endsection