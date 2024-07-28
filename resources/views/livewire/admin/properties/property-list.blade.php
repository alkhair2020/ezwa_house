<div>
    @if($isCreate)
        @include('livewire.admin.properties.create')
    @endif
    @if($isEdit)
        @include('livewire.admin.properties.edit')
    @endif
    
    @include('livewire.admin.properties.modal')
    @if($isList)
        <section id="multi-column">
            <div class="content-header row">
                @if(session()->has('message'))
                    @include('admin.includes.alerts.success')
                @endif
                @can('property-create')
                <div class="col-md-12 col-12">
                    <div class="dropdown float-md-right">
                        <!-- <a wire:click="create()"  class="btn btn-primary float-right mb-2">اضافة وحدة</a> -->
                        <button type="button" wire:click="create()" class="btn btn-primary btn-min-width  mb-1 float-right">اضافة وحدة</button>
                    </div>
                </div>
                @endcan
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">الوحدات</h4>
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
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="DataTables_Table_0_length">
                                            <label>Show 
                                                <select wire:model="data_length" class="form-control form-control-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                            <label>Search:<input type="search" class="form-control form-control-sm"  wire:model="search"></label>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>نوع الوحدات</th>
                                            <th>رقم الوحدة</th>
                                            <th>عدد الغرف</th>
                                            <th>عدد الحمامات</th>
                                            <th>نسبة الزيادة</th>
                                            <th>الحالة</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($properties as $property)
                                        <tr>
                                            <td>
                                                @if($property->type=="apartment")
                                                شقة
                                                @else 
                                                    غرفة   
                                                @endif
                                            </td>
                                            <td>{{$property->number}}</td>
                                            <td>{{$property->rooms}}</td>
                                            <td>{{$property->baths}}</td>
                                            <td>{{$property->percentage}}</td>
                                            <td>
                                                @if($property->status=='rented')
                                                    مؤجر
                                                @elseif($property->status=='maintenance')
                                                    صيانة 
                                                @elseif($property->status=='notclean')
                                                <span>غير نظيف </span>  (شاغر) 
                                                @elseif($property->status=='notclean_rented')
                                                <span>غير نظيف </span> (مؤجر) 
                                                @elseif($property->status=='waiting')
                                                    إنتظار تسجيل الدخول 
                                                @elseif($property->status=='vacant')
                                                    شاغر 
                                                @endif
                                            </td>
                                            <td>
                                                @can('client-list')
                                                <a class="btn btn-sm bg-success-light"
                                                    href="{{ url('admin/property/clients', $property->id) }}">
                                                    <button type="button" class="btn btn-icon btn-info mr-1"><i
                                                        class="la la-users"></i></button>
                                                </a>
                                                @endcan
                                                @can('property-edit')
                                                <a class="btn btn-sm bg-success-light" wire:click="edit({{ $property->id }})">
                                                    <button type="button" class="btn btn-icon btn-success mr-1"><i
                                                        class="la la-edit"></i></button>
                                                </a>
                                                @endcan
                                                @can('property-delete')
                                                <a data-toggle="modal" data-target="#delete">
                                                    <button type="button" class="btn btn-icon btn-danger mr-1" wire:click="gitIdForDelete({{ $property->id }})"><i
                                                            class="la la-trash"></i></button>
                                                </a>
                                                @endcan
                                            </td>
                                        </tr>
                                        @endforeach
                                    <tbody>
                                </table>
                                <div class="col-lg-12 col-md-12 pagination justify-content-center pagination-separate">
                                    {{ $properties->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>
