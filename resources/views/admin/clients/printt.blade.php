<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description"
    content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords"
    content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>نظام تأجير الشقق
  </title>
  <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
    rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->

  <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/vendors.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/app.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/custom-rtl.css')}}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/core/menu/menu-types/horizontal-menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/core/colors/palette-gradient.css')}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style-rtl.css')}}">
  <!-- END Custom CSS-->
  <!-- start datatables -->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/tables/datatable/datatables.min.css')}}">
  <!-- END datatables-->

  <!-- start color message-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/core/colors/palette-callout.css')}}">
  <!-- END color message-->

  <!-- END Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/pages/invoice.css')}}">
  <!-- END Page Level CSS-->

</head>

<body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover" data-menu="horizontal-menu"
  data-col="2-columns">
  <!-- fixed-top-->

  <div class="app-content container center-layout">
    <div class="content-wrapper">

      <div class="content-body">
        <section class="card">
          <div id="invoice-template" class="card-body">
            <div id="invoice-company-details" class="row ">
                <div class="col-md-5 col-sm-12  text-md-left">
                    <div class="media">
                    <img src="{{asset('img/ezwalogo.jpeg')}}" alt="company logo" class="img-fluid" width="220" style="    max-width: 100%;height: 90PX;" />
                    </div>
                </div>
                <div class="col-md-5 col-sm-12  ">
                    <u><h4>
                    نموذج استلام المستأجر للوحدة الإيجارية
                    </h4>
                    </u>
                </div>
            </div>
            <!-- <div id="invoice-company-details" class="row ">
                <div class="col-md-10 col-sm-12  text-md-left">
                    <div class="media">
                    <img src="{{asset('img/ezwalogo.jpeg')}}" alt="company logo" class="img-fluid" width="200" style="    max-width: 100%;height: 71PX;" />
                    </div>
                </div>
            </div> -->
            <br>
            <!-- /////////////////// -->
            <div id="" class="row">
              <div class="col-md-12 col-sm-12 ">
              <u><h4>بيانات العقد</h4></u>
              </div>
            </div>
            <div id="" class="row  ">
              <div class="col-md-2 col-sm-4 ">
              </div>
              <div class="col-md-4 col-sm-3 ">
                <p > رقم العقد : {{$clients->properties->number }} </p>
              </div>
              <div class="col-md-3 col-sm-3 ">
                <p > مبلغ التأمين : 
                  @if($clients->receipts)
                    {{$clients->receipts->amount}} 
                  @else
                    0
                  @endif
                </p>
              </div>
              <div class="col-md-3 col-sm-3 ">
                <p> تاريخ الاستلام : {{$clients->created_at->format('Y-m-d') }} م</p>
              </div>
            </div>
            <div id="" class="row">
              <div class="col-md-12 col-sm-12 ">
                  <u><h4>بيانات المستأجر</h4></u>
              </div>
            </div>
            <div id="" class="row  ">
              <div class="col-md-2 col-sm-4 ">
              </div>
              <div class="col-md-4 col-sm-4 ">
                <p > أسم المستأجر : {{$clients->name }} </p>
              </div>
              <div class="col-md-3 col-sm-3 ">
                <p > رقم الهوية \ الاقامة : {{$clients->id_number }} </p>
              </div>
            </div>
            <div id="" class="row">
              <div class="col-md-12 col-sm-12 ">
              <u><h4>بيانات المؤجر</h4></u>
              </div>
            </div>
            <div id="" class="row">
              <div class="col-md-2 col-sm-4 ">
              </div>
              <div class="col-md-4 col-sm-4 ">
                <p > أسم المنشأة : {{$clients->properties->number }} </p>
              </div>
              <div class="col-md-3 col-sm-3 ">
                <p > رقم المنشأة  : {{$clients->properties->number }} </p>
              </div>
            </div>
            <br>
            <div class="row ">
              <div class="col-md-12 col-sm-12 ">
              <u><h4>ملاحظات حالة الوحدة الإجارية عند الإستلام</h4></u>
              </div>
            </div>
            <br>
            <hr>
            <br>
            <hr>
            <br>
            <hr>
            <br>
            <hr>
            <br>
            <hr>
            <br>
            <hr>
            <!-- <div id="invoice-items-details" class="pt-2">
              <div class="row">
                <div class="table-responsive col-sm-12">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center col-sm-3">البند</th>
                        <th class="text-center col-sm-4">الحالة</th>
                        <th class="text-center">الملاحظة</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="">
                              دهانات الشقة والجدران
                            </td>
                            <td class="text-center">
                              <div class="d-flex justify-content-around align-items-center">
                                  <label>
                                      <input type="checkbox" > جيد
                                  </label>
                                  <label>
                                      <input type="checkbox" > مناسب
                                  </label>
                                  <label>
                                      <input type="checkbox" > غير مناسب
                                  </label>
                              </div>
                            </td>
                            <td class="text-center"></td>
                        </tr>
                        <tr>
                            <td class="">
                                الأرضيات
                            </td>
                            <td class="text-center">
                              <div class="d-flex justify-content-around align-items-center">
                                  <label>
                                      <input type="checkbox" > جيد
                                  </label>
                                  <label>
                                      <input type="checkbox" > مناسب
                                  </label>
                                  <label>
                                      <input type="checkbox" >  غير مناسب
                                  </label>
                              </div>
                            </td>
                            <td class="text-center"> </td>
                        </tr>
                        <tr>
                            <td class="">
                                 الحمامات والأطقم الصحية
                            </td>
                            <td class="text-center">
                              <div class="d-flex justify-content-around align-items-center">
                                  <label>
                                      <input type="checkbox" > جيد
                                  </label>
                                  <label>
                                      <input type="checkbox" > مناسب
                                  </label>
                                  <label>
                                      <input type="checkbox" >  غير مناسب
                                  </label>
                              </div>
                            </td>
                            <td class="text-center"> </td>
                        </tr>
                        <tr>
                            <td class="">
                                المطبخ وملاحقاته
                            </td>
                            <td class="text-center">
                              <div class="d-flex justify-content-around align-items-center">
                                  <label>
                                      <input type="checkbox" > جيد
                                  </label>
                                  <label>
                                      <input type="checkbox" > مناسب
                                  </label>
                                  <label>
                                      <input type="checkbox" >  غير مناسب
                                  </label>
                              </div>
                            </td>
                            <td class="text-center"> </td>
                        </tr>
                        <tr>
                            <td class="">
                                الغرف
                            </td>
                            <td class="text-center">
                              <div class="d-flex justify-content-around align-items-center">
                                  <label>
                                      <input type="checkbox" > جيد
                                  </label>
                                  <label>
                                      <input type="checkbox" > مناسب
                                  </label>
                                  <label>
                                      <input type="checkbox" >  غير مناسب
                                  </label>
                              </div>
                            </td>
                            <td class="text-center">  </td>
                        </tr>
                        <tr>
                            <td class="">
                              النوافذ
                            </td>
                            <td class="text-center">
                              <div class="d-flex justify-content-around align-items-center">
                                  <label>
                                      <input type="checkbox" > جيد
                                  </label>
                                  <label>
                                      <input type="checkbox" > مناسب
                                  </label>
                                  <label>
                                      <input type="checkbox" >  غير مناسب
                                  </label>
                              </div>
                            </td>
                            <td class="text-center"> </td>
                        </tr>
                        <tr>
                            <td class="">
                              أجهزة التكييف
                            </td>
                            <td class="text-center">
                              <div class="d-flex justify-content-around align-items-center">
                                  <label>
                                      <input type="checkbox" > جيد
                                  </label>
                                  <label>
                                      <input type="checkbox" > مناسب
                                  </label>
                                  <label>
                                      <input type="checkbox" >  غير مناسب
                                  </label>
                              </div>
                            </td>
                            <td class="text-center"></td>
                        </tr>
                        <tr>
                            <td class="">
                              المفاتيح
                            </td>
                            <td class="text-center">
                              <div class="d-flex justify-content-around align-items-center">
                                  <label>
                                      <input type="checkbox" > جيد
                                  </label>
                                  <label>
                                      <input type="checkbox" > مناسب
                                  </label>
                                  <label>
                                      <input type="checkbox" >  غير مناسب
                                  </label>
                              </div>
                            </td>
                            <td class="text-center"></td>
                        </tr>
                        <tr>
                            <td class="">
                              الاجهزة الكهربائية
                            </td>
                            <td class="text-center">
                              <div class="d-flex justify-content-around align-items-center">
                                  <label>
                                      <input type="checkbox" > جيد
                                  </label>
                                  <label>
                                      <input type="checkbox" > مناسب
                                  </label>
                                  <label>
                                      <input type="checkbox" >  غير مناسب
                                  </label>
                              </div>
                            </td>
                            <td class="text-center"> </td>
                        </tr>
                        <tr>
                            <td class="">
                              أخرى
                            </td>
                            <td class="text-center">
                              <div class="d-flex justify-content-around align-items-center">
                                  <label>
                                      <input type="checkbox" > جيد
                                  </label>
                                  <label>
                                      <input type="checkbox" > مناسب
                                  </label>
                                  <label>
                                      <input type="checkbox" >  غير مناسب
                                  </label>
                              </div>
                            </td>
                            <td class="text-center"> </td>
                        </tr>
                        
                    </tbody>
                  </table>
                </div>
              </div>
             
            </div> -->
          
            <br>
            <!-- /////////////////// -->
            <div id="invoice-customer-details" class="row " style="">
                <div class="col-md-12 col-sm-12 " style="">
                    <p> 
                    <!-- أقر انا الموقع والمستاجر ادناه بأني قد استلمت اليوم بتاريخ
                     ({{$clients->created_at->format('Y-m-d') }} م) 
                     الموافق
                     ({{$clients->create_hijriDate }} هـ) 
                     الواحدات الايجارية الموضح بيناتها في العقد وهي بحالة جيده ونظيفة وصالحة للغرض الذي استأجرتها من أجله وليس لدي أي ملاحظات تتعلق بالمساس بمنفعتي بها .(انتر) كما أقر بمعاينتي للواحدات الإيجارية المعاينة النافية للجهالة وقمت بالتحقق من جميع التفاصيل المذكورة في هذا النموذج . كما اتعهد بتسليم الوحدات الايجارية عند انتهاء العقد بالحالة التي كانت عليها عند استلامها .
                     -->
                     أقر انا الموقع والمستاجر ادناه بأني قد استلمت اليوم بتاريخ 
                     ({{$clients->created_at->format('Y-m-d') }} م) 
                     الموافق 
                     ({{$clients->create_hijriDate }} هـ) 
                    الواحدات الايجارية الموضح بيناتها في العقد وهي بحالة جيده ونظيفة وصالحة للغرض الذي استأجرتها من أجله وليس لدي أي ملاحظات تتعلق بالمساس بمنفعتي بها" غير الموضح أعلاه" .(انتر) كما أقر بمعاينتي للواحدات الإيجارية المعاينة النافية للجهالة وقمت بالتحقق من جميع التفاصيل الموجودة فيها . كما اتعهد بتسليم الوحدات الايجارية عند انتهاء العقد بالحالة التي كانت عليها عند استلامها .
                    </p>
                    
                   <br>
                   <br>
                </div>
                
            </div>
            <div id="invoice-customer-details" class="row " style="">
                <div class="col-md-6 col-sm-12 " style="">
                   
                    <p class="ml-2">توقيع المستأجر  </p>
                    <p class="ml-2">
                    ......................
                    </p>
                </div>
                <div class="col-md-5 col-sm-12 text-center" style="">
                    <p>
                    توقيع المسئول 
                    </p>
                    <p class="ml-2">
                    .......................
                    </p>
                </div>
            </div>
            <!-- /////////////////// -->



          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->


  <script src="{{asset('admin/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script type="text/javascript" src="{{asset('admin/vendors/js/ui/jquery.sticky.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin/vendors/js/charts/jquery.sparkline.min.js')}}"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{asset('admin/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/js/scripts/customizer.js')}}" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script type="text/javascript" src="{{asset('admin/js/scripts/ui/breadcrumbs-with-stats.js')}}"></script>
  <!-- END PAGE LEVEL JS-->

  <!--  start table datatable  -->
  <script src="{{asset('admin/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/js/scripts/tables/datatables/datatable-basic.js')}}" type="text/javascript"></script>
  <!-- END table datatable-->
  <!-- <script>
    window.print();
  </script> -->

  <style>
    html body {
      height: 100%;
      background-color: #fff !important;
      direction: rtl;
    }



    p {
      margin-top: 0;
      margin-bottom: .8rem !important;
    }
  </style>
</body>

</html>