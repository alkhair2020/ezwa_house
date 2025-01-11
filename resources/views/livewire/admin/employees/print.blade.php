
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description"
    content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords"
    content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>العزوة هاوس
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

    <div wire:ignore.self class="modal fade" id="print" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-middle" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="invoice-company-details" class="row " dir="ltr">
                        
                        <div class="col-sm-2  "> 
                            <button type="button" class="btn btn-icon btn-info mr-1" onclick="printContent()" >
                                <i class="la la-print"></i>
                            </button>
                            <!-- <div class="text-right mr-4 pr-1 " >
                                <button onclick="printContent()"><i class="la la-print"></i></button>
                            </div> -->
                        </div>
                        <div class="col-sm-1">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">إلغاء</button>
                        </div>
                    </div>
                    <div class="app-content container center-layout" id="printSection">
                        <div class="content-wrapper">
                            <div id="invoice-template" class="content-body">
                                <section class="card">
                                    <div id="invoice-company-details" class="row   border-dark ">
                                        <div class="col-md-9 col-sm-9 text-center   p-2">
                                        <h1> العزوة هاوس </h1>
                                            <h2>مكة المكرمة ــ الشرائع الهاتف : ٠٥٠٩٩٠٩٣٩٣ فاكس: ٠١٢٥٣٩٩٩٠٣</h2>
                                        </div>
                                        <div class="col-md-3 col-sm-3  text-md-left">
                                            <div class="media">
                                            <img src="{{asset('img/ezwalogo.jpeg')}}" alt="company logo" class="img-fluid"width="220" style="    max-width: 100%;height: 100PX;"  />
                                            </div>
                                        </div>
                                        </div>
                                        <div id="invoice-template" class="card-body">
                                            <div id="invoice-company-details" class="row ">
                                                <div class="col-md-12 col-sm-12 pt-2 text-center">
                                                    <u>
                                                        <h1>نموذج تقرير عن الموظف</h1>
                                                    </u>
                                                </div>
                                                <!-- <div class="col-md-2 col-sm-12 ">
                                                </div>
                                                <div class="col-md-3 col-sm-12  text-md-left">
                                                    <div class="media">
                                                        <img src="{{asset('img/ezwalogo.jpeg')}}" alt="company logo" class="img-fluid" width="220" style="    max-width: 100%;height: 120PX;" />
                                                    </div>
                                                </div> -->
                                                
                                            </div>
                                            <div id="invoice-items-details" class="pt-1">
                                                <div class="col-md-12 col-sm-12  ml-2">
                                                    <h2>  البيانات الشخصية</h2>
                                                </div>
                                                <div class="row">
                                                    <div class="table-responsive col-sm-12 pl-3 pr-3 ">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center col-sm-2">نوع العطل</th>
                                                                    <th class="text-center col-sm-2">الحالة</th>
                                                                    <th class="text-center">وصف العطل</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center">
                                                                        دورات المياة
                                                                    </td>
                                                                    <td class="text-center">
                                                                    htehte
                                                                    </td>
                                                                    <td class="text-center"> ertgeh</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">
                                                                        المكيفات
                                                                    </td>
                                                                    <td class="text-center">
                                                                    teheht
                                                                    </td>
                                                                    <td class="text-center"> ethte</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                            <div id="invoice-items-details" class="pt-1">
                                                <div class="col-md-12 col-sm-12  ml-2">
                                                    <h2>العقود</h2>
                                                </div>
                                                <div class="row">
                                                    <div class="table-responsive col-sm-12 pl-3 pr-3 ">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center col-sm-2">نوع العطل</th>
                                                                    <th class="text-center col-sm-2">الحالة</th>
                                                                    <th class="text-center">وصف العطل</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center">
                                                                        دورات المياة
                                                                    </td>
                                                                    <td class="text-center">
                                                                    htehte
                                                                    </td>
                                                                    <td class="text-center"> ertgeh</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">
                                                                        المكيفات
                                                                    </td>
                                                                    <td class="text-center">
                                                                    teheht
                                                                    </td>
                                                                    <td class="text-center"> ethte</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                            <div id="invoice-items-details" class="pt-1">
                                                <div class="col-md-12 col-sm-12  ml-2">
                                                    <h2>الاذونات</h2>
                                                </div>
                                                <div class="row">
                                                    <div class="table-responsive col-sm-12 pl-3 pr-3 ">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center col-sm-2">نوع العطل</th>
                                                                    <th class="text-center col-sm-2">الحالة</th>
                                                                    <th class="text-center">وصف العطل</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center">
                                                                        دورات المياة
                                                                    </td>
                                                                    <td class="text-center">
                                                                    htehte
                                                                    </td>
                                                                    <td class="text-center"> ertgeh</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center">
                                                                        المكيفات
                                                                    </td>
                                                                    <td class="text-center">
                                                                    teheht
                                                                    </td>
                                                                    <td class="text-center"> ethte</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                        <div id="invoice-customer-details" class="row ">
                                            <div class=" col-sm-4 text-center" >
                                            المدير / .....................
                                            </div>
                                            <div class=" col-sm-4 text-center" >
                                                التوقيع .............................
                                            </div>
                                            <div class=" col-sm-4 text-center "maxlength="2" >
                                            التاريخ &nbsp;&nbsp;&nbsp;&nbsp; / &nbsp;&nbsp;&nbsp;&nbsp; / &nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>

                    <!-- <script>
                        window.print();
                    </script> -->
                </div>
            </div>
        </div>
    </div>
       


<script>
    function printContent() {
        var printContents = document.getElementById('printSection').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>   
   
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
  <script>
    // window.print();
  </script>

  <style>
  .table th, .table td {
        padding: 6px 3px !important;
        font-size: 15px;
    }
    html body {
      height: 100%;
      background-color: #fff !important;
      direction: rtl;
    }

    #invoice-template {
      padding-top: 25px !important;
      padding-left: 0px !important;
      padding-right: 0px !important;
    }

    p {
      margin-top: 0;
      margin-bottom: .8rem !important;
    }
    
    
  </style>
  <style>
    @media print {
        header, .navbar, .footer {
            display: none !important;
        }
    }
</style>